<?php

namespace App\Http\Controllers\classTeacher;

use App\Models\Students;
use App\Models\Subjects;
use App\Models\Departments;
use Illuminate\Http\Request;
use App\Models\classteachers;
use App\Models\Studentreports;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    public function studentProfile()
    {
        $countStudents = $this->countStudents();
        $getStudents = $this->getStudents();
        $getSubject = $this->getSubject();
        $getDepartment = $this->getDepartment();
        return view('class_teacher.students',compact('countStudents','getStudents','getSubject','getDepartment'));
    }

    public function countStudents()
    {
        $teacher = classteachers::where('userId_fk','=',Auth::user()->id)->first();
        $countStudents = Students::join('classteachers','students.departmentId_fk','=','classteachers.departmentId_fk')
                        ->where('students.academicSemesters','=',$teacher->academicSemesters)
                        ->count();

        return $countStudents;
    }

    public function getStudents()
    {
        $teacher = classteachers::where('userId_fk','=',Auth::user()->id)->first();
        $getStudents = Students::join('classteachers','students.departmentId_fk','=','classteachers.departmentId_fk')
                                ->join('users','students.userid_fk','=','users.id')
                                ->join('studentreports','students.studentId','=','studentreports.studentId_fk')
                        ->where('students.academicSemesters','=',$teacher->academicSemesters)
                        ->get();
        return $getStudents;
    }

    public function getSubject()
    {
        $getSubject = Subjects::get();

        return $getSubject;
    }

    public function getDepartment()
    {
        $getDepartment = Departments::get();

        return $getDepartment;
    }

    public function addSubjects(Request $request)
    {
        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');
        if($request->has('addDetails'))
        {
            Students::where('userId_fk','=',$request->id)
                    ->update([
                        'subject1' => $request->sub1,
                        'subject2' => $request->sub2,
                        'subject3' => $request->sub3,
                        'subject4' => $request->sub4,
                        'subject5' => $request->sub5,
                        'subject6' => $request->sub6,
                        'updated_at' => $Date
                    ]);

                    return redirect()->back()->with(['status'=>'Subject Details updated Successfully']);

        }
        elseif($request->has('addMarks'))
        {
            $internal1Total = $request->sub1sem1Marks + $request->sub2sem1Marks + $request->sub3sem1Marks
                            + $request->sub4sem1Marks + $request->sub5sem1Marks + $request->sub6sem1Marks;

            $internal1Percentage = ($internal1Total / 150) * 100;

            $internal2Total = $request->sub1sem2Marks + $request->sub2sem2Marks + $request->sub3sem2Marks
                            + $request->sub4sem2Marks + $request->sub5sem2Marks + $request->sub6sem2Marks;

            $internal2Percentage = ($internal2Total / 150) * 100;

            $examTotal = $request->sub1exam + $request->sub2exam + $request->sub3exam
                        + $request->sub4exam + $request->sub5exam + $request->sub6exam;

            $examPercentage = ($examTotal / 600) * 100;

            Studentreports::where('userId_fk','=',$request->id)
                    ->update([
                        'subject1Internal1' => $request->sub1sem1Marks,
                        'subject2Internal1' => $request->sub2sem1Marks,
                        'subject3Internal1' => $request->sub3sem1Marks,
                        'subject4Internal1' => $request->sub4sem1Marks,
                        'subject5Internal1' => $request->sub5sem1Marks,
                        'subject6Internal1' => $request->sub6sem1Marks,
                        'internal1Total' => $internal1Total,
                        'internal1Percentage' => $internal1Percentage,

                        'subject1Internal2' => $request->sub1sem2Marks,
                        'subject2Internal2' => $request->sub2sem2Marks,
                        'subject3Internal2' => $request->sub3sem2Marks,
                        'subject4Internal2' => $request->sub4sem2Marks,
                        'subject5Internal2' => $request->sub5sem2Marks,
                        'subject6Internal2' => $request->sub6sem2Marks,
                        'internal2Total' => $internal2Total,
                        'internal2Percentage' => $internal2Percentage,

                        'subject1Exam' => $request->sub1exam,
                        'subject2Exam' => $request->sub2exam,
                        'subject3Exam' => $request->sub3exam,
                        'subject4Exam' => $request->sub4exam,
                        'subject5Exam' => $request->sub5exam,
                        'subject6Exam' => $request->sub6exam,
                        'examTotal' => $examTotal,
                        'examPercentage' => $examPercentage,

                        'updated_at' => $Date
                    ]);

                    return redirect()->back()->with(['status'=>'Marks updated Successfully']);
        }
    }
}
