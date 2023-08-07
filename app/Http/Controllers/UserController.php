<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        return __METHOD__;
    }

    public function show($first, $last = 'Safadi')
    {
        return $first . ' ' . $last;
    }

    public function info()
    {
        return 'Info';
    }
}
