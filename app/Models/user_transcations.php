<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_transcations extends Model
{
  protected $fillable = [
    'total_amount','user_id','items','item_price','id','quqntity','payment_id'
];

      public function user()
      {
          return $this->belongsTo( User::class,'user_id','id' );
      }

      public function getuser()
      {
          return $this->belongsTo( transcations::class,'payment_id','trans_id' );
      }
}
