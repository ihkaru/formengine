<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormEntry extends Model
{
    use HasFactory;


    protected $fillable = ['e_form_id', 'data'];
    protected $casts = [
        'data' => 'array',
    ];

    public function eForm()
    {
        return $this->belongsTo(EForm::class, 'e_form_id');
    }
}
