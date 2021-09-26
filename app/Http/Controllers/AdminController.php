<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Session;
use Illuminate\Support\Facades\Validator;
use App\User;
use Carbon\Carbon;
use App\Traits\UploadTrait;
use App\Traits\MailTrait;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class AdminController extends Controller
{

    use SEOToolsTrait;
    use UploadTrait;
    use MailTrait;


    public function BasicSettings()
    {
        $data['page_title'] = "Basic Settings";
        $this->seo()->setTitle('Basic Settings');
         $this->seo()->setDescription('We are a company that specializes in the supply and printing of wristbands, Lanyards, tickets and event technology support services. At Wristbands Nigeria Limited we produce and deliver the best of variation of wristbands | Wristbands');
         $this->seo()->opengraph()->setUrl('https://wristbands.ng/About');
         $this->seo()->opengraph()->addProperty('type', 'About');
         $this->seo()->twitter()->setSite('@wristbandsng');
         $this->seo()->jsonLd()->setType('About');
         $this->seo()->jsonLd()->addImage('https://wristbands.ng/img/wristbands.png');
          return view('admin.basicsettings',$data);
    }
}
