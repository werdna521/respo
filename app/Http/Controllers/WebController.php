<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller {

    public function index() {
        return redirect('/home');
    }

    public function home() {
        $data = RecipeController::getAllForWeb();
        return view('/home', [
            'data' => $data
        ]);
    }

    public function recipe_detail($id) {
        $data = RecipeController::getAllForWeb();
        $detail = RecipeController::getByIdForWeb($id);
        return view('detail', [
            'data' => $data,
            'detail' => $detail
        ]);
    }
}
