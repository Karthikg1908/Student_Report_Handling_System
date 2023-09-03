<?php

namespace App\Models;

use App\Models\DepartmentsModel;
use App\Models\AcademicSemestersModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamMaxMarksModel extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        'exammarksId','departmentId_fk','academicYearId_fk',
        'academicSemestersId_fk','internal1','internal2','internal3',
        'exam','totalMarks','created_at','updated_at',
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
}
