<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Assignment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = static::generateHashedId($model->email);
        });
    }

    public static function generateHashedId($email)
    {
        return Str::uuid();
        $appKey = config('app.key');
        return hash_hmac('md5', $email, $appKey);
    }
}
