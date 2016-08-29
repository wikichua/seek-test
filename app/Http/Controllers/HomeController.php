<?php

namespace SEEK\Http\Controllers;

use Illuminate\Http\Request;

use SEEK\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
