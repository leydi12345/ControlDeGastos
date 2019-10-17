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

    public function redirect1(){

    	return Socialite::driver('twitter')->redirect();
    } 

    public function callback1(){
    	$user=Socialite::driver('twitter')->user();

    	return ($user->getAvatar());
    }

    public function redirect2(){

    	return Socialite::driver('Instagram')->redirect();
    } 

    public function callback2(){
    	$user=Socialite::driver('Instagram')->user();

    	return ($user->getAvatar());
    }


    public function redirect3(){

    	return Socialite::driver('google')->redirect();
    } 

    public function callback3(){
    	$user=Socialite::driver('google')->user();

    	return ($user->getAvatar());
    }
}
