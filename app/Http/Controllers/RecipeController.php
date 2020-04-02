<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Recipe;

class RecipeController extends Controller {

    public static function getAllForWeb() {
        return Category::all();
    }

    public static function getByIdForWeb($id) {
        return Recipe::find($id);
    }
}
