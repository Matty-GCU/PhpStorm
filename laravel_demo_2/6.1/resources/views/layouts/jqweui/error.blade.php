@extends('layouts.jqweui.main')
@section('body')
<div class="weui-msg">
    <div class="weui-msg__icon-area">
        @yield('icon')
    </div>
    <div class="weui-msg__text-area">
        <h2 class="weui-msg__title">@yield('msg_title')</h2>
        <p class="weui-msg__desc">@yield('msg_content')</p>
    </div>
    <div class="weui-msg__opr-area">
        <p class="weui-btn-area">
            @yield('msg_do')
        </p>
    </div>
    <div class="weui-msg__extra-area">
            @include('layouts.jqweui.footer')
    </div>
</div>
    
@endsection