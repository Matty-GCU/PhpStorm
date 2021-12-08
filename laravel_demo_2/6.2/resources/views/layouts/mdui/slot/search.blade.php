<form method="get" action="{{ $action ?? '' }}">
    <div class="mdui-row">
        <div class="mdui-col-xs-12 mdui-col-md-2 mdui-text-center mdui-m-t-2 mdui-m-b-1">
            <select name="key" class="mdui-select" mdui-select>
                {{$select?? ''}}
            </select>
        </div>
        <div class="mdui-col-xs-12 mdui-col-md-10 mdui-m-t-1">
            <div class="mdui-row">
                <div class="mdui-col-xs-10">
                    <div class="mdui-textfield">
                        <input name="value" class="mdui-textfield-input" type="text" placeholder=""/>
                    </div>
                </div>
                <div class="mdui-col-xs-2 mdui-m-t-2">
                    <input class="mdui-btn mdui-btn-raised mdui-ripple mdui-btn-block" type="submit" value="提交">
                </div>
            </div>
        </div>
    </div>
</form>
