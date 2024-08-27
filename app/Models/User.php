<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
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

class User extends Authenticatable implements FilamentUser,HasAllowedFields, HasAllowedSorts, HasAllowedFilters
{
    use HasFactory, Notifiable, HasRoles,HasApiTokens;
    use HasPanelShield;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=[];


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
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public static function generateHashedId($email)
    {
        $appKey = config('app.key');
        return hash_hmac('md5', $email, $appKey);
    }


    public function updatePassword($passwordLama,$passwordBaru, bool $checkRole = true){
        if($this->canGantiPassword($checkRole) || Hash::check($passwordLama,$this->password)){
            $this->update([
                'password'=>Hash::make($passwordBaru)
            ]);
            return true;
        }
        return null;
    }
    public function canGantiPassword(bool $checkRole = true){
        if(!$checkRole) return true;
        return $this->hasRole('super_admin') || $this->hasRole('kepala_satker');
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
}
