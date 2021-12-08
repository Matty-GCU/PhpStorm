@extends('layouts.mdui.appbar_drawer')
@section('css')

@endsection

@section('drawer_content')
    @parent
    <div class="mdui-list">
        <a href="{{route('index')}}" class="mdui-list-item mdui-ripple">文章列表</a>
        <a href="{{route('editor.index')}}" class="mdui-list-item mdui-ripple">新建文章</a>
        <a href="{{route('delete_index')}}" class="mdui-list-item mdui-ripple">删除文章</a>
    </div>
@endsection

@section('body')
    @parent
    <div class="mdui-container">
        <h1>{{$title}}</h1>
        <div class="mdui-typo">
            {!! $content !!}
        </div>
    </div>
@endsection
@section('javascript')
@endsection
