@extends('layouts.mdui.appbar_drawer')
@section('css')
    <link rel="stylesheet" href="{{asset('mdui-editor/1.0.2/css/editor.css')}}"/>
    <style type="text/css">
        .mdui-editor {

        }

        #content {
            min-height: 200px;
        }
        .mdui-fab-fixed{
            width: 56px;
            min-width: 56px;
            height: 56px;
            margin: auto;
            padding: 0!important;
            overflow: hidden;
            font-size: 24px;
            line-height: normal!important;
            border-radius: 50%;
        }
    </style>
@endsection

@section('drawer_content')
    <ul class="mdui-list">
        <li class="mdui-list-item mdui-ripple" onclick="window.location.href='#'">
            <i class="mdui-list-item-icon mdui-icon material-icons">home</i>
            <div class="mdui-list-item-content">测试</div>
        </li>
        <li class="mdui-divider"></li>
    </ul>
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
                    <div class="editor">
                        <div id="toolbar"></div>
                        <div id="content"></div>
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
    <script src="{{asset('mdui-editor/1.0.2/js/editor.js')}}"></script>
    <script type="text/javascript">
        var editor = new Editor('#toolbar', '#content', {
            autoSave: true,
            imageUploadUrl: '',
            imageUploadSuffix: ['png'],
            fileUploadUrl: '',
            fileUploadSuffix: [],
        });
    </script>
    <script type="text/javascript">
        function submit(){
            let title=$('input[name=title]').val();
            let content=$('#content').html();
            $.ajax({
                method: 'POST',
                url: '{{route('editor.submit')}}',
                data: {
                    title: title,
                    content: content
                },
                success: function (data) {
                    if(data.code)
                    {
                        mdui.alert(data.message);
                    }
                    else{
                        mdui.alert('文章上传成功');
                    }

                }
            });
        }
    </script>
@endsection
