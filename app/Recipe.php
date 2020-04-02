<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipe';
    public $timestamps = false;

    public function category() {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
