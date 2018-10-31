<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function produtos(){
    	return $this->hasMany('App\produto');
    }
}
