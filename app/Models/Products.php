<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  protected $fillable = [
    'description','url','price','name','author','id','category','color','Quantity'
];

public function user()
{
    return $this->belongsTo( User::class,'author','id' );
}
}
