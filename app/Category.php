<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false;

    public function recipe() {
        return $this->hasMany('App\Recipe', 'category_id', 'id');
    }
}
