<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class UserController extends Controller
{

    public $successStatus = 200;

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'birthday' => 'required',
            'sex' => 'required',
            'phonenumber' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);}


         $user =  User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
        'birth_date' => Carbon::createFromFormat('Y-m-d', $request['birthday']),
        'phone_number' => $request['phonenumber'],
        'sex' => $request['sex']
         ]);

        $user->save();

        $accessToken = $user->createToken('authToken')->accessToken;

        return response()->json(['user'=>$user, 'access_token' => $accessToken], $this-> successStatus);
    }


    public function login(Request $request){

        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(\auth()->attempt($validator)){
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


    public function show()
    {
        return new UserResource(Auth::user());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy()
    {
       $user = Auth::user();

       if(is_null($user)){

           return response()->json([ ], 400);
       }
        $user->delete();

        return response()->json(['delete' => 'success'], 200);
    }

}
