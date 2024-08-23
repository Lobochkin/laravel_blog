<?php

namespace App\Http\Controllers;

use App\Events\NewEvent;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index(
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $urlData = [
            [
                'title' => 'DKA-DEVELOP',
                'url' => 'https://dka-develop.ru'
            ],
            [
                'title' => 'YouTube',
                'url' => 'https://www.youtube.com'
            ]
        ];
        return view('laravel_vue.start', ['url_data' => $urlData]);
    }

    public function getJson(): array
    {
        return [
            [
                'title' => 'Google',
                'url' => 'https://www.google.com'
            ],
            [
                'title' => 'Yandex',
                'url' => 'https://www.yandex.ru'
            ]
        ];
    }

    public function chartData(): array
    {
        return [
            'labels' => ['January', 'February', 'March','April','May'],
            'datasets' => [
                [
                    'tension' => 0.3,
                    'borderColor'=> '#f87979',
                    'label' => 'Sales',
                    'backgroundColor' => '#f87979',
                    'data' => [40, 20, 12,30,35],
                    'fill' => true
                ]
            ]
        ];
    }
    public function chartRandom(): array
    {
        return [
            'labels' => ['January', 'February', 'March','April','May'],
            'datasets' => [
                [
                    'tension' => 0.3,
                    'label' => 'Gold',
                    'backgroundColor' => '#f87979',
                    'borderColor'=> '#f87979',
                    'data' => [rand(0,40000), rand(0,40000), rand(0,40000),rand(0,40000),rand(0,40000)]
                ],
                [
                    'tension' => 0.3,
                    'label' => 'Silver',
                    'backgroundColor' => '#00D8FF',
                    'borderColor'=> '#00D8FF',
                    'data' => [rand(0,40000), rand(0,40000), rand(0,40000),rand(0,40000),rand(0,40000)]
                ]
            ]
        ];
    }
    public function chartJs(): array
    {
        return [
            'labels' => ['VueJs', 'EmberJs', 'ReactJs', 'AngularJs'],
            'datasets' => [
                [
                    'backgroundColor' => ['#41B883', '#E46651', '#00D8FF', '#DD1B16'],
                    'data' => [40, 20, 80, 10]
                ]
            ]
        ];
    }
    public function newEvent(Request $request)
    {
        $result = [
            'labels' => ['January', 'February', 'March','April','May'],
            'datasets' => [
                [
                    'tension' => 0.3,
                    'borderColor'=> '#f87979',
                    'label' => 'Sales',
                    'backgroundColor' => '#f87979',
                    'data' => [40, 20, 12,30,35],
                    'fill' => true
                ]
            ]
        ];

        if ($request->has('label') && $request->has('sale')) {
            $result['labels'][] = $request->input('label');
            $result['datasets'][0]['data'][] = intval($request->input('sale'));

            if ($request->has('realtime') && filter_var($request->input('realtime'),FILTER_VALIDATE_BOOLEAN)) {
                event(new NewEvent($result));
            }
        }

        return $result;
    }
}
