<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
class EmployeesController extends Controller
{

    public function index()
    {
        // mendapatkan semua employees
        $employees = Employees::all();

    if($employees->isEmpty()){
        // Response jika employees ada
        return response()->json([
            'message'=> 'Get All employees',
            'data'=> $employees,
            'status' => 200,
        ], 200);
    }

       // Response jika remployess kosong
        return response()->json([
        'message' => 'Data is empaty',
        'status' => 200,
        ],200);
    }

    // membuat method store
    public function store(Request $request)
    {
        // Validasi input menggunakan Laravel Validator
        $request = request( [
            'field1' => 'required',
            'field2' => 'required',
        ]);

        // Jika validasi gagal, kirim respons dengan pesan kesalahan
        if ($request->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $request->errors(),
                'status' => 422,
            ], 422);
        }

        // Simpan data menggunakan Eloquent
        $newemployees = Employees::create([
            'field1' => $request->input('field1'),
            'field2' => $request->input('field2'),
            // Tambahkan kolom lain sesuai kebutuhan
        ]);

        // Response jika employees berhasil ditambahkan
        return response()->json([
            'message' => 'employeesis added successfully',
            'data' => $newemployees,
            'status' => 201,
        ], 201);
    }

    // membuat method show
    public function show($id)
    {
        // cari employees dengan menggunakan eloquent find
        $employees = Employees::find($id);

        // jika employees ditemukan, kirim respons berhasil
        if ($employees) {
            return response()->json([
                'message' => "Get detail employees",
                'data'=> $employees,
                'status' => 200,
            ], 200);
        }

        // jika employees tidak ditemukan, kirim respons not found
        return response()->json([
            'message' => 'employees not found',
            'status' => 400,
        ], 400);
    }

    // method update
    public function update(Request $request, $id)
    {
        // Setelah pembaruan, ambil employees yang telah diperbarui
        $updatedemployees = Employees::find($id);

        // Kirim respons berhasil di-update
        return response()->json([
        'message' => 'employees is updated successfully',
        'data' => $updatedemployees,
        'status' => 200,
        ], 200);
    }

    // method destroy
    public function destroy($id)
    {
        // Hapus employees menggunakan Eloquent delete
        $employees = Employees::find($id);
        $employees->delete();

        // Kirim respons berhasil dihapus
        return response()->json([
            'message' => 'Employees is deleted successfully',
            'status' => 200,
        ], 200);
        
    }

    // method search
    public function search(Request $request)
    {
        // Cari employees berdasarkan nama menggunakan Eloquent where dan get
        $searchedemployees = Employees::where('name', 'like', '%' . $request->input('lidiana') . '%')->get();

        // Kirim respons berhasil mencari employees
        return response()->json([
            'message' => 'Get searched employees',
            'data' => $searchedemployees,
            'status' => 200,
        ], 200);
    }

    // method active
    public function activemployees()
    {
        // Cari employees yang aktif menggunakan Eloquent where dan get
        $activeemployees = Employees::where('status', 'active')->get();

        // Kirim respons berhasil mendapatkanemployees aktif
        return response()->json([
            'message' => 'active employees',
            'total' => $activeemployees->count(),
            'data' => $activeemployees,
            'status' => 200,
        ], 200);
    }

    // method inactive
    public function getInactiveemployees()
    {
        // Cari employees yang tidak aktif menggunakan Eloquent where dan get
        $inactiveemployees = Employees::where('status', 'inactive')->get();

        // Kirim respons berhasil mendapatkan employees tidak aktif
        return response()->json([
            'message' => 'Get inactive employees',
            'total' => $inactiveemployees->count(),
            'data' => $inactiveemployees,
            'status' => 200,
        ], 200);
    }

    // method terminated
    public function getTerminatedemployees()
    {
        // Cari employees yang dihentikan menggunakan Eloquent where dan get
        $terminatedemployees = Employees::where('status', 'terminated')->get();

        // Kirim respons berhasil mendapatkan employees yang dihentikan
        return response()->json([
            'message' => 'Get terminated employees',
            'total' => $terminatedemployees->count(),
            'data' => $terminatedemployees,
            'status' => 200,
        ], 200);
    }
}

