<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassTeachersModel;
use App\Models\User;
use Illuminate\Http\Request;

class adminDashboardController extends Controller
{
    public function adminDashboard()
    {
        $totalTeachers = $this->totalTeachers();
        $totalStudents = $this->totalStudents();

        return view('admin.dashboard',compact('totalTeachers','totalStudents'));
    }

    public function totalTeachers()
    {
        $totalTeachers = User::where('userType','=','CLASSTEACHER')->count();

        return $totalTeachers;
    }

    public function totalStudents()
    {
        $totalStudents = User::where('userType','=','STUDENT')->count();

        return $totalStudents;
    }

}
