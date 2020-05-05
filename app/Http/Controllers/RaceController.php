<?php

namespace App\Http\Controllers;

use App\AchievementModel;
use App\RaceDataModel;
use App\RaceModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Resources\Race;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RaceController extends Controller
{

    public function races()
    {
        return Race::collection(RaceModel::where('date', '>', Carbon::now()->format('Y-m-d H::m'))->get());
    }


    public function store(Request $request)
    {
        $race = $request->isMethod('put') ? RaceModel::findOrFail($request->id) : new RaceModel();

        $race->id = $request->input('id');
        $race->admin_id = auth()->user()->id;
        $race->name = $request->input('name');
        $race->place = $request->input('place');
        $race->date = $request->input('date');
        $race->webpage = $request->input('webpage');

        $race->save();

        $racedata = RaceDataModel::create([
            'distance' => $request->input('distance'),
            'races_id' => $race->id,
            'max_register_number' => $request->input('max_register_number')
        ]);
        $racedata->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        return  new Race(RaceModel::find($id));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RaceModel::destroy($id);
        RaceDataModel::where('races_id', $id)->delete();

    }

   /*
    *  public function rateRace(Request $request)
    {
        RaceDataModel::where('race_id', '=', $request->race_id)->
        update(['sum' => DB::raw('sum') + $request->rate,
            'number_of_votes' => DB::raw('number_of_votes + 1'),
            'rating' => );

    }
   */
}
