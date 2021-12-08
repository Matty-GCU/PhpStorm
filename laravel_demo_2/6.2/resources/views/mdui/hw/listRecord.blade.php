@extends('layouts.mdui.appbar_drawer')

@section('title')
    查看所有打卡信息
@endsection

@section('body')
    @parent
    <ul class="mdui-list">
        @foreach($list as $item)
            <li class="mdui-list-item mdui-ripple">
                <div class="mdui-list-item-content">
                    <div class="mdui-list-item-title">
                        姓名：{{$item['name']}}&nbsp;&nbsp;&nbsp;&nbsp;
                        开始时间：{{$item['created_at']}}&nbsp;&nbsp;&nbsp;&nbsp;
                        结束时间：{{$item['updated_at']}}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

@endsection
