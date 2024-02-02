<?php

namespace App\Http\Controllers;

use App\Services\HomeServices;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data = (new HomeServices())->getData();

        return view('welcome')
            ->with('capres', $data['capres'])
            ->with('cawapres', $data['cawapres']);
    }
}
