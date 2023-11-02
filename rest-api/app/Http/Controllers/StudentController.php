<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    public function index()
    {
        // mendapatkan semua data students
        $students = Student::all();

        $data = [
            "message" => "Get all resources",
            "data" => $students
        ];

        // kirim data(json) dan response code
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
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
    public function update(Request $request, $id)
    {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $students = Student::find($id);

        $students->update($input);

        $data = [
            "message" => "Student Berhasil di Perbaharui",
            "data" => $students
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
