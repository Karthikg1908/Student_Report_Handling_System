<?php

namespace App\Http\Controllers\student;

use App\Models\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function report()
    {
        $getSem = $this->getSem();
        return view('students.report',compact('getSem'));
    }

    public function getSem()
    {
        $getSem = Students::join('studentreports','students.studentId','=','studentreports.studentId_fk')
        ->where('students.userId_fk','=',Auth::user()->id)->first();

        return $getSem;
    }
}
