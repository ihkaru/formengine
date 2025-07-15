<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CantikController extends Controller
{
    public function index()
    {
        return view("cantik.index");
    }
    public function kelPulauPedalaman()
    {
        return view("cantik.pedalaman");
    }
    public function desWajokHilir()
    {
        return view("cantik.wajokhilir");
    }
    public function desSejegi()
    {
        return view("cantik.sejegi");
    }
}
