<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\User;
use Session;
use App\Mail\MailMember2;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
// use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class EventsController extends Controller
{
   use SEOToolsTrait;
    //
    public function __construct()
    {
        $this->middleware('verifyUser');
    
    }

        public function creg22(Request $request)
            {
              $this->validate($request, [
              'name' => 'required|string|max:255',
              'phone' =>['required','numeric','min:0'],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'min:8'],


          ]);
      $user_id = mt_rand(13, rand(99, 9990));
      $check = User::where('user_id', '=' , $user_id)->orWhere('email', '=' , $request->get('email'))->exists();

        if($check){
          Session::flash('alert-danger', 'danger');
                         // Session::flash('alert-warning', 'warning');
                       //  Session::flash('alert-success', 'success');
                         // Session::flash('alert-info', 'info');
                       //    return view('welcome',compact(['ticket','alert-success']));

            return view('admin.register',compact(['alert-danger']));
        }
        else {

                     $subj="Welcome To {{ config('app.name') }}";
                 $mess='We welcome you WRISTBANDS as we hope to serve you better.
                 Your Email is '.$request->email.', your account password is '.$request->password.'
                  . Plesae feel free to change it any time';
                 $contactSubject = 'Feedback!';
                 $img2 =public_path().'/public/img/wristbands.png';
                     $data = array(
                           'no-reply' => 'sales@wristbands.ng',
                             'admin'    => 'kenneyg50@gmail.com',
                             'name'=>$request->name,
                             'email'=>$request->email,
                             'messagetext'=>$mess,
                             'app_name' => config('app.name'),
                             'contactSubject'=>$contactSubject,
                             'img' => $img2,
                             'gin'=>$request->email,
                             'password' =>$request->password
                         );
           Mail::send('mails.member', $data, function ($message) use ($data){

                                          $to_email =$data['email'];
                                          $to_name  = $data['name'];
                                          $subject  = $data['contactSubject'];
                                          $message->sender($data['no-reply'], $data['app_name'].' New Account information!');
                                          $message->replyTo($data['no-reply'], ' Web Administrator');
                                            $message->from($data['no-reply'],$data['app_name'].' New Account information!');
                                          $message->subject('Feedback!');
                                           $message->bcc("itsupport@centric.ng");
                                     // $message->bcc("clipsemgt@gmail.com");
                                     // $message->bcc("sales@wristbands.ng");
                                             $message->to($to_email, $to_name);
                                        });

                 $cp=count(Mail::failures());

                                   if($cp==0)
                                   {
                                     $items =  User::create(array(
                                                'name' =>$request->get('name'),
                                                 'phone' =>$request->get('phone'),
                                                 'email' => $request->get('email'),
                                                 'user_id'=>$user_id,
                                                 'ip_address' =>  request()->ip(),
                                                'password' => Hash::make($request['password']),
                                                'is_permission'  => $request->get('role'),
                                                ));
                        Session::flash('alert-success', 'success');
                      //    return redirect()->back()->with('alert-success');
              return view('admin.register',compact(['alert-success']));
                             } else {
                                 Session::flash('registeralert-danger', 'danger');
    //return redirect()->back()->with('registeralert-danger');
           return view('admin.register',compact(['registeralert-danger']));
                                                     return redirect()->back()->with('error','Error! something Went Wrong .....!');

                                              }

        }




            }

    public function creg2(Request $request)
        {
          $this->validate($request, [
          'name' => 'required|string|max:255',
          'phone' =>['required','numeric','min:11'],
        'email' =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'min:8'],


      ]);
  $user_id = mt_rand(13, rand(99, 9990));
    $check = User::where('user_id', '=' , $user_id)->orWhere('email', '=' , $request->get('email'))->exists();

    if($check){
    //   $message ='Something went wrong.Please try again Thank You .....!';|unique:users
    //
    // return response()->json([
    //    'error' => '1',
    //    'status'  => $message,
    // ], 200);

     Session::flash('alert-danger', 'danger');
                    // Session::flash('alert-warning', 'warning');
                  //  Session::flash('alert-success', 'success');
                    // Session::flash('alert-info', 'info');
                  //    return view('welcome',compact(['ticket','alert-success']));
    return redirect()->back()->with('alert-danger');

    }
    else {

                 $subj="Welcome To {{ config('app.name') }}";
             $mess='We welcome you WRISTBANDS as we hope to serve you better.
             Your Email is '.$request->email.', your account password is '.$request->password.'
              . Plesae feel free to change it any time';
             $contactSubject = 'Feedback!';
             $img2 =public_path().'/public/img/wristbands.png';
                 $data = array(
                       'no-reply' => 'sales@wristbands.ng',
                         'admin'    => 'sales@wristbands.ng',
                         'name'=>$request->name,
                         'email'=>$request->email,
                         'messagetext'=>$mess,
                         'app_name' => config('app.name'),
                         'contactSubject'=>$contactSubject,
                         'img' => $img2,
                         'gin'=>$request->email,
                         'password' =>$request->password
                     );
//        Mail::send('mails.member', $data, function ($message) use ($data){
//
//                                       $to_email =$data['email'];
//                                       $to_name  = $data['name'];
//                                       $subject  = $data['contactSubject'];
//                                       $message->sender($data['no-reply'], $data['app_name'].' New Account information!');
//                                       $message->replyTo($data['no-reply'], ' Web Administrator');
//                                         $message->from($data['no-reply'],$data['app_name'].' New Account information!');
//                                       $message->subject('Feedback!');
//                                        $message->bcc("itsupport@centric.ng");
//                                  // $message->bcc("clipsemgt@gmail.com");
//                                  // $message->bcc("sales@wristbands.ng");
//                                          $message->to($to_email, $to_name);
//                                     });
//
//                             $cp=count(Mail::failures());
// // dd($cp);
//                                            if($cp==0)
//                                            {
                                             $items =  User::create(array(
                                                        'name' =>$request->get('name'),
                                                         'phone' =>$request->get('phone'),
                                                         'email' => $request->get('email'),
                                                         'user_id'=>$user_id,
                                                           'ip_address' =>  request()->ip(),
                                                         'ip_address' =>  request()->ip(),
                                                        'password' => Hash::make($request['password']),
                                                        'is_permission'  => 3,
                                                        ));
                                          //   Session::flash('alert-danger', 'danger');
                                            // Session::flash('alert-warning', 'warning');
                                            Session::flash('loginalert-success', 'success');
                                            // Session::flash('alert-info', 'info');
                                            return view('auth.login',compact(['loginalert-success']));
                                          //  return redirect()->route('login')->with('loginalert-success');
                                            //  return redirect()->back()->with('alert-success');
             //         $message ="Succesful! Your account has been created and a mail containing your account login details has been sent to you.  Thank you for joining us!";
             //
             // return response()->json([
             // 'error' => '0',
             // 'email'=>$request->email,
             // 'status'  => $message,
             // ], 200);
             //                               } else {
             //                                 Session::flash('registeralert-danger', 'danger');
             //                                                // Session::flash('alert-warning', 'warning');
             //                                              //  Session::flash('alert-success', 'success');
             //                                                // Session::flash('alert-info', 'info');
             //                                              //    return view('welcome',compact(['ticket','alert-success']));
             //                                return view('auth.register',compact(['registeralert-danger']));
             // //                                 $message ='Something went wrong. PLease Try Again Thank You .....!';
             // //
             // // return response()->json([
             // // 'error' => '1',
             // // 'status'  => $message,
             // // ], 200);
             //                                   //   return redirect()->back()->with('error','Error! something Went Wrong .....!');
             //
             //                               }
    //
    //     $message ='User has been successfully Registered Thank You .....!';
    //
    // return response()->json([
    //      'error' => '0',
    //      'status'  => $message,
    //  ], 200);
    }

    //     $message ='User has been successfully Registered Thank You .....!';
    //
    // return response()->json([
    //      'error' => '0',
    //      'status'  => $message,
    //  ], 200);


        }
    public function welcome()
    {

      $this->seo()->setTitle('Your Number Choice Of Wristbands Tyvek, Plastic, Vinyl and Silicone Wristbands ...');
       $this->seo()->setDescription('Supply and Printing of Wristbands, Lanyards, tickets and event technology support services website | Wristbands');
       $this->seo()->opengraph()->setUrl('https://wristbands.ng/');
       $this->seo()->opengraph()->addProperty('type', 'articles');
       $this->seo()->twitter()->setSite('@wristbandsng');
       $this->seo()->jsonLd()->setType('Article');
       $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
    return view('welcome');
      // return view('welcome')->with([
      //   'Events' =>  Events::all()
      // ]);
    }


    public function  sendEmail(Request $request){
        $data = array(
                     'name' => $request->Name,
                        'email'=>$request->Email1,
                      'contactSubject'=>$request->subject,
                        'messagetext'=>$request->message
                    );

                //    dd($data);

        Mail::send('mails.member', $data, function ($message) use ($request){
            /* Config **** */
            $to_email = "sales@wristbands.ng";
            $to_name  = config('app.name');
            $subject  = $request->subject;
            $message->subject ($subject);
            $message->from ($request->Email1, $request->Name);
            $message->to ($to_email, $to_name);
           $message->bcc("clipsemgt@gmail.com");
        });
      //  dd(Mail);
        if(count(Mail::failures()) > 0){
            $status = 'Error something Went Wrong';
        } else {
            $status = 'Mail Sent Successfully Thank You ....';
        }
    //       echo json_encode($status);
    // exit;

 return redirect()->back()->with('status', $status );
  // return \Response::json(['status' => 'Mail Sent Successfully Thank You .....'], 200);
    }



}
