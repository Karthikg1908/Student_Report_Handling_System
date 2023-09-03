<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Students;
use App\Models\Departments;
use Illuminate\Http\Request;
use App\Models\Studentreports;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class adminStudentsController extends Controller
{
    public function adminStudentsList()
    {
        $totalStudents = $this->totalStudents();
        $getDepartment = $this->getDepartment();
        $getStudents = $this->getStudents();
        return view('admin.students',compact('totalStudents','getDepartment','getStudents'));
    }

    public function getDepartment()
    {
        $getDepartment = Departments::get();

        return $getDepartment;
    }


    public function totalStudents()
    {
        $totalStudents = User::where('userType','=','STUDENT')->count();

        return $totalStudents;
    }

    public function getStudents()
    {
        $getStudents = User::where('userType','=','STUDENT')->get();

        return $getStudents;
    }

    public function addDetails(Request $request)
    {
        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

        if($request->has('addDetails'))
        {
            $data = Students::where('userId_fk','=',$request->id)->first();
            if($data)
            {
                Students::where('userId_fk','=',$request->id)
                    ->update([
                        'departmentId_fk' => '1',
                        'academicSemesters' => $request->academicSemesters,
                        'academicYear' => $request->academicYear,
                        'updated_at' => $Date
                    ]);

            return redirect()->back()->with(['status'=>'Student Details updated Successfully']);

            }
            else
            {
                $Students = new Students;
                $Students->userId_fk = $request->id;
                $Students->departmentId_fk = '1';
                $Students->academicSemesters = $request->academicSemesters;
                $Students->academicYear = $request->academicYear;
                $Students->created_at = $Date;
                $Students->updated_at = $Date;
                $Students->save();

                $data = Students::where('userId_fk','=',$request->id)->first();

                $studentReport = new Studentreports;
                $studentReport->userId_fk = $request->id;
                $studentReport->studentId_fk = $data->studentId;
                $studentReport->save();

                return redirect()->back()->with(['status'=>'Student details added updated Successfully']);
            }

        }
    }
}
