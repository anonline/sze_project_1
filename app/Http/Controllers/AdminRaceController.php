<?php

namespace App\Http\Controllers;

use App\Http\Resources\Race as RaceResource;
use App\RaceDataModel;
use App\RaceModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $races = RaceModel::where('admin_id', '=', Auth::id())->get();

        return RaceResource::collection($races);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $race = $request->isMethod('put') ? RaceModel::findOrFail($request->id) : new RaceModel();

        $race->id = $request->input('id');
        $race->admin_id = auth()->user()->id;
        $race->name = $request->input('name');
        $race->place = $request->input('place');
        $race->date = Carbon::createFromFormat('Y-m-d H:i', $request->input('date'), null);
        $race->webpage = $request->input('webpage');

        $race->save();

        foreach ($request->distances as $distant) {

        $racedata = RaceDataModel::create([
            'distance' => $distant,
            'races_id' => $race->id,
            'max_register_number' => $request->input('max_register_number'),
            'register_number' => $request->input('register_number')
        ]);
        $racedata->save();
     }

        return response()->json(['raceregistration' => 'succes'], 200);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
