<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Rupadana\ApiService\Contracts\HasAllowedFields;
use Rupadana\ApiService\Contracts\HasAllowedFilters;
use Rupadana\ApiService\Contracts\HasAllowedSorts;
use Illuminate\Database\Eloquent\Casts\Attribute;
use PDO;

/**
 *
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string|null $google_id
 * @property string $jenis
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kegiatan|null $kegiatan
 * @property-read mixed $name_and_email
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SatuanKerja> $satuanKerjas
 * @property-read int|null $satuan_kerjas_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGoogleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements FilamentUser, HasAllowedFields, HasAllowedSorts, HasAllowedFilters
{
    use HasFactory, Notifiable, HasRoles, HasApiTokens;
    use HasPanelShield;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    // protected $casts = ['id' => 'string'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = md5($model->email);
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            // 'id'=>"string"
        ];
    }





    public function updatePassword($passwordLama, $passwordBaru, bool $checkRole = true)
    {
        if ($this->canGantiPassword($checkRole) || Hash::check($passwordLama, $this->password)) {
            $this->update([
                'password' => Hash::make($passwordBaru)
            ]);
            return true;
        }
        return null;
    }
    public function updatePasswordTanpaPasswordLama($passwordBaru, bool $checkRole = true)
    {
        if ($this->canGantiPassword($checkRole)) {
            $this->update([
                'password' => Hash::make($passwordBaru)
            ]);
            return true;
        }
        return null;
    }
    public function canGantiPassword(bool $checkRole = true)
    {
        if (!$checkRole) return true;
        return $this->hasRole('super_admin');
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public static function getAllowedIncludes(): array
    {
        return [];
    }
    public static function getAllowedFields(): array
    {
        return [];
    }

    // Which fields can be used to sort the results through the query string
    public static function getAllowedSorts(): array
    {
        return [];
    }

    // Which fields can be used to filter the results through the query string
    public static function getAllowedFilters(): array
    {
        return [];
    }

    // public function getAuthIdentifierName(){
    //     return "id";
    // }
    // public function getAuthPasswordName(){
    //     return "password";
    // }

    public function satuanKerjas()
    {
        return $this->belongsToMany(SatuanKerja::class, "satuan_kerja_users", "user_id", "satuan_kerja_id");
    }


    protected function nameAndEmail(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => $attributes["name"] . " | " . $attributes["email"],
        );
    }
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, "kegiatan_id", "id");
    }
    public function wilayahKerjas()
    {
        return $this->hasMany(WilayahKerja::class, "petugas_level_1", "id");
    }
}
