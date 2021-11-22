<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SendArticleController extends Controller
{
    //
    //文章编辑界面
    public function index(Request $request)
    {
        return response()->view('mdui.article_editor');
    }

    //文章提交地址
    public function submit(Request $request)
    {
        $title=$request->get('title');
        $content=$request->get('content');
        $obj=new Article();
        $obj->title=$title;
        $obj->content=$content;
        $obj->save();
        return response()->json([
            'code'=>0,
            'message'=>'ok',
        ]);
    }
}
