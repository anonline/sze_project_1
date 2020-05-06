<?php

namespace App\Http\Controllers;

use App\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public $successStatus = 200;


    public function store( Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'organizer' => 'required',
            'phone_number' => 'required',
            ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);}

        $admin = AdminModel::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'organizer' => $request['organizer'],
            'phone_number' => $request['phone_number']
        ]);
        $admin->save();

        $accessToken = $admin->createToken('authToken')->accessToken;

        return response()->json(['admin'=>$admin, 'access_token' => $accessToken], $this -> successStatus);
    }


    public function login(Request $request){

        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if( \auth()->attempt($validator)){

            $accessToken = \auth()->user()->createToken('authToken')->accessToken;
            return response()->json(['user' => \auth()->user(), 'access_token' => $accessToken], $this-> successStatus);
        }

        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function logout(Request $request){

        $token = \auth()->user()->token();
        $token->revoke();

        return response()->json(['logout'=>'success'], $this->successStatus);

    }


}
