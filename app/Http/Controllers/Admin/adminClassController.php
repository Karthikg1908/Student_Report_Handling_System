<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Departments;
use Illuminate\Http\Request;
use App\Models\DepartmentsModel;
use App\Http\Controllers\Controller;

class adminClassController extends Controller
{
    public function adminClassList()
    {
        $totalDepartment = $this->totalDepartment();
        $getDepartment = $this->getDepartment();

        return view('admin.class',compact('totalDepartment','getDepartment'));
    }

    public function totalDepartment()
    {
        $totalDepartment = Departments::count();

        return $totalDepartment;
    }

    public function getDepartment()
    {
        $getDepartment = Departments::get();

        return $getDepartment;
    }

    public function addClass(Request $request)
    {
        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

        $request->validate([
            'addmore.*.class' => ['required'],
        ]);

        foreach($request->addmore as $key => $value)
        {
            $subject = new Departments;

            $subject->departmentName = $value['class'];
            $subject->created_at = $Date;
            $subject->updated_at = $Date;
            $subject->save();
        }

        return redirect()->back()->with('status','Department Added Successfully');
    }
}
