@extends('layouts.mdui.appbar_drawer')

@section('title')
    座位使用时间打卡
@endsection
@section('body')
    @parent
    <br>
    <form action="/record/enter">
        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">姓名</label>
            <input class="mdui-textfield-input" type="text" name="name"/><br>
            <input class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" type="submit" value="开始计时">
        </div>
    </form>
    <br>
    <form action="/record/leave">
        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">姓名</label>
            <input class="mdui-textfield-input" type="text" name="name"/><br>
            <input class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" type="submit" value="结束计时">
        </div>
    </form>

{{--    加上<a></a>也只能跳转，无法提交信息；这里好像用不了JavaScript--}}
{{--    <br>--}}
{{--    <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">开始计时</button><br>--}}
{{--    <br>--}}
{{--    <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">结束计时</button>--}}
@endsection
