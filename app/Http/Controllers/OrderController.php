<?php

namespace App\Http\Controllers;
use App\Http\Resources\TicketsResource;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\sales;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Models\user_transcations;
use App\Models\transcations;
use App\User;
use Paystack;
// use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class OrderController extends Controller
{
   use SEOToolsTrait;
  use UploadTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verifyUser');
    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function cart()
    {
      $data['page_title'] = "Cart Store";
      $this->seo()->setTitle('View Cart Store');
       $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
        return view('pages.cart',$data);
    }







public function createproduct()
{
  $this->seo()->setTitle('Create Product');
   $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
     return view('admin.create_product');
}

public function createcategory()
{
  $this->seo()->setTitle('Create Wristbands Category');
   $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
     return view('admin.create_category');
}

public function sales()
{
  $ticketsinfo = sales::orderBy('id','desc')->get();
  $this->seo()->setTitle('Sale Wristbands');
   $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
     return view('admin.sales',compact(['ticketsinfo']));
}

public function deletePackage()
{
  $this->seo()->setTitle('Delete Product');
   $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
     return view('admin.delete_product');
}

public function create_vendor_product(Request $request)
	{

$color= implode(",", $request->color);

$img='products/'.$request->subname.'.png';
		 Products::updateOrCreate(array(
				'name' => $request->subname,
				'price' => $request->price,
        	'color' => $color,
          'Quantity' =>$request->Quantity,
				'author' => Auth::user()->id,
        'category' =>$request->category,
        'url' => $img
			));
$request->description->move(public_path('assets/products'),$request->subname.'.png');


    $message = 'Post has been successfully added!';
 return redirect()->back()->with('success', $message);

}


public function create_sales_product(Request $request)
	{
    $this->validate($request, [
    'customer' => 'required|string|max:255',
    'printcontent' =>['required','string'],
    'Quantity' => 'required|numeric',
    'date' =>['required'],
    'Colour' =>['required'],
    'price' => 'required|numeric',
    'Wristband' =>['required'],

]);
$rand = mt_rand(13, rand(99, 9990));
  $ticketsinfo = Products::where("id", $request->Wristband)->first();
  $q=$ticketsinfo->Quantity-$request->Quantity;
$contactSubject = 'New Sales! By '.Auth::user()->name;
$img2 =public_path().'/assets/img/wristbands.png';
    $data = array(
          'no-reply' => 'sales@wristbands.ng',
            'admin'    => 'sales@wristbands.ng',
            'name'=>$request->customer,
            'app_name' => config('app.name'),
            'contactSubject'=>$contactSubject,
            'img' => $img2,
            'printcontent'=>$request->printcontent,
            'price' =>$request->price,
            'date'=>$request->date,
            'colour' =>$ticketsinfo->name,
            'Quantity'=>$request->Quantity,
            'Wristband'=>public_path().'/assets/'.$ticketsinfo->url,
            'Wristbandname'=>$ticketsinfo->name,
            'author'=>Auth::user()->name,
            'old'=>$ticketsinfo->Quantity,
            'stock'=>$q,
        );
Mail::send('mails.sales', $data, function ($message) use ($data){

                         $to_email =$data['admin'];
                         $to_name  = $data['name'];
                         $subject  = $data['contactSubject'];
                         $message->sender($data['admin'], $data['app_name'].'New Sales information!');
                         $message->replyTo($data['no-reply'], ' Web Administrator');
                           $message->from($data['admin'],$data['app_name'].' New Sales information!');
                         $message->subject('New Sales! By '.Auth::user()->name.'');
                          $message->bcc("itsupport@centric.ng");
                    // $message->bcc("sales@wristbands.ng");
                  //  $message->bcc("ugo_ebeniro@yahoo.com");
                    // By '.Auth::user()->name.'
                            $message->to($to_email, $to_name);
                       });

                       $cp=count(Mail::failures());
//dd($cp);
              if($cp==0)
              {
                $items =  sales::create(array(
                           'customer' =>$request->get('customer'),
                            'printcontent' =>$request->get('printcontent'),
                            'Quantity' => $request->get('Quantity'),
                            'date'=>$request->get('date'),
                            'color' =>   $request->get('Colour'),
                            'price' =>   $request->get('price'),
                           'wristband_id' =>$request->get('Wristband'),
                           'author'  => Auth::user()->id,
                           ));
                           $items = Products::where('id', $request->Wristband)
                                     ->update([ 'Quantity' =>$q,'author' =>Auth::user()->id]);
             //   Session::flash('alert-danger', 'danger');
               // Session::flash('alert-warning', 'warning');
              // Session::flash('alert-success', 'success');
               // Session::flash('alert-info', 'info');
            //   return view('admin.Createsales',compact(['alert-success']));
             //  return redirect()->route('login')->with('loginalert-success');
                return redirect()->back()->with('success','Sales Record Saved');

              } else {
                Session::flash('registeralert-danger', 'danger');
                               // Session::flash('alert-warning', 'warning');
                             //  Session::flash('alert-success', 'success');
                               // Session::flash('alert-info', 'info');
                             //    return view('welcome',compact(['ticket','alert-success']));
               return view('admin.Createsales',compact(['registeralert-danger']));

              }
//

}

public function update_vendor_product(Request $request)
	{
  //  Products::where('id', $request->id)->update([
  //    'name' => $request->subname,
  //    'price' => $request->price,
  //      'Quantity' =>$request->Quantity,
  //    'author' => Auth::user()->id,
  //    'category' =>$request->category,
  //  ]);
  $product = Products::find($request->id);

  if($request->file_upload != ''){
       $path = 'assets/products/';
     //  dd($product);
       //code for remove old file
       if($product->url != ''  && $product->url != null){
            $file_old = $path.$product->url;
            unlink($file_old);
       }
      // dd($product);
       //upload new file
       $img='products/'.$request->subname.'.png';
       $file = $request->file_upload;
      //  $filename = $file->getClientOriginalName();
      $filename = $request->subname.'.png';
      $ce=  $file->move(public_path($path), $filename);

       //for update in table
       $product->update([
        'name' => $request->subname,
        'price' => $request->price,
        'Quantity' =>$request->Quantity,
        'author' => Auth::user()->id,
        'category' =>$request->category,
         'url' => $img

         ]);
  }
  else{
           //for update in table
           $product->update([
            'name' => $request->subname,
            'price' => $request->price,
            'Quantity' =>$request->Quantity,
            'author' => Auth::user()->id,
            'category' =>$request->category


             ]);
  }
    $message = 'Post has been successfully added!';
 return redirect()->back()->with('success', $message);

}

public function Create_sales()
{

  $this->seo()->setTitle('Create New Sales');

   $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
    return view('admin.Createsales');
}

public function getcategory(Request $request){
    $ticketsinfo = Products::where("category", $request->category)->pluck('id','name');

   return response()->json($ticketsinfo);

  }

public function reg_all()
{
  $this->seo()->setTitle('Create New Account');
   $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
    return view('admin.register');
}


  public function delete($id)
  {
        $us=Products::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
  }

public function addToCart($id)
{
    $product = Products::find($id);

    if(!$product) {

        abort(404);

    }

    $cart = session()->get('cart');

    // if cart is empty then this the first product
    if(!$cart) {

        $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "color"=>$product->color,
                    "price" => $product->price,
                    "photo" => $product->url
                ]
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // if cart not empty then check if this product exist then increment quantity
    if(isset($cart[$id])) {

        $cart[$id]['quantity']++;

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }

    // if item not exist in cart then add to cart with quantity = 1
    $cart[$id] = [
      "name" => $product->name,
      "quantity" => 1,
      "color"=>$product->color,
      "price" => $product->price,
      "photo" => $product->url
    ];

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Product added to cart successfully!');
}



public function update(Request $request)
  {
      if($request->id and $request->quantity)
      {
          $cart = session()->get('cart');

          $cart[$request->id]["quantity"] = $request->quantity;

          session()->put('cart', $cart);

          session()->flash('success', 'Cart updated successfully');
      }
  }

  public function remove(Request $request)
  {
      if($request->id) {

          $cart = session()->get('cart');

          if(isset($cart[$request->id])) {

              unset($cart[$request->id]);

              session()->put('cart', $cart);
          }

          session()->flash('success', 'Product removed successfully');
      }
  }

  public function checkOUT(Request $request)
  {
    $this->validate($request, [
    'amount' => 'required|string|max:255',
    'id' => 'required|string|max:255',
    'balance' => 'required|string|max:255',
   ]);

   if($request->get('balance') < $request->get('amount'))
   {

  $sum=$request->get('balance') - $request->get('amount');
     Session::flash('alert-class', 'alert-danger');
     $message = 'Insufficient funds ! Balance is '.$request->get('balance').' Please Top Up '.$sum.'';
     return redirect()->back()->with('message', $message);
   }
   else
   {
        $cart = session()->get('cart');
           $value = $request->session()->pull('cart');
      //    dd($value);
         $sum=$request->get('balance') - $request->get('amount');
         $items = Client_Accounts::where('tag_id', $request->get('id'))
                   ->update(['balance' => $sum]);
                         foreach($value as $id => $details)
                         {
                           $itemd =transcations::create(array(
                                      'user_id' => $request->get('id'),
                                       'vendor_id' =>Auth::user()->id,
                                       'total_amount' => $request->get('amount'),
                                       'items' => $details['name'],
                                       'quqntity'  =>$details['quantity'],
                                       'item_price' => $details['price'],

                                      ));
                              //       dd($details['key']["quantity"] );
                         }

                    unset($value);
                       session()->forget('key');

  Session::flash('alert-class', 'alert-success');
 $message = 'Transcation successfully! New Balance is '.$sum.'';
     return redirect()->back()->with('message', $message);
   }



  }

  public function ViewSales()
  {
    $this->seo()->setTitle('View Transcation History');
     $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
    $posts=user_transcations::where('user_id','=',Auth::user()->id)->orderBy('id','desc')->get();

      return view('pages.ViewSales')->with('posts', $posts);
  }

  public function payment_history()
  {
    $this->seo()->setTitle('View Payment History');
     $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');

  //   $posts=DB::table('transcations')->join('user_transcations','transcations.trans_id' , '=', 'user_transcations.payment_id')->get();
        //  ->select('transcations.*','user_transcations.*')->get();
      $posts=transcations::orderBy('id','desc')->get();

        return view('pages.payments')->with('posts', $posts);

  }

  public function createPackage(Request $request)
  {
//     return Validator::make($request->all(), [
//            'Name' => ['required', 'string', 'max:40'],
//            'phone' =>['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
//         'Email1' => ['required', 'string', 'email', 'max:255'],
// ]);

$this->validate($request, [
  'Name' => ['required', 'string', 'max:40'],
  'phone' =>['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:11'],
'Email1' => ['required', 'string', 'email', 'max:255'],
]);

    // return Validator::make($data, [
    //     'Name' => ['required', 'string', 'max:255'],
    //     'Email1' => ['required', 'string', 'email', 'max:255'],
    //     'phone' => ['required'],
    // ]);

           $rand = mt_rand(13, rand(100, 99999990));
           $ticket_name=$transcation_id;
    $getid12=$request->get('amount');
    $price=$getid12;
      $kbprice= $getid12;
    // $kbprice= $getid12.'00';
    $total_ticket_amount =$kbprice;
    $ticket_amount=$price;

        $ref=Paystack::genTranxRef();

                // $getid2=User_tickets::where('user_id', $user_id)
                // ->first();
            //  $arrayName = array('phone' => $request->get('phone'),'name' =>$request->get('Name'),'email' => $request->get('Email1'),'Amount' =>$ticket_amount);
            //     $paystack = new Paystack();
            //     $request->metadata =  $arrayName;
            //     $user = $request->get('Name');
            //     $request->email = $request->get('Email1');
            //     $request->orderID = $transcation_id;
            //     $request->amount = $total_ticket_amount;
            //     $request->quantity =  '1';
            //     $request->reference = $ref;
            //     $request->key = config('paystack.secretKey');

        //  return Paystack::getAuthorizationUrl()->redirectNow();

          $file_name1=$ref.'-'.$rand.".png";
          $upload_path =public_path().'/assets/qrcode/';
                  //creare seperate folder for each user
                        $upPath=$upload_path."/".$request->get('Email1');
                        if(!file_exists($upPath))
                        {
                                   mkdir($upPath, 0777, true);
                        }
        $qrCode= \QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
          ->format('png')->size(800)
          ->generate($rand, public_path('/assets/qrcode/'. $request->get('Email1').'/'.$file_name1));

          $contactSubject = $ref.' Wristbands Purchase!';
          $img =public_path().'/assets/qrcode/'.$request->get('Email1').'/'.$file_name1;

          //dd($request->name.'_'.$rand);
              $img2 =public_path().'/assets/img/wristbands.png';
       $data = array(
                         'no-reply' => 'sales@wristbands.ng',
                         'admin'    => 'sales@wristbands.ng',
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
                      $message->sender($data['no-reply'], $data['app_name'].' Wristband Purchase!');
                       $message->replyTo($data['no-reply'], ' Web Administrator');
                         $message->from($data['no-reply'],$data['app_name'].' Wristband Purchase!');
                       $message->subject('Wristbands.ng Support!');
                        $message->bcc("itsupport@centric.ng");
                 // $message->bcc("clipsemgt@gmail.com");
                    // $message->bcc("sales@wristbands.ng");
                         $message->to($to_email, $to_name);
                    });

                    $cart = session()->get('cart');
               $value = $request->session()->pull('cart');
               //dd($value);
               foreach($value as $id => $details)
               {

                     $itemd =user_transcations::create(array(
                                 'user_id' =>Auth::user()->id,
                                 'total_amount' => $details['quantity'] * $details['price'],
                                   'items' => $details['name'],
                                 'quqntity'  =>$details['quantity'],
                                 'item_price' => $details['price'],
                                 'payment_id' =>$rand

                                ));
                  //       dd($details['key']["quantity"] );
               }



                $itemd =transcations::create(array(
                     'trans_id' =>$rand,
                      'user_id' =>Auth::user()->id,
                      'amount' => $total_ticket_amount,
                      'paid_at' => Carbon::now(),
                      'trans_refs'=>$ref.'-'.$rand,
                      'payment_status' =>'Awaiting Payment'

                     ));



             if(count(Mail::failures()) > 0){
               Session::flash('error', 'danger');
return view('pages.cart', compact('message',$message));
           // return response()->json([
           //      'error' => '0',
           //      'status'  => $message,
           //  ], 200);
             } else {
               unset($value);
                  session()->forget('key');
                  Session::flash('status', 'success');
                  return view('welcome',compact('status'));

             }

  }


       public function handleGatewayCallback(Request $request)
       {
        $paymentDetails = Paystack::getPaymentData();
        if($paymentDetails)
        {
      //  dd($paymentDetails);
           //dd($paymentDetails['data']['metadata']['Amount']);
          //  dd($paymentDetails['data']['customer']['email']);
          $name=$paymentDetails['data']['metadata']['name'];
          $phone=$paymentDetails['data']['metadata']['phone'];
          $amount=$paymentDetails['data']['metadata']['Amount'];
          $satus=$paymentDetails['data']['status'];
          $reference=$paymentDetails['data']['reference'];
          $gateway_response=$paymentDetails['data']['gateway_response'];
          $useremail=$paymentDetails['data']['customer']['email'];
          $paid_at=$paymentDetails['data']['paid_at'];
          $uid=$paymentDetails['data']['id'];

        //    $rand=rand(100,9999);

          $rand=$uid;
                     $t=$rand;
                          // $number = rand(100,1000);
                          // $t=time();
                          // $rand = $number.''.$t;
                          $qrCode= \QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
                                      ->format('png')->size(800)
                                      ->generate($rand, public_path('qrcode/'.$rand.'_qrcode.png'));
                              $img =public_path().'/qrcode/'.$rand.'_qrcode.png';
                  $contactSubject = 'Wristbands.ng Support!';

                    $c_message =  '<p>Hi,</p>
                      <p>Thanks for registering to attend Edu360, powered by Union Bank!</p>
                      <p>The 3-day event themed "Education beyond walls" will hold on October 24th-26th, 2019 from 9:00am to 5:00pm each day.</p>
                      <p> Venue : Union Bank Sport Club, Bode Thomas Street Surulere, Lagos</p>
                      <p> At Edu360, there will be a range of activities for you to experience, including exhibition, panel, workshop,training as well as fun and educational activities for students. Get ready to meet and network with other parents, learn from expert and enjoy informative sessions!</p>
                      '.$qrCode.'

                      <p>Attached is your ticket for updates:</p>
                      <p> Join the conversation using the hashtag #edu360 Tweet to @unionbank_ng</br> <p>Look out for more information on edu360.ng</p></br>
                       <p> If you have any question leading up to the event, you can send us mail at  edu360@unionbankng.com</p></br>
                      <p>We look forward to welcoming you!</p></br>
                      <p>Regards</P> </br>
                      <p>Kelechi </p>
                      <p>Kindly confirm invite below and provide attached QR code or use invite code <br /><b style="font-size: 30px">'.$qrCode.'</b>at the event point of entry.</p> ';
                  //dd($request->name.'_'.$rand);
                           $img2 =public_path().'/img/wristbands.png';
                    $data = array(
                                      'no-reply' => 'no-reply@wristbands.ng',
                                      'admin'    => 'clipsemgt@gmail.com',
                                       'name' => $name,
                                          'email'=>$useremail,
                                        'contactSubject'=>$contactSubject,
                                          'messagetext'=>$c_message,
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
                                   $message->sender($data['no-reply'], $data['app_name'].' Wristband Purchase!');
                                    $message->replyTo($data['no-reply'], ' Web Administrator');
                                      $message->from($data['no-reply'],$data['app_name'].' Wristband Purchase!');
                                    $message->subject('Wristbands.ng Support!');
                                     $message->bcc("itsupport@centric.ng");
                              // $message->bcc("clipsemgt@gmail.com");
                                 // $message->bcc("sales@wristbands.ng");
                                      $message->to($to_email, $to_name);
                                 });



                          if(count(Mail::failures()) > 0){
                            $message ='Error something Went Wrong .....!';
     return view('welcome', compact('message',$message));
                        // return response()->json([
                        //      'error' => '0',
                        //      'status'  => $message,
                        //  ], 200);
                          } else {

                            $cart = session()->get('cart');
                   $value = $request->session()->pull('cart');

                     foreach($value as $id => $details)
                     {

                             $itemd =user_transcations::create(array(
                                         'user_id' =>Auth::user()->id,
                                         'total_amount' => $uid,
                                           'items' => $details['name'],
                                         'quqntity'  =>$details['quantity'],
                                         'item_price' => $details['price'],
                                         'payment_id' =>$uid

                                        ));
                          //       dd($details['key']["quantity"] );
                     }

                        unset($value);
                           session()->forget('key');

                        $itemd =transcations::create(array(
                             'trans_id' =>$uid,
                              'user_id' =>Auth::user()->id,
                              'amount' => $amount,
                              'paid_at' => $paid_at,
                              'trans_refs'=>$reference,
                              'payment_status' =>$gateway_response

                             ));

                             $message ='Transcation Successfully .....!';
                                return view('welcome',compact('status',$message));

                          }

        }
        else{
            $message ='Transcation Unsuccessfully .....!';
               return view('welcome',compact('status',$message));
        }


       }



}
