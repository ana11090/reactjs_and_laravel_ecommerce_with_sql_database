<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\RegisterRequest;
use DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Carbon;

class AuthenticationController extends Controller
{
    public function Login(Request $request){

    	try{

    		if (Auth::attempt($request->only('email','password'))) {
    			$user = Auth::user();
    			$token = $user->createToken('app')->accessToken;
				$user_id =Auth::user()->id;

    			return response([
    				'message' => "Successfully Login",
    				'token' => $token,
    				'user_id' => $user_id
					
    			],200); // States Code
    		}

    	}catch(Exception $exception){
    		return response([
    			'message' => $exception->getMessage()
    		],400);
    	}
    	return response([
    		'message' => 'Invalid Email Or Password' 
    	],401);

    } 



    public function Register(Request $request){
		$email = $request->email;

		
		
    	try{

			$email_verify = User::get();
			if($email_verify != $email){
				$user = User::create([
					//'name' => $request->name,
					'email' => $email,
					'password' => Hash::make($request->password) 
				]);
				$token = $user->createToken('app')->accessToken;
	
				
				
				$result = Client::insert([
					'user_id' => $user->id,
					'client_email' => $email
				]);
	
				return response([
					'message' => "Registration Successfull",
					'token' => $token,
					'user' => $user
				],200);
	
				
			}else{
				return response([
	    			'message' => "The email was already used"
	    		],500);
			}
    		
			

	    	}catch(Exception $exception){
	    		return response([
	    			'message' => $exception->getMessage()
	    		],400);
	    	}

    }

	public function Logout(){
		Auth::logout();
		return Redirect()->route('login');
	}
	
}
