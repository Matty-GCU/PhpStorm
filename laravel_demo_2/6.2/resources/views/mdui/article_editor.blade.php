@extends('layouts.mdui.appbar_drawer')
@section('css')
    <link rel="stylesheet" href="{{asset('mdui-editor/1.0.2/css/editor.css')}}"/>
    <style type="text/css">
        .mdui-editor {

        }

        #content {
            min-height: 200px;
        }

        .mdui-fab-fixed {
            width: 56px;
            min-width: 56px;
            height: 56px;
            margin: auto;
            padding: 0 !important;
            overflow: hidden;
            font-size: 24px;
            line-height: normal !important;
            border-radius: 50%;
        }
    </style>
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
        <div class="mdui-card mdui-editor mdui-center mdui-m-t-4">
            <div class="mdui-row">
                <div class="mdui-col-xs-12">
                    <div class="mdui-textfield mdui-textfield-floating-label" style="padding: 12px 16px;">
                        <label class="mdui-textfield-label">标题</label>
                        <input name="title" class="mdui-textfield-input" type="text"/>
                    </div>
                </div>
            </div>
            <div class="mdui-row">
                <div class="mdui-col-xs-12"></div>
            </div>
            <div class="mdui-row mdui-m-t-2">
                <div class="mdui-col-xs-12">

                    <div style="display: none;" class="editor">
                        <div id="toolbar"></div>
                        <div id="content"></div>
                    </div>
                    <div id="div1">

                    </div>
                </div>
            </div>
        </div>
        <button onclick="submit()" class="mdui-fab mdui-color-theme-accent mdui-fab-fixed mdui-ripple">
            <i class="mdui-icon material-icons">&#xe163;</i>
        </button>
    </div>
@endsection
@section('javascript')
    {{--    <script src="{{asset('mdui-editor/1.0.2/js/editor.js')}}"></script>--}}
    {{--    <script type="text/javascript">--}}
    {{--        var editor = new Editor('#toolbar', '#content', {--}}
    {{--            autoSave: true,--}}
    {{--            imageUploadUrl: '',--}}
    {{--            imageUploadSuffix: ['png'],--}}
    {{--            fileUploadUrl: '',--}}
    {{--            fileUploadSuffix: [],--}}
    {{--        });--}}
    {{--    </script>--}}
    {{--    <script type="text/javascript" src="{{asset('asset/wangEditor/v4.7.9/wangEditor.min.js')}}"></script>--}}
    {{--    <script type="text/javascript">--}}
    {{--        const E = window.wangEditor--}}
    {{--        const editor = new E("#div1")--}}
    {{--        editor.config.zIndex = 500;--}}
    {{--        // 或者 const editor = new E(document.getElementById('div1'))--}}
    {{--        editor.create()--}}
    {{--    </script>--}}
    @include('layouts.wangEditor.index',['editor'=>'#div1'])
    @include('layouts.wangEditor.extensions.button_saved',['icon'=>'<i class="mdui-icon material-icons">save</i>'])
    @include('layouts.wangEditor.extensions.button_loaded',['icon'=>'<i class="mdui-icon material-icons">present_to_all</i>'])
    @include('layouts.wangEditor.extensions.button_clear',['icon'=>'<i class="mdui-icon material-icons">delete</i>'])
    <script type="text/javascript">
        editor.create()
    </script>
    <script type="text/javascript">
        function submit() {
            let title = $('input[name=title]').val();
            let content = editor.txt.html();

            $.ajax({
                method: 'POST',
                url: '{{route('editor.submit')}}',
                data: {
                    title: title,
                    content: content
                },
                success: function (data) {
                    if (data.code) {
                        mdui.alert(data.message);
                    } else {
                        mdui.alert('文章上传成功');
                    }

                }
            });
        }
    </script>

@endsection
