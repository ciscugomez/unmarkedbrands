<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialLoginController extends Controller
{
    public function redirect($socialLoginType)
    {
        //session()->put('userLanguage', App::getLocale());
        return Socialite::driver($socialLoginType)
            ->redirect();
    }
    public function callback($socialLoginType)
    {
        //App::setLocale(session()->get('userLanguage'));
        $user       = Socialite::driver($socialLoginType)->user();
        $searchUser = User::where('social_id', $user->getId())->first();
        if($searchUser){
            Auth::login($searchUser);
            return redirect(route(App::getLocale() . '.home'))->with('success', 'Has iniciado la sesión!');
        }else{
            try {

                $searchUser = User::updateOrCreate([
                    'email' => $user->getEmail(),
                ],[
                    'name' => $user->getName(),
                    'social_id'=> $user->getId(),
                    'social_provider'=> $socialLoginType,
                    'password' => encrypt(Str::random(30)),

                ]);

                Auth::login($searchUser);

                return redirect(route(App::getLocale() . '.home'))->with('success', 'Has iniciado la sesión!');
            }catch (Exception $th){
                Log::error($th->getMessage());
            }

        }
    }
}
