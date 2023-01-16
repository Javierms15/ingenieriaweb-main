<?php
   
namespace App\Http\Controllers\Auth;
   
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\User;
   
class GoogleSocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {
     
            $user = Socialite::driver('google')->user();      
            $finduser = User::where('email', $user->email)->first();
      
            if($finduser){
                $finduser->update([
                    'name' => $finduser->name,
                    'email' => $finduser->email,
                    'password' => bcrypt('my-google'),
                    'social_id' => $finduser->id,
                    'social_type' => ('google'),
                  ]);
                Auth::login($finduser);
            }else{

                $nuevoUsuario = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt('my-google'),
                    'social_id' => $user->id,
                    'social_type' => ('google'),
                  ]);
                $nuevoUsuario->save();
     
                Auth::login($nuevoUsuario);
            }
            return redirect()->route('advertisement.index')
            ->with('success', 'You\'ve been logged succesfully.');
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
