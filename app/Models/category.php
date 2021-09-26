<?php

namespace App\Models;
use App\Models\product;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'category_id', 'name','status','description'
    ];
    public function category()
    {
        return $this->hasMany( product::class,'category_id','category_id' );
    }

}
