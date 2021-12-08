{{--引入编辑器--}}
<script type="text/javascript" src="{{asset('asset/wangEditor/v4.7.9/wangEditor.min.js')}}"></script>
<script type="text/javascript">
    const E = window.wangEditor
    const editor = new E("{!! $editor??'' !!}")
    editor.config.zIndex = 500;
</script>

