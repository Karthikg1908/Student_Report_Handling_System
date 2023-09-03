<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Subjects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class adminSubjectsController extends Controller
{
    public function adminSubjectsList()
    {
        $totalSubjects = $this->totalSubjects();
        $getSubject = $this->getSubject();
        return view('admin.subjects',compact('totalSubjects','getSubject'));
    }

    public function totalSubjects()
    {
        $totalSubjects = Subjects::count();

        return $totalSubjects;
    }

    public function getSubject()
    {
        $getSubject = Subjects::get();

        return $getSubject;
    }

    public function addSubject(Request $request)
    {
        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

        $request->validate([
            'addmore.*.subjectName' => ['required'],
            'addmore.*.academicYear' => ['required'],
            'addmore.*.academicSemesters' => ['required'],
        ]);

        foreach($request->addmore as $key => $value)
        {
            $subject = new Subjects;

            $subject->subjectName = $value['subjectName'];
            $subject->academicSemesters = $value['academicSemesters'];
            $subject->academicYear = $value['academicYear'];
            $subject->created_at = $Date;
            $subject->updated_at = $Date;
            $subject->save();
        }

        return redirect()->back()->with('status','Subjects Added Successfully');
    }
}
