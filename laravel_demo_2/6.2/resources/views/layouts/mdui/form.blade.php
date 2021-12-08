@extends('layouts.mdui.main')

@section('body')
    <!-- 常规显示界面 -->
    <form action="@yield('action')" method="post" style="height: 100%;">
        {{csrf_field()}}
        <div id="main-container" class="mdui-container-fluid mdui-color-theme" style="height: 100%;">
            <div class="mdui-row">
                <div class="mdui-hidden-xs mdui-col-sm-2 mdui-col-lg-4">

                </div>
                <div id="main-box" class="mdui-col-xs-12 mdui-col-sm-8 mdui-col-lg-4 mdui-color-white mdui-p-t-4 mdui-p-b-4 mdui-p-l-4 mdui-p-r-4 mdui-m-t-4 mdui-shadow-4">
                    @yield('before_title')
                    @section('on_title')
                    <div class="mdui-text-center">
                        <h2>@yield('title')</h2>
                    </div>
                    @show
                    @yield('form')
{{--                    <div class="mdui-textfield mdui-textfield-floating-label ">--}}
{{--                        <label class="mdui-textfield-label">密码：</label>--}}
{{--                        <input name="password" class="mdui-textfield-input" type="text"/>--}}
{{--                    </div>--}}
                    @section('submit')
                        <button id="submit" type="submit"
                                class="mdui-btn mdui-color-theme-accent mdui-ripple mdui-float-right">提交</button>
                    @show
                    @yield('after_title')
                    <div class="mdui-m-t-2 mdui-m-b-2 mdui-p-t-2 mdui-p-b-2">

                    </div>
                    <div id="footer" class="mdui-text-center">
                        <p>2020 Copyright © 广州城市理工学院计算机协会</p><p>地址：广州市花都区学府路一号</p>
                    </div>
                </div>
                <div class="mdui-hidden-xs mdui-col-sm-2 mdui-col-lg-4">

                </div>
            </div>
        </div>
    </form>
@endsection

@section('javascript')
    @parent
    <script type="text/javascript">
        //注册对应的监听器
        window.addEventListener('change_style', function(event){
            $$('#main-container').toggleClass('mdui-color-theme');
            $$('#main-box').toggleClass('mdui-color-dark');
            $$('#main-box').toggleClass('mdui-color-white');
        });
    </script>
@endsection
