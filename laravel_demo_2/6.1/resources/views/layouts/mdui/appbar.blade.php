@extends('layouts.mdui.main')
@section('body_class')
    mdui-appbar-with-toolbar
@endsection

@section('body')
    @parent
    <div class="mdui-appbar mdui-appbar-fixed mdui-appbar-scroll-hide">
        <div class="mdui-toolbar mdui-color-theme">
            {{--顶部开头，可以放一些按键之类的--}}
            @yield('bar_start')
            {{--头部，作为商标之类可以放这里--}}
            <span class="mdui-typo-headline mdui-hidden-xs">@yield('headline')</span>
            {{--标题，同标题--}}
            <span class="mdui-typo-title">@yield('title')</span>
            {{--中间部分，不放东西默认顶过去--}}
            @section('bar_middle')
                <div class="mdui-toolbar-spacer"></div>
            @show
            {{--这里是右边的图标，可以用这个控制--}}
            @section('bar_end')
                <button onclick="change_style()" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">&#xe3a8;</i>
                </button>
            @show
        </div>
    </div>
@endsection