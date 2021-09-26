<?php

use App\Models\User;

  function checkPermission($permissions){
    $userAccess = getMyPermission(auth()->user()->is_permission);
    foreach ($permissions as $key => $value) {
      if($value == $userAccess){
        return true;
      }
    }
    return false;
  }

  function tenatePermission($tenateId){
    $check=User::where('organization_id', '=', $tenateId)->exists();
         if($check){
           return true;
            } 
   }
 

  function getMyPermission($id)
  {
    switch ($id) {
      case 1:
        return 'administrator';
        break;
      case 2:
        return 'staff';
        break;
        case 3:
          return 'customer';
          break;
      default:
        return 'invaliduser';
        break;
    }
  }
  function genTranxRef()
  {
    return getHashedToken();
  }

 

     /**
     * Get the pool to use based on the type of prefix hash
     * @param  string $type
     * @return string
     */
   function getPool($type)
    {
        switch ($type) {
            case 'alnum':
                $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'alpha':
                $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'hexdec':
                $pool = '0123456789abcdef';
                break;
            case 'numeric':
                $pool = '0123456789';
                break;
            case 'nozero':
                $pool = '123456789';
                break;
            case 'distinct':
                $pool = '2345679ACDEFHJKLMNPRSTUVWXYZ';
                break;
            default:
                $pool = (string) $type;
                break;
        }

        return $pool;
    }

       /**
     * Generate a random secure crypt figure
     * @param  integer $min
     * @param  integer $max
     * @return integer
     */
    function secureCrypt($min, $max)
    {
        $range = $max - $min;

        if ($range < 0) {
            return $min; // not so random...
        }

        $log    = log($range, 2);
        $bytes  = (int) ($log / 8) + 1; // length in bytes
        $bits   = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);

        return $min + $rnd;
    }

    function getrandomNumber($length)
    {
        $token = "";
        $type="distinct";
        $max   = strlen(getPool($type));
        for ($i = 0; $i < $length; $i++) {
            $token .= getPool($type)[secureCrypt(0, $max)];
        }
 
        return $token;
    }
 

       /**
     * Finally, generate a hashed token
     * @param  integer $length
     * @return string
     */
   function getHashedToken($length = 25)
   {
       $token = "";
       $type="distinct";
       $max   = strlen(getPool($type));
       for ($i = 0; $i < $length; $i++) {
           $token .= getPool($type)[secureCrypt(0, $max)];
       }

       return $token;
   }

   function getuserId($length = 8)
   {
       $token = "";
       $type="numeric";
       $max   = strlen(getPool($type));
       for ($i = 0; $i < $length; $i++) {
           $token .= getPool($type)[secureCrypt(0, $max)];
       }

       return $token;
   }


   function orgId($length = 5)
   {
       $token = "";
       $type="numeric";
       $max   = strlen(getPool($type));
       for ($i = 0; $i < $length; $i++) {
           $token .= getPool($type)[secureCrypt(0, $max)];
       }

       return $token;
   }

   function productId($length = 20)
   {
       $token = "";
       $type="distinct";
       $max   = strlen(getPool($type));
       for ($i = 0; $i < $length; $i++) {
           $token .= getPool($type)[secureCrypt(0, $max)];
       }

       return $token;
   }
   

?>
