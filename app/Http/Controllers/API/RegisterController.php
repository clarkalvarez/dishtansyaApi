<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Models\User; 
use App\Models\Order; 
use App\Models\CustomerOrder; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class RegisterController extends Controller 
{
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|unique:users,email', 
            'password' => 'required', 
           // 'c_password' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
                    return response()->json(['message'=>$validator->errors()], 400);            
                }
        $input = $request->all(); 
                $input['password'] = bcrypt($input['password']); 
                $user = User::create($input); 
                $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                $success['name'] =  $user->name;
                return  response()->json(['message'=>'User Successfully Registered'], 201); 
        //return response()->json(['success'=>$success], $this-> successStatus); 
    }
}
