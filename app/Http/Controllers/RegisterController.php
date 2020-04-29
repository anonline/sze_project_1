<?php

namespace App\Http\Controllers;


use App\Http\Resources\RaceRegistration;
use App\RaceRegistrationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function store(Request $id)
    {
    }


    public function destroy($id)
    {
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
