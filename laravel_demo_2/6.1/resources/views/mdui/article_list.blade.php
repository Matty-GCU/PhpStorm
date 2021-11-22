@extends('layouts.mdui.appbar_drawer')
@section('css')

@endsection

@section('body')
    @parent
    <div class="mdui-container">

        <ul class="mdui-list">
            <li class="mdui-list-item mdui-ripple" onclick="window.open('{{route('delete_index')}}')">
                <div class="mdui-list-item-content">
                    <div class="mdui-list-item-title">点击进入删除界面</div>
                </div>
            </li>

            @foreach($list as $item)
            <li class="mdui-list-item mdui-ripple" onclick="window.open('{{route('item',['id'=>$item['id']])}}')">
                <div class="mdui-list-item-content">
                    <div class="mdui-list-item-title">{{$item['title']}}</div>
                </div>
            </li>
            @endforeach
        </ul>
        <a href="{{route('editor.index')}}" class="mdui-fab mdui-color-theme-accent mdui-fab-fixed mdui-ripple">
            <i class="mdui-icon material-icons">&#xe163;</i>
        </a>
    </div>
@endsection
@section('javascript')
@endsection
