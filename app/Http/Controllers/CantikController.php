<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CantikController extends Controller
{
    public function kelPulauPedalaman()
    {
        return view("cantik.pedalaman");
    }
}
