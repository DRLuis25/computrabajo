<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RdiariosController extends Controller
{
    public function index()
    {

        
        return view('layouts.admin.rdiarios');
    }
}
