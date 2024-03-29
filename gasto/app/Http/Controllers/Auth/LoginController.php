<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Socialite;
use App\user;
use Illuminate\Support\Facades\Auth;
use App\Rules\Captcha;

class LoginController extends Controller
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


    public function refreshCaptcha()
    {

        return  captcha_img();
    }

     protected function validator(array $data)
    {
        return Validator::make($data, [
           
            'captcha' => 'required|captcha',
        ]);
    }

    


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

        return Socialite::driver('facebook')->redirect();
    }




//para hacer lo de faceebook

    public function handleProviderCallback(){

        $ususuarioSocilite=Socialite::driver('facebook')->user();

        $user=User::where('ci',$ususuarioSocilite->id)->first();


        if($user){
            if(Auth::loginUsingId($user ->id)){

                return redirect()->route('home');
            }

        }


        $usuarioregistro = User::create([
            'nombre' =>$ususuarioSocilite->user['name'],
            'email' =>$ususuarioSocilite->email,
            'password'=> bcrypt('1234'),
            'ci' =>$ususuarioSocilite->id,
            'imagen' =>$ususuarioSocilite->avatar_original,
            'direccion' =>$ususuarioSocilite->profileUrl,
            'genero' =>$ususuarioSocilite->user['id'],            

        ]);

        if($usuarioregistro){

            if(Auth::loginUsingId($usuarioregistro->id)){

                return redirect()->route('home');
            }
        }

    }
}
