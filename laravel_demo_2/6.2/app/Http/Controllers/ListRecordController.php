<?php

namespace App\Http\Controllers;

use App\TimeCard;
use Illuminate\Http\Request;

class ListRecordController
{
    public function index(Request $request) {
        $list=TimeCard::all()->toArray();
        return response()->view('mdui.hw.listRecord',[
            'list'=>$list
        ]);
    }
}
