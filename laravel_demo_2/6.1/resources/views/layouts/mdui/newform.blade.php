@extends('layouts.mdui.main')

@section('css')
    @parent
    <style type="text/css">
        .mdui-toolbar {
            height: 85px;
        }
        .logo {
            height: 52px;
        }

        @media (min-width: 600px) {
            .appbar-flex {
                display: flex !important;
            }
        }
        body {
            background: url({{asset('img/container_bg.png')}}) repeat
        }
    </style>
@endsection

@section('body_class')
    @parent
    mdui-appbar-with-toolbar
    mdui-bottom-nav-fixed
@endsection

@section('body')
    @parent
    <!-- 顶部标题栏开始 -->
    <div class="mdui-appbar mdui-appbar-fixed mdui-color-theme" style="width:100%;">
        <div class="mdui-toolbar mdui-center mdui-valign" style="max-width: 1280px;">
            <div class="mdui-valign mdui-hidden-xs-down">
                <img class="logo" src="{{asset('img/newLogo.png')}}">
                <span style="border-left:#ffffffe3 1px solid; width: 1px;height: 30px;margin-left:15px;margin-right:15px;"></span>
                <span class="mdui-typo-title" style="color:#ffffffe3;">@yield('title')</span>
            </div>
            <div class="mdui-toolbar-spacer mdui-valign mdui-hidden-sm-up">
                <div class="mdui-center mdui-valign">
                    <img class="logo" src="{{asset('img/newLogo.png')}}">
                </div>
            </div>
            <div class="mdui-toolbar-spacer mdui-hidden-xs-down"></div>
        </div>
    </div>
    <!-- 顶部标题栏结束 -->
    <!-- 中央界面开始 -->
    <div class="mdui-container">
        <div class="mdui-row">
        <!-- 现在没有左边信息，直接用中间的代码 -->
            <div class="mdui-col-xs-12 mdui-col-sm-4 mdui-col-offset-sm-4">
                <div class="mdui-shadow-4 mdui-m-t-5" style='margin-top:75px;'>
                    <div class="mdui-tab mdui-tab-full-width" mdui-tab>
                        <a href="#zhanghaodenglu" class="mdui-ripple" style="font-size:18px;font-weight:bold;">账号登陆</a>
                    </div>
                    <div id="zhanghaodenglu" class="mdui-p-a-2">
                        <form action="@yield('action')" method="post">
                            {{csrf_field()}}
                            @yield('form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 中央界面结束 -->

    <div class="mdui-bottom-nav mdui-color-theme" style="height: 48px;">
        <div class="mdui-container mdui-valign">
            <div class="mdui-row mdui-center">
                <div class="mdui-col-xs-12 mdui-text-center">
                    <span style="color:#ffffffe3">Copyright(C) 2021 广州城市理工学院计算机协会 版权所有</span><br>
                </div>
            </div>
        </div>
    </div>

@endsection
