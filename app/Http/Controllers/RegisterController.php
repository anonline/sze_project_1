<?php

namespace App\Http\Controllers;


use App\Http\Resources\RaceRegistration;
use App\RaceRegistrationModel;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $race_registration = RaceRegistrationModel::create([
            'race_id' => $request->race_id,
            'user_id' => Auth::id(),
        ]);

        $race_registration->save();

        return response()->json(['registration' => 'success']);

    }

    public function destroy($id)
    {
       RaceRegistrationModel::where('user_id', '=', Auth::id())->where('race_id', '=', $id)->delete();

       return response()->json(['registration_delete' => 'success'], 200);
    }


    public function races()
    {

        return RaceRegistration::collection(
            DB::table('race_registration')->where('user_id', '=', auth()->user()->id)->
            join('race_data', 'race_registration.race_id', 'race_data.id')->
            join('races', 'races.id', '=', 'race_data.races_id')->
            select('races.*', 'race_data.*')->get());

    }
}
