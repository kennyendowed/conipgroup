<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Image;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\User;
use Carbon\Carbon;
use App\Traits\UploadTrait;
use App\Traits\MailTrait;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class HomeController extends Controller
{
   use SEOToolsTrait;
   use UploadTrait;
   use MailTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    public function index()
    {
    
      $this->seo()->setTitle('Your Number Choice Of Wristbands Tyvek, Plastic, Vinyl and Silicone Wristbands ...');
       $this->seo()->setDescription('Supply and Printing of Wristbands, Lanyards, tickets and event technology support services website | Wristbands');
       $this->seo()->opengraph()->setUrl('https://wristbands.ng/');
       $this->seo()->opengraph()->addProperty('type', 'articles');
       $this->seo()->twitter()->setSite('@wristbandsng');
       $this->seo()->jsonLd()->setType('Article');
       $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
      return view('welcome');
     
    }

    public function About()
{
  $data['page_title'] = "About Us";
  $this->seo()->setTitle('About');
   $this->seo()->setDescription('We are a company that specializes in the supply and printing of wristbands, Lanyards, tickets and event technology support services. At Wristbands Nigeria Limited we produce and deliver the best of variation of wristbands | Wristbands');
   $this->seo()->opengraph()->setUrl('https://wristbands.ng/About');
   $this->seo()->opengraph()->addProperty('type', 'About');
   $this->seo()->twitter()->setSite('@wristbandsng');
   $this->seo()->jsonLd()->setType('About');
   $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
    return view('pages.About',$data);
}

public function getEmailVerification()
{
    if (Auth::user()->email_verify != 1){
     
        return view('auth.email-verify');
    }else{
        return redirect('pages/home');
    }
}


public function emailVerifySubmit(Request $request)
{
    $this->validate($request,[
        'verification_code' => 'required',
    ]);
    $user = User::findOrFail(Auth::user()->id);

    if ($user->email_code == $request->verification_code)
    {
      $email_code = strtoupper(Str::random(6));
         $datetime=date("Y-m-d h:i:s");
        $useOwner = User::findOrFail(Auth::user()->id);
        $useOwner->email_verify = 1;
        $useOwner->email_verified_at = $datetime;
        $useOwner->email_code = $email_code;
        $useOwner->save();     
        return redirect()->intended(route('home'))->with('success', $request->get('name').'Welcome Email Verification successfully! ');
    }else{

    return redirect()->back()->with('error', 'Verification Code in Invalid' );
    }
}

public function resendEmail(Request $request)
{
    $user = User::findOrFail(Auth::user()->id);
    if ($user->email_time > Carbon::now())
    {
        $tt = Carbon::parse($user->email_time)->diffForHumans();
        return redirect()->back()->with('error', 'Please Try Again. After '.$tt );
    }else{
        $email_code = strtoupper(Str::random(6));
        $text = "Your Verification Code Is: $email_code";
        $this->sendMail($user->email,$user->name,'Email verification',$text);
        $useOwner = User::findOrFail($user->id);
        $useOwner->email_code = $email_code;
        $useOwner->email_time = Carbon::parse()->addMinutes(5);
        $useOwner->save();
        return redirect()->intended(route('email-verify'))->with('success', Auth::user()->name.' New Email Verification Code Send Your Email Address.');
    }
}

    public function order($id)
    {
      if($id=="Sparkle-Holographic")
      {
        $des=" Straight-faced Sparkle Wristbands can make any party or event stand out with their
        striking metallic and glitter patterns. Similar to plastic wristbands, holographic wristbands are
        water and tear resistant. They feature locking plastic snaps that prevent wearers from sharing
        wristbands, so you don’t have to worry about unauthorized guests. This particular holographic
        wristband is straight face shaped.";
      }
      elseif ($id=="Paper-Tyvek-wristbands") {
    $des="¾” Paper Wristbands Our paper Tyvek wristbands for events are a cost- effective solution to identify paid guests and secure admissions. They are made of authentic DuPont™ Tyvek®, which is a lightweight, high- density polyethylene fiber material. All our Tyvek® wristbands feature tamper-evident die-cut adhesive closure that tear when removed to prevent multiple usage or sharing and It comes in a sleek and slim structure which makes it comfortable for use";
      }
      elseif ($id=="Plastic-Vinyl-wristbands") {
    $des="Straight-faced Plastic Wristbands are made from a flexible and stretch-
    resistant plastic. They are constructed with a onetime use, plastic snap
    requiring the wristbands to be cut off after use and are straight-face shaped.
    The plastic bands are waterproof and hold up in water for extended periods of
    time. The backside of the plastic wristband is white, not the color or design on
    the front. Actual colors may vary from website.";
      }
      elseif ($id=="Rubber-Silicone-Wristbands") {
    $des="All Round Silicone Wristbands Comfortable, durable, and waterproof, silicone wristbands fit without requiring them to fiddle with snap closures or adhesives. Silicone wristbands are stylish fashion accessories that serve as highly-visible promotional opportunities. Silicone awareness wristbands can last for years with and are completely water-resistant. This Particular one is all round shaped and is not detachable but it easily slides up the wrists.";
      }
      elseif ($id=="Fabric-Wristbands") {
    $des="Woven wristbands are at the forefront when it comes to wristbands for music concerts and festivals. They can be worn for months on end as they’re made of durable cotton fabrics. When coupled with RFID technology, fabric wristbands can also be used to track guest entrances and exits at large events. Similar to holographic glitter wristbands, woven bracelets are very eye-catching and great for VIP identification. Both high security and re-wearable styles of fabric wristbands are available. High security bands utilize plastic ring clips while re-wearable styles can stretch to make them easy to put on and remove If you need a fashionable wristband for a music festival, woven cloth bands add a plenty of style. Event planners sometimes use them to make it easier for staff to identify VIP guests.
    ";

      }
    elseif ($id=="Tickets") {
    $des="";
    }
    else
    {
      $des="";
    }


      $this->seo()->setTitle($id);
      $this->seo()->setDescription($des);
     $this->seo()->opengraph()->setUrl('https://wristbands.ng/order/$id');
       $this->seo()->opengraph()->addProperty('type', 'Articles');
       $this->seo()->twitter()->setSite('@wristbandsng');
       $this->seo()->jsonLd()->setType('Articles');
       $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');

 $result=Products::where('category','=',$id)->get();

       return view('pages.order',compact(['result','id']));
       //     // return view('home')->with([
      //   'comments' =>  User_tickets::with((['author']))->paginate()
      // ]);
    }

    public function dashboard()
    {
      $post=Products::orderBy('id','desc')->get();
         // $posts=Products::orderBy('id','desc')->get();
       $posts=Products::orderBy('id','desc')->paginate(20);
        $us=Products::where('Quantity', '0')->get();
        $uss=User::where('is_permission', '3')->get();
        $ues=contact::all();
          return view('pages.home', compact('posts','post','us','uss','ues'));
    }

    public function admin_credential_rules(array $data)
{
  $messages = [
    'current-password.required' => 'Please enter current password',
    'password.required' => 'Please enter password',
  ];

  $validator = Validator::make($data, [
    'current-password' => 'required',
    'password' => 'required|same:password',
    'password_confirmation' => 'required|same:password',
  ], $messages);

  return $validator;
}

    public function change_password(Request $request)
    {
      $request_data = $request->All();
        $validator = $this->admin_credential_rules($request_data);
        if($validator->fails())
        {
          return view('pages.change_password')
          ->withErrors($error)
          ->withInput();
        //  return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        }
        else
        {
          $current_password = Auth::User()->password;
          if(Hash::check($request_data['current-password'], $current_password))
          {
            $user_id = Auth::User()->id;
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);
            $obj_user->save();
            //  Session::flash('alert-danger', 'danger');
                            // Session::flash('alert-warning', 'warning');
                            Session::flash('passwordalert-success', 'success');
                            // Session::flash('alert-info', 'info');
            return view('pages.change_password');
          }
          else
          {
            $error = array('current-password' => 'Please enter correct current password');
            return view('pages.change_password')
            ->withErrors($error)
            ->withInput();
                // return response()->json(array('error' => $error), 400);
          }
        }


    }
public function Privacy_policy()
{
  $this->seo()->setTitle('Privacy policy');
   $this->seo()->setDescription('The details you give us are essential for the processing and delivery of your orders, for billing and for the establishment of warranty contracts, therefore failure to provide these details will result in the cancellation of your order. By registering on the Site, you agree to provide us with sincere and true information as it concerns you. Communicating false information is contrary to the present general Terms and Conditions. | Wristbands');
   $this->seo()->opengraph()->setUrl('https://wristbands.ng/Privacy_policy');
   $this->seo()->opengraph()->addProperty('type', 'Privacy policy');
   $this->seo()->twitter()->setSite('@wristbandsng');
   $this->seo()->jsonLd()->setType('Privacy policy');
   $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
      return view('pages.Privacy_policy');
}

public function Terms_Conditions()
{
  $this->seo()->setTitle('Terms Conditions');
   $this->seo()->setDescription('The general Terms and Conditions of Sale detailed below govern the contractual relationship between the customer and Wristbands Nigeria Limited. Both parties accept these Conditions unreservedly. These general Conditions of Sale are the only conditions that are applicable and replace all other conditions, except in the case of express: written, prior dispensation | Wristbands');
   $this->seo()->opengraph()->setUrl('https://wristbands.ng/Terms_Conditions');
   $this->seo()->opengraph()->addProperty('type', 'Terms Conditions');
   $this->seo()->twitter()->setSite('@wristbandsng');
   $this->seo()->jsonLd()->setType('Terms Conditions');
   $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
      return view('pages.Terms_Conditions');
}

public function Contact()
{
  $this->seo()->setTitle('Contact');
   $this->seo()->setDescription('Our Address 383, Borno Way, Alagomeji, Yaba, Lagos States, Nigeria we supply and printing of wristbands, Lanyards, tickets and event technology support services website | Wristbands');
   $this->seo()->opengraph()->setUrl('https://wristbands.ng/Contact');
   $this->seo()->opengraph()->addProperty('type', 'Contact');
   $this->seo()->twitter()->setSite('@wristbandsng');
   $this->seo()->jsonLd()->setType('Contact');
   $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
    return view('pages.Contact');
}



public function show($id)
{
  if($id=="Sparkle-Holographic")
  {
    $des=" Straight-faced Sparkle Wristbands can make any party or event stand out with their
    striking metallic and glitter patterns. Similar to plastic wristbands, holographic wristbands are
    water and tear resistant. They feature locking plastic snaps that prevent wearers from sharing
    wristbands, so you don’t have to worry about unauthorized guests. This particular holographic
    wristband is straight face shaped.";
  }
  elseif ($id=="Paper-Tyvek-wristbands") {
$des="¾” Paper Wristbands Our paper Tyvek wristbands for events are a cost- effective solution to identify paid guests and secure admissions. They are made of authentic DuPont™ Tyvek®, which is a lightweight, high- density polyethylene fiber material. All our Tyvek® wristbands feature tamper-evident die-cut adhesive closure that tear when removed to prevent multiple usage or sharing and It comes in a sleek and slim structure which makes it comfortable for use";
  }
  elseif ($id=="Plastic-Vinyl-wristbands") {
$des="Straight-faced Plastic Wristbands are made from a flexible and stretch-
resistant plastic. They are constructed with a onetime use, plastic snap
requiring the wristbands to be cut off after use and are straight-face shaped.
The plastic bands are waterproof and hold up in water for extended periods of
time. The backside of the plastic wristband is white, not the color or design on
the front. Actual colors may vary from website.";
  }
  elseif ($id=="Rubber-Silicone-Wristbands") {
$des="All Round Silicone Wristbands Comfortable, durable, and waterproof, silicone wristbands fit without requiring them to fiddle with snap closures or adhesives. Silicone wristbands are stylish fashion accessories that serve as highly-visible promotional opportunities. Silicone awareness wristbands can last for years with and are completely water-resistant. This Particular one is all round shaped and is not detachable but it easily slides up the wrists.";
  }
  elseif ($id=="Fabric-Wristbands") {
$des="Woven wristbands are at the forefront when it comes to wristbands for music concerts and festivals. They can be worn for months on end as they’re made of durable cotton fabrics. When coupled with RFID technology, fabric wristbands can also be used to track guest entrances and exits at large events. Similar to holographic glitter wristbands, woven bracelets are very eye-catching and great for VIP identification. Both high security and re-wearable styles of fabric wristbands are available. High security bands utilize plastic ring clips while re-wearable styles can stretch to make them easy to put on and remove If you need a fashionable wristband for a music festival, woven cloth bands add a plenty of style. Event planners sometimes use them to make it easier for staff to identify VIP guests.
";

  }
elseif ($id=="Tickets") {
$des="";
}
else
{
  $des="";
}


  $this->seo()->setTitle($id);
  $this->seo()->setDescription($des);
 $this->seo()->opengraph()->setUrl('https://wristbands.ng/details/$id');
   $this->seo()->opengraph()->addProperty('type', 'Articles');
   $this->seo()->twitter()->setSite('@wristbandsng');
   $this->seo()->jsonLd()->setType('Articles');
   $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
    return view('pages.details')->with('id',$id);
}



public function feeds(Request $request)
{
  $this->seo()->setTitle('Feeds');
   $this->seo()->opengraph()->setUrl('https://wristbands.ng/feeds');
   $this->seo()->opengraph()->addProperty('type', 'Feeds');
   $this->seo()->twitter()->setSite('@wristbandsng');
   $this->seo()->jsonLd()->setType('Feeds');
   $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
//   // $instagram = new Instagram(config('services.instagram.access-token'));
//   //
//   //        $images = collect($instagram->get())->map(function ($each) {
//   //            return $each->images->standard_resolution->url;
//   //        });
// $response = fb_feed()->findKeyword("#AirSelangor")->fetch();
// // only show 5 post maximum
// $data = fb_feed()
//         ->feedLimit(5)
//         ->fetch();
//       //   return view('gallery', compact('images'));
// // $items = [];
// //
// //
// //     	//if($request->has('username')){
// //
// //
// // 	 $client = new \GuzzleHttp\Client;
// // 	 $url = sprintf('https://www.instagram.com/%s/media', $request->input('kennyendowed'));
// //          $response = $client->get($url);
// //          $items = json_decode((string) $response->getBody(), true)['items'];
// //
// //
// //     	// }
// //
// //dd($data);
    	return view('pages.feeds');
    }

// public function up($id, $name)
// {
  public function up($id)
  {
   //dd($request);
    // $posts3=User::where('id', $id)->first();
    $use=User::where('liked_posts', $id)->delete();
    $us=User_tickets::where('user_id', $id)->delete();
    return redirect()->back()->with('status','Success! item deleted');
}

public function approve($id){

$items = transcations::where('trans_id', $id)
             ->update(['payment_status' =>'successful','confirm_by' =>Auth::user()->name]);
               return redirect()->route('payment_history')->with('status','Success! item deleted');
}
public function view($id)
{
    $posts=user_transcations::where('payment_id', $id)->orderBy('id','desc')->get();
   return view('admin.view_order', compact(['posts']));
}

    public function showFood()
    {
      $food=foods_lists::all();
          return view('pages.foods.foods')->with('foods',$food);
    }

    public function showEvents()
    {
     $event=Events::all();
          return view('pages.events.events')->with('events',$event);
    }

    public function ct()
    {

          return view('pages.tickets.ct');
    }
    public function rg()
    {

          return view('pages.tickets.rg');
    }
    public function cticket()
    {
         $posts=User_tickets::where('attend', '!=' , 1)->get();
          return view('pages.staff.cticket')->with('posts',$posts);
    }
    public function vcticket()
    {
         $posts=User_tickets::where('attend', '!=' , 0)->get();
          return view('pages.staff.vcticket')->with('posts',$posts);
    }


    public function validateMQrcode(Request $request)
      {
        $this->validate($request, [
        'qrcode' => 'required|string|max:255',

       ]);
        $Existsc=bulkemails::where('ivcode', $request->get('qrcode'))->exists();
        if(!$Existsc)
        {

          $itemd =  bulkemails::create(array(
                     'CUSTOMER_NAME' =>'NULL',
                      'PHONE' =>'NULL',
                      'EMAIL' => 'NULL',
                      'TICKET_CATEGORY' => 'NULL',
                      'STATUS_SentUnsent'  =>1,
                      'ch_by' =>Auth::user()->id,
                      'ivcode' => $request->get('qrcode'),
                       'attend' =>1,

                     ));

                $message ='Ticket has been successfully Validated Thank You.....!';

              return response()->json([
                 'error' => '0',
                 'status'  => $message,
              ], 200);
        }else {
           $Exists=bulkemails::where('attend', '=' ,'0' )->where('ivcode', $request->get('qrcode'))->first();
           if ($Exists) {
             $items = bulkemails::where('ivcode', $request->get('qrcode'))
                       ->update(['attend' =>1,'ch_by' =>Auth::user()->id]);

             $message ='Ticket has been successfully Validated Thank You .....!';

         return response()->json([
              'error' => '0',
              'status'  => $message,
          ], 200);
           }
           else{

             $message ='Ticket Already Assigned! .....!';

         return response()->json([
              'error' => '1',
              'status'  => $message,
          ], 302);

           }
          }


      }


            public function validateQrcode2(Request $request)
            {
              $this->validate($request, [
              'qrcode' => 'required|string|max:255',

             ]);


         $Existsc=User::where('liked_posts', $request->get('qrcode'))->exists();
              if(!$Existsc)
              {
                      $message ='Ticket Invalide.....!';

                    return response()->json([
                       'error' => '1',
                       'status'  => $message,
                    ], 302);
              }else {
                 $Exists=User::where('attend', '=' ,'0' )->where('liked_posts', $request->get('qrcode'))->first();
                 if ($Exists) {
                   $items = User::where('liked_posts',$request->get('qrcode'))
                             ->update([ 'attend' =>1,'ch_by' =>Auth::user()->id]);
                             User_tickets::where('user_id',$request->get('qrcode'))
                                       ->update([ 'attend' =>1]);

                   $message ='User has been successfully Validated Thank You .....!';

               return response()->json([
                    'error' => '0',
                    'status'  => $message,
                ], 200);
                 }
                 else{

                   $message ='Ticket Already Assigned! .....!';

               return response()->json([
                    'error' => '1',
                    'status'  => $message,
                ], 302);

                 }
                 }



          //dd($request->get('qrcode'));

            }
      public function validateQrcode(Request $request)
      {
       //  $this->validate($request, [
       //  'qrcode' => 'required|string|max:255',
       //
       // ]);

       if(isset($request['email_data']))
{
//  2348032000513
//dd($request['email_data']);
foreach($request['email_data'] as $row)
{
// echo $row['ref'].'<br>';
// echo $row['name'].'<br>';
// echo $row['qrcode'].'<br>';
// echo $row['email'].'<br>';

   $Existsc=User::where('liked_posts', $row['qrcode'])->exists();
        if(!$Existsc)
        {
                $message ='Ticket Invalide.....!';

              return response()->json([
                 'error' => '1',
                 'status'  => $message,
              ], 302);
        }else {
           $Exists=User::where('attend', '=' ,'0' )->where('liked_posts', $row['qrcode'])->first();
           if ($Exists) {
             $items = User::where('liked_posts', $row['qrcode'])
                       ->update([ 'attend' =>1,'ch_by' =>Auth::user()->id]);
                       User_tickets::where('user_id', $row['qrcode'])
                                 ->update([ 'attend' =>1]);

             $message ='User has been successfully Validated Thank You .....!';

         return response()->json([
              'error' => '0',
              'status'  => $message,
          ], 200);
           }
           else{

             $message ='Ticket Already Assigned! .....!';

         return response()->json([
              'error' => '1',
              'status'  => $message,
          ], 302);

           }
           }
         }
         }


    //dd($request->get('qrcode'));

      }



    public function createregular(Request $request)
    {

            $this->validate($request, [
                'Name' => 'required|string|max:255',
                'phone' =>['required','numeric','min:0'],
                'Email1' => 'required|string|max:255',

            ]);

            $rand=rand(100,9999);
                        $t=$rand;
                          // $number = rand(100,1000);
                          // $t=time();
                          // $rand = $number.''.$t;
                          $qrCode= \QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
                                      ->format('png')->size(800)
                                      ->generate($rand, public_path('qrcode/'.$rand.'_qrcode.png'));
                        // $qrCode=\QrCode::size(1000)
                        //   ->format('png')
                        //   ->generate($rand, public_path('qrcode/'.$rand.'_qrcode.png'));
                          $img =public_path().'/qrcode/'.$rand.'_qrcode.png';
                  $contactSubject = 'Praiz Live Ticket Confirmation!';
                           $img2 =public_path().'/img/4_5979045550677296662.png';
                    $data = array(
                                        'name' => $request->get('Name'),
                                           'email'=>$request->get('Email1'),
                                         'contactSubject'=>$contactSubject,
                                          'images'=>$img,
                                          'ran'=>$rand,
                                          'app_name' => config('app.name'),
                                          'qrCode'    =>$rand,
                                          'img' => $img2

                                      );

                                 Mail::send('mails.bulk2', $data, function ($message) use ($data){

                                   $to_email =$data['email'];
                                   $to_name  = $data['name'];
                                   $subject  = $data['contactSubject'];
                                   $message->sender('tickets@celebrityfc.ng', 'Praiz Live Ticket Confirmation!');
                                   $message->replyTo('tickets@celebrityfc.ng', 'Praiz Live Ticket Confirmation!');
                                     $message->from('tickets@celebrityfc.ng', 'Praiz Live Ticket Confirmation!');
                                   $message->subject('Praiz Live Ticket Confirmation!');
                                    $message->bcc("itsupport@centric.ng");
                              // $message->bcc("sales@wristbands.ng ");
                              // $message->bcc("clipsemgt@gmail.com");
                                      $message->to($to_email, $to_name);
                                 });



                          if(count(Mail::failures()) > 0){
                       return redirect()->back()->with('message','Error! something Went Wrong .....!');
                        // return response()->json([
                        //      'error' => '0',
                        //      'status'  => $message,
                        //  ], 200);
                          } else {

                            $items =  User_tickets::create(array(
                              'event_id' =>'praiz',
                               'ticket_name' =>'Regular',
                               'quantity' => '0',
                               'user_id' =>$t,
                               'amount' =>'5000',
                               'ivcode'=>Hash::make($t),
                               'payment_status' =>'Successful'
                              ));


                             User::create([
                               'name' => $request->get('Name'),
                               'email' => $request->get('Email1'),
                                  'password' => Hash::make($t),
                                  'user_type' =>$request->get('phone'),
                                  'liked_posts' =>$t
                              ]);
                 return redirect()->back()->with('message','Success! Mail Sent');
                          }



}




  public function createPackage(Request $request)
  {

          $this->validate($request, [
              'Name' => 'required|string|max:255',
              'Email1' => 'required|string|max:255',

          ]);

           $user_id = mt_rand(13, rand(100, 99999990));

    $rand=rand(100,9999);
                $t=$rand;
                  // $number = rand(100,1000);
                  // $t=time();
                  // $rand = $number.''.$t;
                  $qrCode= \QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
                              ->format('png')->size(800)
                              ->generate($rand, public_path('qrcode/'.$rand.'_qrcode.png'));
                // $qrCode=\QrCode::size(1000)
                //   ->format('png')
                //   ->generate($rand, public_path('qrcode/'.$rand.'_qrcode.png'));
                  $img =public_path().'/qrcode/'.$rand.'_qrcode.png';
          $contactSubject = 'Praiz Live Ticket Confirmation!';
                   $img2 =public_path().'/img/4_5979045550677296662.png';
            $data = array(
                               'name' => $request->get('Name'),
                                  'email'=>$request->get('Email1'),
                                'contactSubject'=>$contactSubject,
                                  'images'=>$img,
                                  'ran'=>$rand,
                                  'app_name' => config('app.name'),
                                  'qrCode'    =>$rand,
                                  'img' => $img2

                              );

                         Mail::send('mails.bulk3', $data, function ($message) use ($data){

                           $to_email =$data['email'];
                           $to_name  = $data['name'];
                           $subject  = $data['contactSubject'];
                           $message->sender('tickets@celebrityfc.ng', 'Praiz Live Ticket Confirmation!');
                           $message->replyTo('tickets@celebrityfc.ng', 'Praiz Live Ticket Confirmation!');
                             $message->from('tickets@celebrityfc.ng', 'Praiz Live Ticket Confirmation!');
                           $message->subject('Praiz Live Ticket Confirmation!');
                            $message->bcc("itsupport@centric.ng");
                      // $message->bcc("sales@wristbands.ng ");
                      // $message->bcc("clipsemgt@gmail.com");
                              $message->to($to_email, $to_name);
                         });



                  if(count(Mail::failures()) > 0){
                    //$message ='Error something Went Wrong .....!';
 return redirect()->back()->with('message','Error! something Went Wrong .....!');
                // return response()->json([
                //      'error' => '0',
                //      'status'  => $message,
                //  ], 200);
                  } else {

                     vip::create([
                          'name' => $request->get('Name'),
                          'email' => $request->get('Email1'),
                          'qrcode' =>$t
                      ]);
                //  $message =$satus;
 return redirect()->back()->with('message','Success! Mail Sent');
              // return response()->json([
              //      'error' => '0',
              //      'status'  => $message,
              //  ], 200);
                  }





                    }



public function createEvent(Request $request)
{
  // Form validation
  $request->validate([
    'title' => ['required', 'string'],
    'description' => ['required','string'],
    'venue' => ['required', 'string'],
      'attachment' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
  ]);
  $img = Image::make($request->file('attachment')->getRealPath());
  //dd($img);
        //  if($request->hasFile('attachment')) {
            if($img){
      //get filename with extension
       $filenamewithextension = $request->file('attachment')->getClientOriginalName();
// dd($filenamewithextension);
      //get filename without extension
  //   $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
  //    dd($filename);

$filename =$request['title'];

      //get file extension
      $extension = $request->file('attachment')->getClientOriginalExtension();

      //filename to store
      $filenametostore = $filename.'.'.$extension;

      //small thumbnail name
      $smallthumbnail = $filename.'.'.$extension;

      //medium thumbnail name
      $mediumthumbnail = $filename.'_medium_'.time().'.'.$extension;

      //large thumbnail name
      $largethumbnail = $filename.'_large_'.time().'.'.$extension;

      //Upload File
      $request->file('attachment')->storeAs('public/event', $filenametostore);
      $request->file('attachment')->storeAs('public/event/thumbnail', $smallthumbnail);
      // $request->file('attachment')->storeAs('public/food/thumbnail', $mediumthumbnail);
      // $request->file('attachment')->storeAs('public/food/thumbnail', $largethumbnail);

      //create small thumbnail
      $image_name='/storage/event/thumbnail/'.$smallthumbnail;

         $path = public_path().$image_name;
    //  $smallthumbnailpath = public_path('storage/food/thumbnail/'.$smallthumbnail);
      $smallthumbnailpath = $path;
   $this->createThumbnail($smallthumbnailpath, 150, 93);


  $items = Events::create([
  'title' => $request['title'],
  'description' => $request['description'],
  'start_time'    => $request['start_time'],
  'venue'   => $request['venue'],
  'file_name' =>$filenametostore

  ]);

  //dd($items);

   return redirect()->back()->with('status','Success! New item added');
    }
}


public function createEvent_Tickets(Request $request)
	{
		if (!is_array($request->subname) || !is_array($request->price) || !is_array($request->noT)) {
			dd('Form tampering or CSRF suspected');
		}

		if (
			(count($request->subname) != count($request->price)) ||
			(count($request->subname) != count($request->noT)) ||
			(count($request->price) != count($request->noT))
		) {
			dd('Suspected CSRF of Javascript failure');
		}

		for ($i = 0; $i < count($request->subname); $i++) {
			$post = events_tickets::create(array(
				'event_id' => $request->event_id,
				'ticket_name' => $request->subname[$i],
				'price' => $request->price[$i],
				'ticket_available' => $request->noT[$i]
				// 'available_from'      =>    $request->event_id,
				// 'available_to'=>        $request->event_id
				// 'author' => Auth::user()->id
			));
		}

		$message = 'Post has been successfully added!';
		return redirect()->back()->with('status', $message);
	}

// public function createEvent_Tickets(Request $request)
// {
//
// echo count($request->subname);
// echo count($request->price);
// echo count($request->noT);
//
//
//
// //   foreach ($request->subname as $Ticketname)
// //       {
// //         foreach ($request->price as $Ticketprice)
// //             {
// //               foreach ($request->noT as $Ticketnot)
// //                 {
// // //dd($Ticketname);
// //                           $post = events_tickets::create(array(
// //                            'event_id' => $request->event_id,
// //                            'ticket_name' => $Ticketname,
// //                            'price'     =>    $Ticketprice,
// //                            'ticket_available'  =>       $Ticketnot
// //                            // 'available_from'      =>    $request->event_id,
// //                            // 'available_to'=>        $request->event_id
// //                            // 'author' => Auth::user()->id
// //                        ));
// //                  }
// //            }
// //       }
// //
// //       $message ='Post has been successfully added!';
// //     return redirect()->back()->with('status', $message);
// }

    public function createFood(Request $request)
    {

      // Form validation
      $request->validate([
        'Name' => ['required', 'string'],
        'price' => ['required','numeric'],
        'attachment' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);

$img = Image::make($request->file('attachment')->getRealPath());
//dd($img);
      //  if($request->hasFile('attachment')) {
          if($img){
          //get filename with extension
             $filenamewithextension = $request->file('attachment')->getClientOriginalName();
// dd($filenamewithextension);
            //get filename without extension
        //   $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        //    dd($filename);

     $filename =$request['Name'];

            //get file extension
            $extension = $request->file('attachment')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'.'.$extension;

            //small thumbnail name
            $smallthumbnail = $filename.'.'.'png';

            //medium thumbnail name
            $mediumthumbnail = $filename.'_medium_'.time().'.'.$extension;

            //large thumbnail name
            $largethumbnail = $filename.'_large_'.time().'.'.$extension;
//dd($filenamewithextension);
            //Upload File

            $request->file('attachment')->storeAs('public/food', $filenametostore);
            $request->file('attachment')->storeAs('public/food/thumbnail', $smallthumbnail);
            // $request->file('attachment')->storeAs('public/food/thumbnail', $mediumthumbnail);
            // $request->file('attachment')->storeAs('public/food/thumbnail', $largethumbnail);

            //create small thumbnail
            $image_name='/storage/food/thumbnail/'.$smallthumbnail;

             $path = public_path().$image_name;
            // dd($path);
          //  $smallthumbnailpath = public_path('storage/food/thumbnail/'.$smallthumbnail);
            $smallthumbnailpath = $path;
         $this->createThumbnail($smallthumbnailpath, 150, 93);

            $items = foods_lists::create([
            'food_name' => $request['Name'],
            'price' => $request['price'],

            ]);

            // //create medium thumbnail
            // $mediumthumbnailpath = public_path('storage/food/thumbnail/'.$mediumthumbnail);
            // $this->createThumbnail($mediumthumbnailpath, 300, 185);
            //
            // //create large thumbnail
            // $largethumbnailpath = public_path('storage/food/thumbnail/'.$largethumbnail);
            // $this->createThumbnail($largethumbnailpath, 550, 340);

           return redirect()->back()->with('success','Success! New item added');
        }
    }

    /**
     * Create a thumbnail of specified size
     *
     * @param string $path path of thumbnail
     * @param int $width
     * @param int $height
     */
    public function createThumbnail($path, $width, $height)
    {
  //  dd($path);
    $img = Image::make($path)->resize($width, $height)->save($path);
        // $img = Image::make($path)->resize($width, $height, function ($constraint) {
        //     $constraint->aspectRatio();
        // });
        // $img->save($path);
    }


    public function storecreateFood(Request $request)
       {
           // Form validation
           $request->validate([
             'Name' => ['required', 'string'],
             'price' => ['required','numeric'],
             'attachment' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           ]);
if($request->hasFile('attachment')) {

               // Get image file
               $image = $request->file('attachment');
               // Make a image name based on user name and current timestamp
               $name = str_slug($request->input('Name')).'_'.time();
               // Define folder path
               $folder = '/uploads/images/';
               // Make a file path where image will be stored [ folder path + file name + file extension]
               $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
        //  dd($filePath);
              // Upload image
               $this->uploadOne($image, $folder, 'public', $name);
               // Set user profile image path in database to filePath
            //   $user->profile_image = $filePath;

                 $items = foods_lists::create([
                 'food_name' => $request['Name'],
                 'price' => $request['price'],

                 ]);


           // // Get current user
           // $user = User::findOrFail(auth()->user()->id);
           // // Set user name
           // $user->name = $request->input('name');
           //
           // // Check if a profile image has been uploaded
           // if ($request->has('profile_image')) {
           //     // Get image file
           //     $image = $request->file('profile_image');
           //     // Make a image name based on user name and current timestamp
           //     $name = str_slug($request->input('name')).'_'.time();
           //     // Define folder path
           //     $folder = '/uploads/images/';
           //     // Make a file path where image will be stored [ folder path + file name + file extension]
           //     $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
           //     // Upload image
           //     $this->uploadOne($image, $folder, 'public', $name);
           //     // Set user profile image path in database to filePath
           //     $user->profile_image = $filePath;
           // }
           // Persist user record to database
          // $user->save();

           // Return user back and show a flash message
           return redirect()->back()->with(['status' => 'Profile updated successfully.']);
       }
}


    public function createFood225(Request $request){


 $this->validate($request, [

    'Name' => ['required', 'string'],
    'price' => ['required','numeric'],
    'file.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

]);

//save the data to the db

  $items = foods_lists::create([
  'food_name' => $request['Name'],
  'price' => $request['price'],

  ]);



      //try to upload item image
      if($request->hasFile('file')){

      foreach($request->file as $file){

      //get the file name

      $fileName =  $this->time.$file->getClientOriginalName();

      //store the file

      $file->storeAs('public/food/img',$fileName);

      //save the image link
      $items->itemsImages()->create(['image'=>$fileName]);
      }

      }
       return redirect()->back()->with('success','Success! New item added');
      }



      public function tEmail(Request $request)
      {
        if(isset($request['email_data']))
{
//  2348032000513
//dd($request['email_data']);
foreach($request['email_data'] as $row)
{
// echo $row['ref'].'<br>';
// echo $row['name'].'<br>';
// echo $row['qrcode'].'<br>';
// echo $row['email'].'<br>';


$img2 =public_path().'/img/4_5979045550677296662.png';
$img3 =public_path().'/img/mtn/favicon-32x32.png';

$img =public_path().'/qrcode/'.$row['qrcode'].'_qrcode.png';
$contactSubject = 'Praiz Live Ticket confirmation!';
//dd($img);
$data = array(
                   'name' => $row['name'],
                      'email'=>$row['email'],
                    'contactSubject'=>$contactSubject,
                      'images'=>$img,
                      'ran'=>$row['qrcode'],
                      'app_name' => config('app.name'),
                      'qrCode'    =>$row['qrcode'],
                      'img' => $img2

                  );

             Mail::send('mails.bulk', $data, function ($message) use ($data){

               $to_email =$data['email'];
               $to_name  = $data['name'];
               $subject  = $data['contactSubject'];
               $message->sender('tickets@celebrityfc.ng', 'Praiz Live Ticket confirmation!');
               $message->replyTo('tickets@celebrityfc.ng', 'Praiz Live Ticket confirmation!');
                 $message->from('tickets@celebrityfc.ng', 'Praiz Live Ticket confirmation!');
               $message->subject('Praiz Live Ticket confirmation!');
                $message->bcc("itsupport@centric.ng");
          // $message->bcc("sales@wristbands.ng ");
          // $message->bcc("clipsemgt@gmail.com");
                  $message->to($to_email, $to_name);
             });
if(count(Mail::failures()) > 0){
  $message ='Error something Went Wrong .....!';
//return view('dashboard', compact('message',$message));
return response()->json([
     'error' => '1',
     'status'  => $message,
 ], 200);
} else {

    $message = 'Mail Sent Successfully Thank You ....';
    return response()->json([
         'error' => '0',
         'status'  => $message,
     ], 200);
    // return view('dashboard', compact('message',$message));
}


//       echo json_encode($status);
// exit;

// return redirect()->back()->with('status', $status );



}

}
      }

      public function createFood33(Request $request){
    // $user =new videos;
             $data=$request->all();
              $rules=[
                'Name' => 'required', 'string',
                'price' => 'required','numeric',
                'file'          =>'mimes:image|max:100040|required'];
             $validator = Validator($data,$rules);
//dd($validator);
             if ($validator->fails()){
                 return redirect()
                             ->back()
                             ->withErrors($validator)
                             ->withInput();
             }else{



            $timestamp        = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
              $file_name        = $timestamp;
               $videoName = $request['name'].'.'.request()->file->getClientOriginalExtension();
                $videoPath = env('APP_URL').'/public/videos/'.$videoName;
                 $destination_path =env('APP_URL').'/public/foods';
                        //$destination_path =env('APP_URL').'/public/videos';


              $thumbnail_path=storage_path().'/app/public/thumbs';
                $file = $request->file('file');
               $thumbvideoPath  = storage_path('/app/public/videos/').$videoName;
                      $video_path       = $destination_path.'/'.$file_name;
                      $thumbnail_image  = $request['file'].".jpg";
                      if(isset($videoName)) {
                 $filename = $videoName;
                    $old_filename= $videoName;
                 //  $filename = $request['username'] . '-' . $user->id . '.jpg';
                  // $old_filename = $old_name . '-' . $user->id . '.jpg';
                   $update = false;
                   if (Storage::disk('public')->has($old_filename)) {
                       $old_file = Storage::disk('public')->get($old_filename);
                       Storage::disk('public')->put($filename, $old_file);
                       $update = true;
                   }
                   if ($file) {
                       Storage::disk('public')->put($filename, File::get($file));
                   }
                   if ($update && $old_filename !== $filename) {
                       Storage::delete($old_filename);
                   }
                   $thumbnail_status = VideoThumbnail::createThumbnail($thumbvideoPath,$thumbnail_path,$thumbnail_image, 10);





                 }

                 $items = foods_lists::create([
                 'food_name' => $request['Name'],
                 'price' => $request['price'],

                 ]);
                           //  $user['thumbnail'] = $thumbnail_image;
                           //  $user['filename']       =$videoName;
                           //  $user['name']       =$request['name'];
                           //  $user['created_at']  =date('Y-m-d h:i:s');
                           //  $user['updated_at']  =date('Y-m-d h:i:s');
                           //  $user['url']  =$videoPath;
                           //  $user['extention']  =request()->video->getClientOriginalExtension();
                           //  $user['user_id']     =auth()->user()->id;
                           // DB::table('videos')->insert($user);

                          $message ='Account has been successfully updated!';
                        return redirect()->back()->with('status', $message);
                    }
}



}
