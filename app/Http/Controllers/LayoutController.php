<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    public function index()
    {

        return View('layout.home')->with([
            'user' => Auth::user(),
        ]);
    }

    public function home()
    {
        return View('layout.home');
    }
}
