<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Memmbuat fitur Register
    public function register(Request $request){
        //Menangkap inputan
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        // Menginsert data ke table user
        $user = User::create($input);

        $data = [
            'message' => 'user is created succeddfully'
        ];

        // Mengirim response JSON
        return response()->json($data, 200);
    }
    // Membuat fitur login
    public function login(Request $reguest) {
        // Menangkap input user
        $input = [
            'email' =>$reguest->email,
            'password' => $reguest->password
        ];

        // Mengambil data user (DB)
        $user = User::where('email', $input['email'])->first();

        // membandingkan input user dengan data user (DB)
        $isLoginSuccessfully = (
            $input['email'] == $user->email
            &&
            Hash::check($input['password'], $user->password)
        );
        if ($isLoginSuccessfully) {
            // Membuat token
            $token = $user->createToken('aut_token');

            $data = [
                'message' => 'Login successfully',
                'token' => $token->plainTextToken
            ];

            // Mengembalikan response JSON
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Username or Password is wrong'
            ];
            return response()->json($data, 401);
        }
    }
}
