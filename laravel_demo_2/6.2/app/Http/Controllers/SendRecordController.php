<?php

namespace App\Http\Controllers;
use App\TimeCard;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SendRecordController
{
    public function index(Request $request) {
        return response()->view('mdui.hw.sendRecord');
    }

    public function enter(Request $request) {
        $name = $request->get('name');
        $obj = new TimeCard();
        $obj->name = $name;
        $obj->updated_at = null;
        $obj->save();
        return response('开始计时！');
    }

    public function leave(Request $request) {
        $name = $request->get('name');
        TimeCard::where('name', $name)->update([
            'updated_at' => Carbon::now()
        ]);
        //下面这种会报错，因为find()默认找id属性，而我的表中只有name属性
//        $timeCard = TimeCard::find('吴杭');
//        $timeCard->leaveTime = $endTime;
//        $timeCard->save();
        return response('结束计时！');
    }
}
