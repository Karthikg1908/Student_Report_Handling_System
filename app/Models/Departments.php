<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        'departmentId','departmentName','created_at','updated_at',
    ];
}
