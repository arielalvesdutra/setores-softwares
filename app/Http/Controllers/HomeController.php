<?php

namespace App\Http\Controllers;

use App\Sector;
use App\Software;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sectors = Sector::all();

        return view('home.index', compact('sectors'));
    }
}
