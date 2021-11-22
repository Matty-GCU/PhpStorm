<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>在线学生信息</title>
    <style type="text/css">

    </style>
</head>
<body>
    在线学生信息
    <table frame="border" rules="all">
        <tr>
            <td>id</td>
            <td>name</td>
        </tr>
        @foreach($stuInfos as $item)
            <tr>
                <td>{{$item['id']}}</td>
                <td>{{$item['name']}}</td>
            </tr>
        @endforeach
    </table>
    <br>
    <a href="db/addStu"><button>增</button></a>&nbsp;
    <a href="db/deleteStu"><button>删</button></a>&nbsp;
    <a href="db/updateStu"><button>改</button></a>&nbsp;
    <a href="db/searchStu"><button>查</button></a>
</body>
</html>
