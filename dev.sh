#!/usr/bin/env bash
set -e

PROJECT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
cd "$PROJECT_DIR"

echo "🚀 Preparing Desa Cantik Dev Server..."

# 1. Ensure .env exists
if [ ! -f ".env" ]; then
    echo "📋 Copying .env.example to .env..."
    cp .env.example .env
fi

# 2. Read HOST, PORT, and PHPMYADMIN_PORT dynamically from .env
ENV_HOST=$(grep -E '^APP_HOST=|^HOST=' .env 2>/dev/null | cut -d '=' -f2 | tr -d '"' | tr -d "'" | tr -d '\r' | head -n 1)
ENV_PORT=$(grep -E '^APP_PORT=|^PORT=' .env 2>/dev/null | cut -d '=' -f2 | tr -d '"' | tr -d "'" | tr -d '\r' | head -n 1)
PMA_PORT=$(grep -E '^PHPMYADMIN_PORT=' .env 2>/dev/null | cut -d '=' -f2 | tr -d '"' | tr -d "'" | tr -d '\r' | head -n 1)

# Hierarchy: CLI env > .env file > Default fallbacks
HOST="${HOST:-${ENV_HOST:-127.0.0.1}}"
PORT="${PORT:-${ENV_PORT:-8765}}"
PMA_PORT="${PMA_PORT:-8085}"

# 3. Ensure Docker containers (MySQL & phpMyAdmin) are up (Idempotent)
if command -v docker >/dev/null 2>&1 && [ -f "docker-compose.yml" ]; then
    echo "🐳 Ensuring Docker services (MySQL & phpMyAdmin) are running..."
    if docker compose version >/dev/null 2>&1; then
        docker compose up -d
    elif command -v docker-compose >/dev/null 2>&1; then
        docker-compose up -d
    fi
else
    echo "⚠️ Docker or docker-compose.yml not available, skipping container setup."
fi

# 4. Ensure APP_KEY is set in .env
if ! grep -q "^APP_KEY=base64:" .env 2>/dev/null; then
    echo "🔑 Generating Application Key..."
    php artisan key:generate --no-interaction
fi

# 5. Ensure public/storage symlink exists
if [ ! -L "public/storage" ] && [ ! -d "public/storage" ]; then
    echo "🔗 Creating storage symlink..."
    php artisan storage:link --no-interaction || true
fi

# 6. Run database migrations idempotently
echo "🗄️ Running database migrations (if pending)..."
php artisan migrate --graceful --no-interaction || true

# 7. Clear all caches for instant updates in Blade and routes
echo "⚡ Purging all Laravel caches..."
php artisan optimize:clear > /dev/null 2>&1 || true

# 8. Idempotent server process cleanup and automatic port selection
pkill -f "artisan serve.*--port=$PORT" >/dev/null 2>&1 || true

is_port_in_use() {
    (echo > /dev/tcp/127.0.0.1/"$1") >/dev/null 2>&1
}

while is_port_in_use "$PORT"; do
    echo "⚠️ Port $PORT is occupied. Trying next port: $((PORT + 1))..."
    PORT=$((PORT + 1))
done

echo "--------------------------------------------------"
echo "🌐 Web Portal   : http://$HOST:$PORT"
echo "🗄️ phpMyAdmin   : http://localhost:$PMA_PORT"
echo "⚡ No-Cache Dev : Browser & OPcache caching DISABLED"
echo "💡 Press Ctrl+C to stop the dev server."
echo "--------------------------------------------------"

exec php -d opcache.enable_cli=0 -d opcache.enable=0 -d opcache.revalidate_freq=0 artisan serve --host="$HOST" --port="$PORT"
