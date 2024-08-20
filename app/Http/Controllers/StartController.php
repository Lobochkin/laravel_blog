<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index()
    {
        $urlData = [
            [
                'title' => 'DKA-DEVELOP',
                'url' => 'https://dka-develop.ru'
            ],
            [
                'title' => 'YouTube',
                'url' => 'http://www.youtube.com/'
            ]
        ];
        return view('laravel_vue.start', ['url_data' => $urlData]);
    }
}
