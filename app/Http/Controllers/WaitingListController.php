<?php

namespace App\Http\Controllers;

use App\RaceWaitingListModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaitingListController extends Controller
{
    public function store(Request $request){

        $waitlist = RaceWaitingListModel::create([
            'user_id' => Auth::id(),
            'race_id' => $request->race_id
        ]);

        $waitlist->save();

        return response()->json(['success'], 200);
    }

}
