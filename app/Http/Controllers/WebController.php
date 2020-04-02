<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RecipeController;

class WebController extends Controller {

    public function index() {
        return redirect('/home');
    }

    public function home() {
        $data = RecipeController::getAll();
        return view('/home', [
            'data' => $data
        ]);
    }
}
