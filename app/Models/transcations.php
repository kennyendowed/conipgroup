<?php

namespace App\Models;
use App\User;
use App\Models\user_transcations;
use Illuminate\Database\Eloquent\Model;

class transcations extends Model
{
  protected $fillable = [
    'trans_id','user_id','amount','paid_at','id','trans_refs','payment_status','confirm_by'
];

public  function userstransinfo()
{
    return $this->hasMany( user_transcations::class);
}
      public  function usersinfo()
      {
          return $this->belongsTo( User::class,'user_id','id' );
      }

      // public static function usersinfo($par1)
      //   {
      //   $posts=Clients::where('tag_id',$par1)->first();
      //   return $posts->name;
      //   }
}
