@extends('layouts.mdui.appbar')
@section('body_class')
    @parent
    mdui-drawer-body-left
@endsection
@section('body')
    @parent
    <div class="mdui-drawer" id="drawer">
        {{--这里是左边的菜单列表--}}
        @yield('drawer_content')
{{--        <li class="mdui-list-item mdui-ripple">--}}
{{--            <img class="mdui-img-fluid" src="{{asset('img/logo.png')}}"/>--}}
{{--        </li>--}}
    </div>
@endsection

{{--这里是左边菜单栏的按键--}}
@section('bar_start')
    <button class="mdui-btn mdui-btn-icon" mdui-drawer="{target: '#drawer'}"><i
                class="mdui-icon material-icons">menu</i></button>
@endsection

@section('javascript')
    @parent
    {{--这里是左边菜单的选项--}}
    <script type="text/javascript">
        function init_left_picker() {
            var title=$$('title').html();
            {{--筛选每一个div，确认同名，然后设置为选择模式--}}
            var loop=$$('ul[class="mdui-list"]').children();
            for(var i=0;i<loop.length;i++)
            {
                if($$(loop[i]).find('div').length!=0&&$$(loop[i]).find('div').html()==title)
                {
                    $$(loop[i]).addClass('mdui-list-item-active');
                }
            }
            mdui.mutation();
        }
        $$(init_left_picker());
    </script>
@endsection
