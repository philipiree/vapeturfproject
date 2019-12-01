<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Table name
    public $table = 'products';
    //Primary Key
    //public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function categories(){

        return $this->belongsToMany('App\Category');

    }



}
