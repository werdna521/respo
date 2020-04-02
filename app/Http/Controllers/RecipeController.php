<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller {

    public static function getAll() {
        return [
            [
                'category' => 'Chickens',
                'data' => [
                    [
                        'name' => 'Rendang Ayam'
                    ],
                    [
                        'name' => 'Ayam Goreng Kalasan'
                    ]
                ]
            ],
            [
                'category' => 'Snacks',
                'data' => [
                    [
                        'name' => 'Uyen'
                    ],
                    [
                        'name' => 'Kentang Goreng Keju'
                    ],
                    [
                        'name' => 'Stik Kentang'
                    ]
                ]
            ]
        ];
    }
}
