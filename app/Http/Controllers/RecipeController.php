<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Recipe;

class RecipeController extends Controller {

    public static function get_all_category_for_web() {
        return Category::orderBy('category_name', 'asc')->get();
    }

    public static function get_all_recipe_for_web() {
        return Recipe::orderBy('created_at', 'desc')->get();
    }

    public static function get_search_result_for_web($search_query) {
        return Recipe::query()->where('recipe_name', 'LIKE', '%'.$search_query.'%')->get();
    }

    public static function get_by_id_for_web($id) {
        return Recipe::find($id);
    }
}
