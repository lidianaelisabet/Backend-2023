<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    public function index()
    {
        // mendapatkan semua data students
        $students = Student::all();

        // jika data kosong maka kirim status code 204
        if ($students->isEmpty()){
            $data = [
                "message"=>" Resource is empty"
            ];
        
            return response()->json($data, 204);
        }
        $data = [
            "message" => "Get all resources",
            "data" => $students
        ];

        // kirim data(json) dan response code
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        // validasi data request
        $request->validate([
            "nama"=> "required",
            "nim" => "0110222165",
            "email" => "lidianaelisabet4@gmail.com",
            "jurusan " => "required"
        ]);
        
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        $student = Student::create($input);

        $data = [
            "message" => "Student is created",
            "data" => $student,
        ];

        return response()->json($data, 201);
    }

    // mendapatkan detail resource student
    // membuat method show
    public function show($id){
        // cari id student yang ingin didapatkan
        $student = Student::fin ($id);
        if ($student){
            $data = [
                "message"=> "get detail student",
                "data"=> $student,
            ];

            // mengemalikan data (json) dan code 200
            return response()->json($data, 200);
        }else {
            $data = [
                "message"=>"Student not found",
            ];
            // mengembalikan data (json) dan  code 404
            return response()->json($data, 404);
        }
    }
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update([
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan
        ]);

        $data = [
            "message" => "Student Berhasil di Perbaharui",
            "data" => $student
        ];

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $students = Student::find($id);

        $students->delete();

        $data = [
            "message" => "Student Berhasil di Hapus",
            "data" => $students
        ];

        return response()->json($data, 204);
    }
}