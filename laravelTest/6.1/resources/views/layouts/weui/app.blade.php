<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://gcunetworkcenter.gitee.io/self-cdn/cdn/weui/v0.4.3/style/weui.min.css">
    <link rel="stylesheet" href="https://gcunetworkcenter.gitee.io/self-cdn/cdn/jquery-weui/v0.8.0/css/jquery-weui.min.css">
    <link href="https://gcunetworkcenter.gitee.io/self-cdn/cdn/ionicons/v2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_i08crkywr2mon7b9.css">
</head>
<body>
@yield('content')
</body>
<script src="https://gcunetworkcenter.gitee.io/self-cdn/cdn/jquery/v1.11.0/js/jquery.min.js"></script>
<script src="https://gcunetworkcenter.gitee.io/self-cdn/cdn/jquery-weui/v0.8.0/js/jquery-weui.min.js"></script>
@yield('js')
</html>
