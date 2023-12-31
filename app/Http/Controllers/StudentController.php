<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// import models query builder yang sudah dibuat
// use Illuminate\Support\Facades\DB;

// import models, untuk bisa menggunakan elequent maaka, harus import modelsnya
use App\Models\Student;


class StudentController extends Controller
{
    
    public function index()
    {
        // ini cara query builder
        // $users = DB::table('students')->get();
        // return $users;

        // ini cara elequent
        $students = Student::all();

        if($students){
            // membuat deskripsi/keterangan
        $data = [
            "message" => "Get All Resource",
            "data" => $students
        ];
        return response()->json($data, 200);
        }else{
            $data = [
                "message" => "Resource Not Found"
            ];
            return response()->json($data, 404);
        }
    }

    // untuk get detail
    public function show($id){
        $students = Student::find($id);

        if($students) {
            $data = [
                "message" => "Get Detail Resource",
                "data" => $students
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                "message" => "Data Not Found"
            ];
            return response()->json($data, 404);
        }
    }

    // ini create data secara manual
    /* public function store(){
        $students = Student::create([
            'nama' => 'Budi Santoso',
            'nim' => '23232332',
            'email' => 'budi@gmail.com',
            'jurusan' => 'Teknik Komputer',
        ]);

        return $students;
    } */

    // untuk melakukan request ke database maka perlu memasukan parameter $request dan tipe datanya Request
    public function store(Request $request){
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        $students = Student::create($input);
            $data = [
                "message"=>"Student is Created!",
                "data" => $students,
            ];
            return response()->json($data, 201);
    }

    public function update (Request $request, $id) {
        $students = Student::find($id);

        if($students){
            $input = [
                'nama' => $request->nama ?? $students->nama,
                'nim' => $request->nim?? $students->nim,
                'email' => $request->email ?? $students->email,
                'jurusan' => $request->jurusan ?? $students->jurusan,
                'created_at' => $request->created_at ?? $students->created_at,
                'updated_at' => $request->updated_at ?? $students->updated_at,
            ];
            $students->update($input);

            $data = [
                'message' => 'Resource is update successfully',
                'data' => $students
            ];

            return response($data, 200);
        }else{
            $data = [
                'message' => 'Resource not found',
            ];
            return response()->json($data, 404);
        }
    }
    
    public function destroy ($id) {
        $students = Student::find($id);

       if($students){
        $students->delete();

        $data = [
            "message" => "Resource is delete successfully",
        ];
       }else{
        $data = [
            'message' => 'Resource not found',
        ];
        
        return response()->json($data, 404);
    }
        return response()->json($data, 200);
    }
}
