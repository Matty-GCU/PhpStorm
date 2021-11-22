<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * @package App\Models
 * @property $id 学生学号
 * @property $name 学生姓名
 */
class Student extends Model
{
    public $timestamps = false;
}
