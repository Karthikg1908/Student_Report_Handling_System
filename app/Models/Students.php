<?php

namespace App\Models;

use App\Models\SubjectsModel;
use App\Models\DepartmentsModel;
use App\Models\AcademicYearsModel;
use App\Models\AcademicSemestersModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentId','userId_fk','departmentId_fk','academicYear',
        'academicSemesters','regNum','parentName','address','pincode',
        'subject1','subject2','subject3','subject4','subject5','subject6','subject7',
        'subject8','created_at','updated_at'
    ];

    public function departmentModel()
    {
        return $this->belongsTo(DepartmentsModel::class);
    }

    public function academicYearModel()
    {
        return $this->belongsTo(AcademicYearsModel::class);
    }

    public function academicSemModel()
    {
        return $this->belongsTo(AcademicSemestersModel::class);
    }

    public function subjectsModel()
    {
        return $this->belongsTo(SubjectsModel::class);
    }
}
