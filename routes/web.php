<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reg\RegController;
use App\Http\Controllers\Reg\CustomResetPassword;
use App\Http\Controllers\student\ReportController;
use App\Http\Controllers\Admin\adminClassController;
use App\Http\Controllers\Admin\adminProfileController;
use App\Http\Controllers\Admin\adminStudentsController;
use App\Http\Controllers\Admin\adminSubjectsController;
use App\Http\Controllers\Admin\adminTeachersController;
use App\Http\Controllers\Admin\adminDashboardController;
use App\Http\Controllers\classTeacher\profileController;
use App\Http\Controllers\classTeacher\StudentController;
use App\Http\Controllers\classTeacher\dashBoardController;
use App\Http\Controllers\student\profileController as StudentProfileController;
use App\Http\Controllers\student\dashBoardController as StudentDashBoardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/reg-user',[RegController::class,'newUser']);

Route::post('/newUsers',[RegController::class,'RegUser']);

Route::get('/forgot-password',[CustomResetPassword::class,'forgotpassword']);
Route::get('/requestOTP',[CustomResetPassword::class,'RequestOTP']);
Route::get('/verifyOTP',[CustomResetPassword::class,'VerifyOTP']);
Route::get('/NewPass',[CustomResetPassword::class,'EnterNewPassword']);


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','ADMIN']],function(){


    Route::get('/admin/dashboard',[adminDashboardController::class,'adminDashboard']);

    Route::get('/admin/teachers-list',[adminTeachersController::class,'adminTeachersList']);
    Route::post('/admin/addteacher',[adminTeachersController::class,'addCassTeacher']);

    Route::get('/admin/students-list',[adminStudentsController::class,'adminStudentsList']);
    Route::post('/admin/addstudents-details',[adminStudentsController::class,'addDetails']);

    Route::get('/admin/subject-list',[adminSubjectsController::class,'adminSubjectsList']);
    Route::post('/admin/addSubject',[adminSubjectsController::class,'addSubject']);

    Route::get('/admin/class-list',[adminClassController::class,'adminClassList']);
    Route::post('/admin/addClass',[adminClassController::class,'addClass']);

    Route::get('/admin/profile',[adminProfileController::class,'adminProfile']);
    Route::post('/admin/profileUpdate',[adminProfileController::class,'updateProfile']);

});

Route::group(['middleware' => ['auth','CLASSTEACHER']],function(){

    Route::get('/class-teacher/dashboard',[dashBoardController::class,'dashboard']);

    Route::get('/class-teacher/students-list',[StudentController::class,'studentProfile']);
    Route::post('/class-teacher/addSubjects',[StudentController::class,'addSubjects']);

    Route::get('/class-teacher/profile',[profileController::class,'classTeacherProfile']);
    Route::post('/class-teacher/profileUpdate',[profileController::class,'updateProfile']);

});

Route::group(['middleware' => ['auth','STUDENT']],function(){

    Route::get('/student/dashboard',[StudentDashBoardController::class,'dashboard']);

    Route::get('/student/profile',[StudentProfileController::class,'profile']);
    Route::post('/student/profileUpdate',[StudentProfileController::class,'updateProfile']);

    Route::get('/student/report',[ReportController::class,'report']);
});
