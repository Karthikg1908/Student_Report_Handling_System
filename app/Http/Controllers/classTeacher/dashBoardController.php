<?php

namespace App\Http\Controllers\classTeacher;

use App\Models\Students;
use Illuminate\Http\Request;
use App\Models\classteachers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class dashBoardController extends Controller
{
    public function dashboard()
    {
        $countStudents = $this->countStudents();
        return view('class_teacher.dashboard',compact('countStudents'));
    }

    public function countStudents()
    {
        $teacher = classteachers::where('userId_fk','=',Auth::user()->id)->first();
        $countStudents = Students::join('classteachers','students.departmentId_fk','=','classteachers.departmentId_fk')
                        ->where('students.academicSemesters','=',$teacher->academicSemesters)
                        ->count();

        return $countStudents;
    }
}
