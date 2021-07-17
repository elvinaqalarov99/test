<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;


    protected $fillable = ['name','surname','middle_name','gender','salary'];

    public function departments(){
        return $this->belongsToMany(Department::class);
    }
    
    public function getDepartmentIds(){
        return $this->departments->pluck('id')->all();
    }

    // public function getGroupData(){
    //     return $this->departments->groupBy('department_id');
    // }
}