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

        // Response jika employees ada
        if($employees->isEmpty()){
            $data = [
                "message"=>" Resource is empaty"
            ];
        return response()->json($data, 200);
    }
            $data = [
                "message" =>" resource is empaty",
                "data" => $employees
            ];
    
    // Response jika employes kosong ke code 200
        return response()->json($data, 200);
    
    }

    // membuat method store
    public function store(Request $request)
    {
        // Validasi input menggunakan Laravel Validator
        $request = request( [
            "nama" => "Lidiana",
            "gender" => "perempuan",
            "no_HP" => "082161035623",
            "email" => "lidianaelisabet4@gmail.com",
            "status" =>"pegawai"
        ]);

        $input = [
            'nama' => $request->nama,
            'gender' => $request->gender,
            'no_HP' => $request->no_HP,
            'email' => $request->email,
            'status' => $request->status,
        ];

        $employees = Employees::create($input);

        $data = [
            "message" => "Employees is created",
            "data" => $employees,
        ];

        return response()->json($data, 201);
    }

    // membuat method show
    public function show($id)
    {
        // cari employees dengan menggunakan eloquent find
        $employees = Employees::find($id);

        if ($employees) {
            $data = [
                "message"=> "get detail employees",
                "data"=> $employees,
            ];

            // jika employees ditemukan, kirim respons berhasil
            return response()->json($data, 404);
        }else {
            $data = [
                "message"=>"Employess not found",
            ];
        }
    }
        // method update
        public function update(Request $request, $id)
        {
            // Setelah pembaruan, ambil employees yang telah diperbarui
            $employees = Employees::find($id);
            $employees->update([
            'nama' => $request->nama ?? $employees->nama,
            'gender' => $request->jenis_kelamin ?? $employees->jenis_kelamin,
            'no_HP' => $request->no_HP ?? $employees->no_Hp,
            'alamat' => $request->alamat ?? $employees->alamat,
            'email' => $request->email ?? $employees->email,
            'status' => $request->status ?? $employees->status

        ]);

        $data = [
            "message" => "Employees berhasil di perbaharui",
            "data" => $employees
        ];

        return response()->json($data, 200);
    }

    // method destroy
    public function destroy($id)
    {
        // Hapus employees menggunakan Eloquent delete
        $employees = Employees::find($id);
        $employees->delete();

            // berhasil di hapus
        $data = [
            'message' => 'Employees is deleted successfully',
            'data'=> $employees
        ];

        return response()->json($data, 200);
    }

    // method search
    public function search(Request $request)
    {
        // Cari employees berdasarkan nama menggunakan Eloquent where dan get
        $searchedemployees = Employees::where('name', 'alamat', '%' .
        $request->input('lidiana', 'depok', ) . '%')->get();

        // Kirim respons berhasil mencari employees
        $data = [
            'message' => 'Employees is searched employees',
            'data' => $searchedemployees
        ];
            return response()->json($data, 200);
        }

    // method active
    public function activemployees()
    {
        // Cari employees yang aktif menggunakan Eloquent where dan get
        $activeemployees = Employees::where('status', 'active')->get();

        // Kirim respons berhasil mendapatkanemployees aktif
        $data = [
            'message' => 'active employees',
            'total' => $activeemployees->count(),
            'data' => $activeemployees,
        ];

            return response()->json($data, 200);
    }

    // method inactive
    public function getInactiveemployees()
    {
        // Cari employees yang tidak aktif menggunakan Eloquent where dan get
        $inactiveemployees = Employees::where('status', 'inactive')->get();

        // Kirim respons berhasil mendapatkan employees tidak aktif
        $data = [
            'message' => 'Get inactive employees',
            'total' => $inactiveemployees->count(),
            'data' => $inactiveemployees,
        ];
        return response()->json($data, 200);
    }

    // method terminated
    public function getTerminatedemployees()
    {
        // Cari employees yang dihentikan menggunakan Eloquent where dan get
        $terminatedemployees = Employees::where('status', 'terminated')->get();

        // Kirim respons berhasil mendapatkan employees yang dihentikan
        $data = [
            'message' => 'Get terminated employees',
            'total' => $terminatedemployees->count(),
            'data' => $terminatedemployees,
        ];
        return response()->json($data, 200);
    }
}



