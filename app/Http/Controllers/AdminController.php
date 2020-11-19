<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view(
            'admin.index',
            [],
        );
    }

    public function cars()
    {
        return view(
            'admin.cars',
            [],
        );
    }

    public function carmodels()
    {
        return view(
            'admin.carmodels',
            [],
        );
    }

    public function colors()
    {
        return view(
            'admin.colors',
            [],
        );
    }

    public function brands()
    {
        return view(
            'admin.brands',
            [],
        );
    }
}
