<?php

namespace App\Models;

use App\Models\User;
use App\Models\DepartmentsModel;
use App\Models\AcademicSemestersModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class classteachers extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        'teachersId','userId_fk','departmentId_fk','academicSemesters','isClassTeacher','created_at','updated_at',
    ];

    public function userModel()
    {
        return $this->belongsTo(User::class);
    }

    public function departmentsModel()
    {
        return $this->belongsTo(DepartmentsModel::class);
    }

    public function academicSemestersModel()
    {
        return $this->belongsTo(AcademicSemestersModel::class);
    }
}
