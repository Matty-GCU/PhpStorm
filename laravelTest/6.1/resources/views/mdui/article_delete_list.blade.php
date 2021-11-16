@extends('layouts.mdui.appbar_drawer')
@section('css')

@endsection

@section('body')
    @parent
    <div class="mdui-container">

        <ul class="mdui-list">
            @foreach($list as $item)
            <li class="mdui-list-item mdui-ripple" onclick="window.open('{{route('delete',['id'=>$item['id']])}}')">
                <div class="mdui-list-item-content">
                    <div class="mdui-list-item-title">{{$item['title']}}</div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
@endsection
@section('javascript')
@endsection
