<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use App\user;
use Illuminate\Support\Facades\Auth;

class TwitterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/contacto';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/login');
    }

    public function redirectToProvider(){

        return Socialite::driver('twitter')->redirect();
    }




//para hacer lo de faceebook

    public function handleProviderCallback(){

        $ususuarioSocilite=Socialite::driver('twitter')->user();

       //$newvar=dd($ususuarioSocilite);

        $user=User::where('ci',$ususuarioSocilite->id)->first();


        if($user){
            if(Auth::loginUsingId($user ->id)){

                return redirect()->route('home');
            }

        }


        $usuarioregistro = User::create([
            'username' =>$ususuarioSocilite->name,
            'nombre' =>$ususuarioSocilite->name,
            'imagen' =>$ususuarioSocilite->avatar_original,
'ci' =>$ususuarioSocilite->id,
            'email' =>$ususuarioSocilite->email,
            'password'=> bcrypt('1234'),

      

        ]);

        if($usuarioregistro){

            if(Auth::loginUsingId($usuarioregistro->id)){

                return redirect()->route('home');
            }
        }

    }
}
