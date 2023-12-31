<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    use HasFactory;
    // ini cara query builder
   /**
    * untuk bisa digunakan di controller maka, import dulu Modelsnya dicontroller:
    * use Illuminate\Support\Facades\DB; 
    */
    
    /* static function index(){
        $students = DB::table('students')->select('*')->get();
        return $students;
    } */

    protected $fillable = ['nama', 'nim', 'email', 'jurusan', 'created_at', 'updated_at'];

}
