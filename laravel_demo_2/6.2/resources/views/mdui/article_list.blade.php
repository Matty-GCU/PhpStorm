@extends('layouts.mdui.appbar_drawer')
@section('css')

@endsection



@section('drawer_content')
    @parent
    <div class="mdui-list">
        <a href="{{route('index')}}" class="mdui-list-item mdui-ripple">文章列表</a>
        <a href="{{route('editor.index')}}" class="mdui-list-item mdui-ripple">新建文章</a>
        <a href="{{route('delete_index')}}" class="mdui-list-item mdui-ripple">删除文章</a>
    </div>
@endsection

@section('body')
    @parent
    <div class="mdui-container">
        @component('layouts.mdui.slot.search')

            @slot('action',route('index'))

            @slot('select')
                <option value="name">文章名</option>
            @endslot

        @endcomponent
        @component('layouts.mdui.slot.list')
            @slot('header')
                <tr>
                    <td>id</td>
                    <td>文章名</td>
                    <td>查看详情</td>
                </tr>
            @endslot
            @slot('items')
                @foreach($list as $item)
                    <tr>
                        <td>{{$item['id']}}</td>
                        <td>{{$item['title']}}</td>
                        <td>
                            <a href="{{route('item',['id'=>$item['id']])}}" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">查看详情</a>
                        </td>
                    </tr>
                @endforeach
            @endslot
        @endcomponent
    </div>
@endsection

@section('javascript')

@endsection
