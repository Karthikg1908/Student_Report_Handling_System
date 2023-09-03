<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Imports\ImportUser;
use App\Models\Departments;
use Illuminate\Http\Request;
use App\Models\classteachers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class adminTeachersController extends Controller
{
    public function adminTeacherslist()
    {
        $totalTeachers = $this->totalTeachers();
        $getTeachers = $this->getTeachers();
        $getDepartment = $this->getDepartment();

        return view('admin.teachers',compact('totalTeachers','getTeachers','getDepartment'));
    }

    public function totalTeachers()
    {
        $totalTeachers = User::where('userType','=','CLASSTEACHER')->count();

        return $totalTeachers;
    }

    public function getTeachers()
    {
        $getTeachers = User::leftjoin('classteachers','users.id','=','classteachers.userId_fk')
        ->where('userType','=','CLASSTEACHER')
        ->orderBy('users.id','desc')
        ->get();

        return $getTeachers;
    }

    public function getDepartment()
    {
        $getDepartment = Departments::get();

        return $getDepartment;
    }

    public function addCassTeacher(Request $request)
    {
        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

        if($request->has('addDetails'))
        {
            $data = classteachers::where('userId_fk','=',$request->userid)->first();
            if($data)
            {
                classteachers::where('userId_fk','=',$request->userid)
                    ->update([
                        'departmentId_fk' => '1',
                        'academicSemesters' => $request->academicSemesters,
                        'isClassTeacher' => '1',
                        'updated_at' => $Date
                    ]);

            return redirect()->back()->with(['status'=>'Teacher Details updated Successfully']);
            }
            else
            {
                $classteachers = new classteachers;
                $classteachers->userId_fk = $request->userid;
                $classteachers->departmentId_fk = $request->department;
                $classteachers->academicSemesters = $request->academicSemesters;
                $classteachers->isClassTeacher = '1';
                $classteachers->created_at = $Date;
                $classteachers->updated_at = $Date;
                $classteachers->save();

                return redirect()->back()->with(['status'=>'Teacher added updated Successfully']);
            }

        }
        elseif($request->has('addClassTeacher'))
        {
            $request->validate([
                'file' => 'required|max:10000|mimes:xlsx,xls',
            ]);

            $data = Excel::import(new ImportUser,$request->file('file'));


            return redirect()->back()->with(['status'=>'Account List Added Successfully']);
        }
    }

}
