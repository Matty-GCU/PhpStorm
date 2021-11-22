<!DOCTYPE html>
<html lang="zh" style="height: 100%;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="@yield('icon')">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="full-screen" content="yes">
    <meta name="x5-fullscreen" content="true">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('mdui/1.0.1/css/mdui.min.css')}}">
    <link rel="stylesheet" href="{{asset('dropload/0.9.1/css/dropload.min.css')}}">
    <style type="text/css">
        #footer {
            font-size: 0.5em;
        }
    </style>
    <style type="text/css">
        .mdui-theme-primary-college .mdui-color-theme {
            background-color: rgb(113,28,150)!important;
            color: #fff!important
        }

        .mdui-theme-primary-college .mdui-color-theme-50 {
            background-color: rgb(113,28,150)!important;
            color: rgba(0,0,0,.87)!important
        }

        .mdui-theme-primary-college .mdui-color-theme-100 {
            background-color: rgb(113,28,150)!important;
            color: rgba(0,0,0,.87)!important
        }

        .mdui-theme-primary-college .mdui-color-theme-200 {
            background-color: rgb(113,28,150)!important;
            color: rgba(0,0,0,.87)!important
        }

        .mdui-theme-primary-college .mdui-color-theme-300 {
            background-color: rgb(113,28,150)!important;
            color: #fff!important
        }

        .mdui-theme-primary-college .mdui-color-theme-400 {
            background-color: rgb(113,28,150)!important;
            color: #fff!important
        }

        .mdui-theme-primary-college .mdui-color-theme-500 {
            background-color: rgb(113,28,150)!important;
            color: #fff!important
        }

        .mdui-theme-primary-college .mdui-color-theme-600 {
            background-color: rgb(113,28,150)!important;
            color: #fff!important
        }

        .mdui-theme-primary-college .mdui-color-theme-700 {
            background-color: rgb(113,28,150)!important;
            color: #fff!important
        }

        .mdui-theme-primary-college .mdui-color-theme-800 {
            background-color: rgb(113,28,150)!important;
            color: #fff!important
        }

        .mdui-theme-primary-college .mdui-color-theme-900 {
            background-color: rgb(113,28,150)!important;
            color: #fff!important
        }
        .mdui-theme-primary-college .mdui-text-color-theme {
            color: rgb(113,28,150)!important
        }

        .mdui-theme-primary-college .mdui-text-color-theme-50 {
            color: rgb(113,28,150)!important
        }

        .mdui-theme-primary-college .mdui-text-color-theme-100 {
            color: rgb(113,28,150)!important
        }

        .mdui-theme-primary-college .mdui-text-color-theme-200 {
            color: rgb(113,28,150)!important
        }

        .mdui-theme-primary-college .mdui-text-color-theme-300 {
            color: rgb(113,28,150)!important
        }

        .mdui-theme-primary-college .mdui-text-color-theme-400 {
            color: rgb(113,28,150)!important
        }

        .mdui-theme-primary-college .mdui-text-color-theme-500 {
            color: rgb(113,28,150)!important
        }

        .mdui-theme-primary-college .mdui-text-color-theme-600 {
            color: rgb(113,28,150)!important
        }

        .mdui-theme-primary-college .mdui-text-color-theme-700 {
            color: rgb(113,28,150)!important
        }

        .mdui-theme-primary-college .mdui-text-color-theme-800 {
            color: rgb(113,28,150)!important
        }

        .mdui-theme-primary-college .mdui-text-color-theme-900 {
            color: rgb(113,28,150)!important
        }
        .mdui-theme-primary-college .mdui-tab .mdui-tab-active {
            color: rgb(113,28,150)
        }

        .mdui-theme-primary-college .mdui-tab-indicator {
            background-color: rgb(113,28,150)
        }
        .mdui-theme-primary-college .mdui-bottom-nav a.mdui-bottom-nav-active {
            color: rgb(113,28,150)
        }
        .mdui-theme-primary-college .mdui-progress {
            background-color: rgb(113,28,150)
        }

        .mdui-theme-primary-college .mdui-progress-determinate,.mdui-theme-primary-college .mdui-progress-indeterminate {
            background-color: rgb(113,28,150)
        }
        .mdui-theme-primary-college .mdui-spinner-layer {
            border-color: rgb(113,28,150)
        }
    </style>
    @yield('css')
</head>
<body class="mdui-theme-primary-@yield('primary','indigo') mdui-theme-accent-@yield('accent','blue') @yield('body_class')"
      style="height: 100%;@yield('body_style')">
{{--<!--[if lt IE 10]>--}}
{{--<div class="mdui-container-fluid">--}}
{{--<div class="mdui-row">--}}
{{--<div class="mdui-col-xs-12">--}}
{{--<div class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent mdui-btn-block">您正在使用 <strong>过时的</strong> 浏览器。我们非常抱歉的告诉你我们无法保证你的用户体验</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<![endif]-->--}}
@yield('body')

<script src="{{asset('mdui/1.0.1/js/mdui.min.js')}}"></script>
<script src="{{asset('jquery/js/1.11.1/jquery.min.js')}}"></script>
<script src="{{asset('dropload/0.9.1/js/dropload.min.js')}}"></script>
<script type="text/javascript">
    var $$ = mdui.$;
    $$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // 首先需要提前定义好事件，并且注册相关的EventListener
    var changeStyle = new CustomEvent('change_style', {
        detail: {}
    });
    //注册对应的监听器
    window.addEventListener('change_style', function (event) {
        $$('body').toggleClass('mdui-theme-layout-dark');
    });

    function change_style() {
        //点击按钮后触发事件
        // 随后在对应的元素上触发该事件
        if (window.dispatchEvent) {
            window.dispatchEvent(changeStyle);
        } else {
            //ie8兼容
            window.fireEvent(changeStyle);
        }
    }

    //检查时间
    // function check_time() {
    //     var myDate = new Date();
    //     var hour = myDate.getHours();
    //     if (hour <= 6 && hour >= 22) {
    //         change_style();
    //     }
    // }

    //$$(check_time());
</script>
@yield('javascript')
</body>
</html>
