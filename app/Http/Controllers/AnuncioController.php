<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    public function finalizar()
    {
        return view('anuncio.finalizar');
    }
    public function valoracion()
    {
        //return request()->all();
        return view('anuncio.valoracion');
    }
    public function final()
    {
        return view('anuncio.final');
    }
    public function index()
    {
        return view('anuncio.misanuncios');
    }
}
