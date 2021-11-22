<!DOCTYPE html>
<html lang="zh" style="height: 100%;">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,maximum-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="full-screen" content="yes">
    <meta name="x5-fullscreen" content="true">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- head 中 -->
    <link rel="stylesheet" href="https://gcunetworkcenter.gitee.io/self-cdn/cdn/weui/v1.1.2/css/weui.min.css">
    <link rel="stylesheet" href="https://gcunetworkcenter.gitee.io/self-cdn/cdn/jquery-weui/v1.2.0/css/jquery-weui.min.css">
    @yield('style')
</head>

<body ontouchstart>

@yield('content')

<!-- body 最后 -->
<script src="https://gcunetworkcenter.gitee.io/self-cdn/cdn/jquery/v1.11.0/js/jquery.min.js"></script>
<script src="https://gcunetworkcenter.gitee.io/self-cdn/cdn/jquery-weui/v1.2.0/js/jquery-weui.min.js"></script>

<!-- 如果使用了某些拓展插件还需要额外的JS -->
<script src="https://gcunetworkcenter.gitee.io/self-cdn/cdn/jquery-weui/v1.2.0/js/swiper.min.js"></script>
<script src="https://gcunetworkcenter.gitee.io/self-cdn/cdn/jquery-weui/v1.2.0/js/city-picker.min.js"></script>
@yield('js')
</body>
</html>