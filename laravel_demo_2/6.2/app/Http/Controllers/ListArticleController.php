<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ListArticleController extends Controller
{
    //一列文章
    public function index(Request $request)
    {
        $list=Article::all()->toArray();
        return response()->view('mdui.article_list',[
            'list'=>$list
        ]);
    }

    //一个文章
    public function item(Request $request)
    {
        $id=$request->get('id');
        $item=Article::find($id);
        return response()->view('mdui.article_item',[
            'title'=>$item->title,
            'content'=>$item->content,
        ]);
    }

    //删除列表
    public function delete_index(Request $request)
    {
        $list=Article::all()->toArray();
        return response()->view('mdui.article_delete_list',[
            'list'=>$list
        ]);
    }

    //删除某个文章
    public function delete(Request $request)
    {
        $id=$request->get('id');
        Article::find($id)->delete();
        return redirect(route('index'));
    }
}
