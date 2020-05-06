<?php

namespace App\Http\Controllers;

use App\Http\Resources\Achievement as AchievementResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\AchievementModel;
use Illuminate\Support\Facades\Auth;

class AchievementController extends Controller
{
    public function index(){

        $achievements = AchievementModel::where('user_id', '=', Auth::id())->get();

        return  AchievementResource::collection($achievements);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $achievement = AchievementModel::create([
            'race_id' => $request['race_id'],
            'user_id' => $request['user_id'],
            'finish' => Carbon::createFromFormat('Y-m-d H:i:s', $request['finish']) ,
            'time' => $request['time'],
            'average_speed' => $request['average_speed'],
            'space' => $request['space']
        ]);

        $achievement->save();

        return response()->json([''], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return AchievementResource
     */
    public function show($id)
    {
        $achievement = AchievementModel::where('user_id', '=', Auth::id())->where('id', '=', $id)->get();

        return new AchievementResource($achievement);
    }


}
