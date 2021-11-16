<?php

namespace App\Http\Controllers;

use App\Http\Models\Student;
use App\Http\Models\StuInfo;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;
use phpDocumentor\Reflection\DocBlock\Tags\Param;

class DBController
{
    function select()
    {
        $stu = DB::table('students')->select('id', 'name')->get();
        return $stu;
    }
}
