<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;


use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
class SocialController extends Controller
{
    //

    public function redirect(){

    	return Socialite::driver('facebook')->redirect();
    } 

    public function callback(){
    	$user=Socialite::driver('facebook')->user();

    	return ($user->getAvatar());
    }
}
