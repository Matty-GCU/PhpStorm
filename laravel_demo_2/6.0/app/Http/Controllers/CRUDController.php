<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRUDController extends Controller
{
    //查出表中所有学生记录，显示在表格中
    public function index(Request $request) {
        $list = Student::all()->toArray();
        return response()->view('stuList', [
            'stuInfos'=>$list
        ]);
    }

    //删除特定学生记录
    public function doDelete(Request $request) {
        $id = $request->get('stuId');
        Student::find($id)->delete();
        return response('删除成功');
    }

    //添加学生记录
    public function doInsert(Request $request) {
        $id = $request->get('stuId');
        $name = $request->get('stuName');
        $obj = new Student();
        $obj->id=$id;
        $obj->name=$name;
        $obj->save();
        return response('插入成功');
    }

    //修改特定姓名对应学生的学号
    public function doUpdate(Request $request) {
        $name = $request->get('stuName');
        $newId = $request->get('newStuId');
        $stu = Student::where('name', $name)->first();
        $stu->id = $newId;
        $stu->save();
        return response('修改成功');
    }

    //查询特定姓名对应学生的学号
    public function doSearch(Request $request) {
        $name = $request->get('stuName');
        $stu = Student::where('name', $name)->first();
        $id = $stu->id;
        dd($id);
    }

}
