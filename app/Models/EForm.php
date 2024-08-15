<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EForm extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'fields'];
    protected $casts = [
        'fields' => 'array',
    ];

    public function entries()
    {
        return $this->hasMany(FormEntry::class, 'e_form_id');
    }
}
