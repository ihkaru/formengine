<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSls extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected static Collection $mastersls;

    public static function getMasterSls(){
        self::$mastersls = self::$mastersls ?? self::get();
        return self::$mastersls;
    }

}
