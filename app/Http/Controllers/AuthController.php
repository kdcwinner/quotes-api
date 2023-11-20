<?php

namespace App\Http\Controllers;

use App\Models\AccessToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    /**
     * used to create 5 dummy users for testing purpose
     */
    public function createUsers(Request $request){
        try{
            for($i=0;$i<5;$i++){
                User::create([
                    "name"=>"test",
                    "email"=>rand().'@gmail.com',
                    'password'=>Hash::make('123456')
                ]);
            }
            return response()->json(['status'=>true,'message'=>'5 uses created!'],200);
        }catch(\Throwable $t){
            return response()->json(['status'=>false,'message'=>'Something went wrong try it again.']);
        }
     }

     
    /**
     * Used for login user
     * @param User request
     * @return json data
     */
    public function login(Request $request){
        try{
            $this->validate($request, [
                'email'           => 'required|max:255|email',
                'password'           => 'required',
            ]);
            $email = $request->email;
            $password = $request->password;
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                $accessToken = AccessToken ::updateOrCreate(
                    [ 'user_id' => Auth::user()->id ],
                    [ 'access_token' => Str::random(100) ]
                );               
                // Send access_token with login success message
                return response()->json(['status'=>true,'message'=>'Login Succssfully!','access_token' =>  $accessToken->access_token],200);
            } else {
                // Send error message
                return response()->json(['status'=>false,'message'=>'Invalid email or password']);
            }
        }catch(\Throwable $t){
            return response()->json(['status'=>false,'message'=>$t->getMessage()]);
        }
    }

    /**
     * Used to user logout
     * @param User request with access_token
     * @return status
     */
    public function logout(Request $request){
        try{
            $accessToken = AccessToken::where('access_token', $request->access_token)->first();
            if ($accessToken) {
                $accessToken->delete();
                return response()->json([ 'status' => true,'message'=>'Logout successfully!'],200);
            }
        }catch(\Throwable $t){
            return response()->json(['status'=>false,'message'=>'Something went wrong try it again.']);
        }
    }
}
