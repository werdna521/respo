<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller {

    public function index() {
        return redirect('/home');
    }

    public function home() {
        $data = RecipeController::get_all_category_for_web();
        $recipes = RecipeController::get_all_recipe_for_web();
        return view('/home', [
            'data' => $data,
            'recipes' => $recipes
        ]);
    }

    public function recipe_detail($id) {
        $data = RecipeController::get_all_category_for_web();
        $detail = RecipeController::get_by_id_for_web($id);
        return view('detail', [
            'data' => $data,
            'detail' => $detail
        ]);
    }

    public function recipe_search($search_query) {
        $data = RecipeController::get_all_category_for_web();
        $search_result = RecipeController::get_search_result_for_web($search_query);
        return view('search', [
           'data' => $data,
           'search_result' => $search_result,
           'search_query' => $search_query
        ]);
    }

    public function search(Request $request) {
        $search_query = $request->input('search_query');
        return redirect("search/$search_query");
    }
}
