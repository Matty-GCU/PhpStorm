<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/common.css">
    <link href="http://cdn.bootcss.com/ionic/1.3.1/css/ionic.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://gcunetworkcenter.gitee.io/self-cdn/cdn/weui/v1.1.1/css/weui.min.css">
    <style>
        .null-text{
            vertical-align: middle;
            color: #666;
            text-align: center;
            margin-top: 200px;
        }
    </style>
</head>

<body>
@yield('content')
</body>

<script src="http://cdn.bootcss.com/vue/2.0.3/vue.min.js"></script>
<script src="http://cdn.bootcss.com/vue-resource/1.0.3/vue-resource.min.js"></script>
@yield('js')

</html>
