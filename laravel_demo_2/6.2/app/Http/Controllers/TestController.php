<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index(Request $request)
    {
        return response()->view('mdui.test.test');
    }
    public function post(Request $request)
    {
        dd($request->all());
    }
}
