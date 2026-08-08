# Project Rules & Guidelines

## Dev Server & Debugging Protocol
- Always check `GEMINI.md` and project scripts (`./dev.sh`).
- When debugging issues or restarting dev server processes, remember that `./dev.sh` is used to manage background services (Docker containers, MySQL, phpMyAdmin, and Laravel `artisan serve`).
- Always purge Laravel caches (`php artisan optimize:clear`) and restart `./dev.sh` cleanly when changes to views, routes, or env occur.
