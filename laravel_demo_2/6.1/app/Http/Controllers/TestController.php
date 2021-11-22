<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index(Request $request)
    {
        //查出所有数据
        $list=User::where('id','1')->get()->toArray();
        foreach ($list as $item)
        {
            var_dump($item['id']);
        }

    }

    public function insert(Request $request)
    {
        //创建一个新的数据
        $user = new User();
        $user->number = mt_rand(0, 10);
        $user->name = mt_rand(0, 1) ? null : mt_rand(10, 20);
        $user->password = mt_rand(20, 30);
        $user->save();
        return response('ok');
    }

    public function change(Request $request)
    {
        $user= User::where('id','1')->first();

        $user->number = mt_rand(0, 10);
        $user->name = mt_rand(0, 1) ? null : mt_rand(10, 20);
        $user->password = mt_rand(20, 30);

        $user->save();
        dd($user);
    }

    public function delete(Request $request)
    {
        $user= User::where('id','1')->get();

        $user->delete();
        dd($user);
    }
}
