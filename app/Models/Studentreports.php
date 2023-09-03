<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentreports extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentReportId','userId_fk','studentId_fk','subject1Internal1','subject2Internal1',
        'subject3Internal1','subject4Internal1','subject5Internal1','subject6Internal1','internal1Total','internal1Percentage',
        'subject1Internal2','subject2Internal2','subject3Internal2',
        'subject4Internal2','subject5Internal1','subject6Internal2','internal2Total','internal2Percentage',
        'subject1Exam','subject2Exam','subject3Exam','subject4Exam',
        'subject5Exam','subject6Exam','created_at','updated_at','exam1Total','exam1Percentage'
    ];

    public function userModel()
    {
        return $this->belongsTo(User::class);
    }
}
