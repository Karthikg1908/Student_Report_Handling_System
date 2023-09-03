<?php

namespace App\Http\Controllers\student;

use App\Models\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class dashBoardController extends Controller
{
    public function dashboard()
    {
        $Sub1 = Students::join('subjects','students.subject1','=','subjects.subjectId')->first();
        $Sub2 = Students::join('subjects','students.subject2','=','subjects.subjectId')->first();
        $Sub3 = Students::join('subjects','students.subject3','=','subjects.subjectId')->first();
        $Sub4 = Students::join('subjects','students.subject4','=','subjects.subjectId')->first();
        $Sub5 = Students::join('subjects','students.subject5','=','subjects.subjectId')->first();
        $Sub6 = Students::join('subjects','students.subject6','=','subjects.subjectId')->first();

        $getSem = $this->getSem();
        return view('students.dashboard',compact('getSem','Sub1','Sub2','Sub3','Sub4','Sub5','Sub6'));
    }

    public function getSem()
    {
        $getSem = Students::join('studentreports','students.studentId','=','studentreports.studentId_fk')
        ->where('students.userId_fk','=',Auth::user()->id)->first();

        return $getSem;
    }


}
