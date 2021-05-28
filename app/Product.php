<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable = ['name','image','description','price','weigth','categories_id','stok'];
}
