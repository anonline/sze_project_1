<?php

namespace App\Http\Controllers;

use App\Http\Resources\Achievement as AchievementResource;
use Illuminate\Http\Request;
use App\AchievementModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $achievement = AchievementModel::where('user_id', '=', Auth::id())->where('id', '=', $id)->get();

        return new AchievementResource($achievement);
    }


}
