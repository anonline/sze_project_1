<?php

namespace App\Http\Controllers;

use App\User;
use App\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;


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

            $user = new User( [
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
        'birth_date' => $request['birthdate'],
        'phone_number' => $request['phonenumber'],
        'sex' => $request['sex']
    ]);
        $user->save();

        $accessToken = $user->createToken('authToken')->accessToken;


        return response()->json(['user'=>$user, 'acces_token' => $accessToken], $this-> successStatus);
    }


    public function login(Request $request){

        $validator = $request->validate( [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(\auth()->attempt($validator)){
            $accessToken = \auth()->user()->createToken('authToken')->accessToken;;
            return response()->json(['user' => \auth()->user(), 'access_token' => $accessToken], $this-> successStatus);
        }

        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }


    public function show($id)
    {
        return (User::findorFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return response(toJSON("ok"));
    }

    public function getAchievements(){

    }

    public function rateRace(Request $id){

    }

    public function registerRace(Request $id){

    }

    public function deleteRegistration(Request $id){

    }


}
