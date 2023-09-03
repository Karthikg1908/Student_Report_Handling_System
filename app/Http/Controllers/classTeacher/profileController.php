<?php

namespace App\Http\Controllers\classTeacher;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function classTeacherProfile()
    {
        return view('class_teacher.profile');
    }

    public function updateProfile(Request $request)
    {
        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

        $AddUsers = User::where('id','=', Auth::user()->id)->first();

        $request->validate([
            'img' => ['required','image','max:5000']
        ]);

        $file = $request->file('img');
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = $AddUsers->phone;
        $filename = $fileName.'.'.$fileExtension;
        $file->move('images/teachers/',$filename);

        $AddUsers = User::where('id','=', Auth::user()->id)->first();
        $AddUsers->updated_at = $Date;
        $AddUsers->profilePicture=$filename;
        $AddUsers->save();

        return redirect()->back()->with(['status'=>'Profile Picture Updated Successfully']);
    }
}
