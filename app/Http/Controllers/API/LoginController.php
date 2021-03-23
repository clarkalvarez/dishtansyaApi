<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Models\User;  
use Illuminate\Support\Facades\Auth; 
use Illuminate\Foundation\Auth\ThrottlesLogins;
 

  class LoginController extends Controller 
{
    public $maxAttempts = 5;
    public $decayMinutes = 5;
    use ThrottlesLogins;
    public function username(){
        return 'email';
    }
     public function login(Request $request){ 
 
        //check if the user has too many login attempts.
        if ($this->hasTooManyLoginAttempts($request)){
            //Fire the lockout event.
            $this->fireLockoutEvent($request);
    
            //redirect the user back after lockout.
            return $this->sendLockoutResponse($request);
        }
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['access_token' => $success], 201); 
        } 
        else{ 
                //keep track of login attempts from the user.
            $this->incrementLoginAttempts($request);
            return response()->json(['message'=>'“Invalid credentials'], 401); 
        } 
    }
}
