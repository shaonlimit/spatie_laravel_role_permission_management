<?php

namespace App\Http\Controllers;



class BackendController extends Controller
{
    public function admin_dashboard()
    {
        return view("components.backend.dashboard");
    }
}