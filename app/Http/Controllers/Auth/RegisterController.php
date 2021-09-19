<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Traits\MailTrait;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use MailTrait;
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
    public function redirectTo()
    {
      $role = Auth::user()->is_permission;
      switch($role)
      {
        case 1:
          return '/dashboard';
          break;
        case 2:
          return '/';
          break;
          case 3:
            return '/';
            break;
        default:
          return '/';
          break;
      }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function Authorization($id)
      {

          $datetime=date("Y-m-d h:i:s");
        $dat2 =User::where('email_code', $id)->get();
     // dd($dat2[0]->name);
        if(count($dat2) > 0)
        {
            DB::table('users')->where('email_code', $id)->update([

             'email_verified_at' =>$datetime,
             'email_verify'=>1
             ]);

             $message="Welcome ".$dat2[0]->name;

        return redirect()->intended(route('login'))->with('status',$message);
        }
      }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'is_permission' => 2,
            'password' => Hash::make($data['password']),
        ]);
    }

    public function customRegistration(Request $request)
    {
      $messages = [
        'required' => 'The :attribute field is required.',
        'email.required' => 'The email field is required.',
        'email.email' => 'The email needs to have a valid format.',
        'password.regex' => 'Password must contain at least 1 lower-case and capital letter, a number and symbol.'
    ];

    $this->validate($request, [
      'full_name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'phone' =>['required','unique:users','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
      'password' => ['required', 'string', 'min:8','regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/','regex:/[@$!%*#?&]/', 'confirmed'],
      'password_confirmation' => 'required',
    ], $messages);

     
      $email_code = strtoupper(Str::random(6));
      $email_time = Carbon::parse()->addMinutes(5);       
          $check=  User::create([
                'name' => $request->full_name,
                'email' => $request->email,
                'phone' =>$request->phone,
                'email_code'=>$email_code,
                'email_time' => $email_time,
                'email_verify'=>0,
                'ip_address' =>  request()->ip(),
                'user_id' => getuserId(),
                'password' => Hash::make($request->password),
            ]);
          
               if( $check) {
                $url= url("/Authorization/{$email_code}");
                $text ="
                <p>Hello ".$request->full_name.",  </p>
                <p> Welcome you to CONIPGROUP  as we hope to serve you better. </p>
                <p>  Please click on the link to verify your email account.        </p>
                 <a href=".$url.">Verify E-Mail</a>      ";
                  $this->sendsEMail($request->email,$request->name,'Account Created ',$text);
                return redirect()->back()->with('success','Created successfully') ; 
               }
               else{
                return redirect()->back()->with('error','Error! something Went Wrong .....!') ; 
               }

     
      
    }



  


}
