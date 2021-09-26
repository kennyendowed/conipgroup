<?php

namespace App\Models;
use App\Models\category;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'description','price','name','status','product_id','category_id','quantity'
    ];
    
    public function category()
    {
        return $this->belongsTo( category::class,'category_id','category_id' );
    }

}
