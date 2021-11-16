@extends('layouts.mdui.appbar_drawer')
@section('css')

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
