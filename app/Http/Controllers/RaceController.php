<?php

namespace App\Http\Controllers;

use App\RaceDataModel;
use App\RaceModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Resources\Race;


class RaceController extends Controller
{

    public function races()
    {
        return Race::collection(RaceModel::where('date', '>', Carbon::now()->format('Y-m-d H::m'))->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Race
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

}
