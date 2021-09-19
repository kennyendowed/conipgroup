<?php

namespace App\Models;
use App\Models\Products;
use App\User;
use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
  protected $fillable = [
    'customer','printcontent','price','Quantity','author','id','date','color','wristband_id'
];

    public function user()
    {
        return $this->belongsTo( User::class,'author','id' );
    }

    static public function wristband_name($ref)
    {  $posts2=Products::where('id', $ref)->first();

    return $posts2->name;

    }

    static public function author($ref)
    {  $posts2=User::where('id', $ref)->first();

    return $posts2->name;

    }


}
