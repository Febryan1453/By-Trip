<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function regis(Request $request)
    {
        $psn = [
            'password.required'  => "Password wajib diisi.",
            'password.min'       => "Password minimal diisi dengan 6 karakter.",

            'email.required'     => "Email wajib diisi.",
            'email.email'        => "Email tidak valid.",
            'email.unique'       => "Email sudah terdaftar.",

            'city.required'      => "Kota wajib diisi.",
        ];

        $validasi = Validator::make($request->all(), [
            'email'              => "required|unique:users|email",
            'password'           => "required|min:6",
            'city'               => "required"
        ], $psn);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->errorWoy(0, $val[0]);
        }

        $user = User::create(array_merge($request->all(), [
            'password' => bcrypt($request->password)
        ]));

        if ($user) {
            return response()->json([
                'status'    => 1,
                'message'   => "$user->email, has been registered",
                'data'      => $user
            ], Response::HTTP_OK);
        }

        return $this->errorWoy(0, "Registration failed");
    }

    public function login(Request $request)
    {
        $psn = [
            'password.required'  => "Password wajib diisi.",

            'email.required'     => "Email wajib diisi.",
            'email.email'        => "Email tidak valid."
        ];

        $validasi = Validator::make($request->all(), [
            'email'              => "required|email",
            'password'           => "required"
        ], $psn);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->errorWoy(0, $val[0]);
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (password_verify($request->password, $user->password)) {
                if ($user->name == null) {
                    return response()->json([
                        'status'    => 1,
                        'message'   => "Welcome, $user->email",
                        'data'      => $user
                    ], Response::HTTP_OK);
                } else {
                    return response()->json([
                        'status'    => 1,
                        'message'   => "Welcome, $user->name",
                        'data'      => $user
                    ], Response::HTTP_OK);
                }
            }
            return $this->errorWoy(0, "Password wrong.");
        }

        return $this->errorWoy(0, "Email not registered.");
    }

    public function editUser(Request $request, $id)
    {
        $user                         = User::find($id);

        if (!$user) {
            return response()->json([
                'status'               => 0,
                'message'              => 'User tidak ditemukan.',
            ], Response::HTTP_NOT_FOUND);
        }

        $psn = [
            'email.required'     => "Email wajib diisi.",
            'email.email'        => "Email tidak valid.",
            'email.unique'       => "Email sudah terdaftar.",

            'city.required'      => "Kota wajib diisi.",

            'name.required'      => "Nama masih kosong.",

            'phone.required'     => "Telepon masih kosong.",
            'phone.numeric'      => "Tidak boleh ada huruf.",
            'phone.digits'       => "Phone harus 12 digit.",
            'phone.unique'       => "Phone telah terdaftar.",
        ];

        $validasi = Validator::make($request->all(), [
            'name'               => "required",
            'email'              => "required|email",
            'phone'              => "required|numeric|digits:12",
        ], $psn);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->errorWoy(0, $val[0]);
        }

        $user->update([
            'name'               => $request->name,
            'email'              => $request->email,
            'phone'              => $request->phone,
            'city'               => $request->city
        ]);

        return response()->json([
            'status'                   => 1,
            'message'                  => "$request->name, Profile anda berhasil diubah.",
        ], Response::HTTP_OK);
    }

    public function editPass(Request $request, $id)
    {
        $user                         = User::find($id);

        if (!$user) {
            return response()->json([
                'status'               => 0,
                'message'              => 'User tidak ditemukan.',
            ], Response::HTTP_NOT_FOUND);
        }

        $psn = [
            'password.required'             => "Password sekarang wajib diisi.",
            'new_password.required'         => "Password baru wajib diisi.",
            'password_confirm.required'     => "Password konfirmasi wajib diisi.",
        ];

        $validasi = Validator::make($request->all(), [
            'password'                      => "required",
            'new_password'                  => "required",
            'password_confirm'              => "required"
        ], $psn);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->errorWoy(0, $val[0]);
        }

        if ($user) {

            if (password_verify($request->password, $user->password)) {

                if ($request->new_password != $request->password_confirm) {
                    return $this->errorWoy(0, "Password konfirmasi salah.");
                } elseif ($request->new_password == $request->password) {
                    return $this->errorWoy(0, "Password baru tibak boleh sama dengan password lama.");
                } else {
                    $user->update([
                        'password' => bcrypt($request->new_password)
                    ]);

                    return response()->json([
                        'status'    => 1,
                        'message'   => "$user->name, Password anda berhasil diubah.",
                    ], Response::HTTP_OK);
                }
            }

            return $this->errorWoy(0, "Password sekarang salah.");
        }
    }


    public function errorWoy($status, $message)
    {
        return response()->json([
            'status'    => $status,
            'message'   => $message
        ], Response::HTTP_OK);
    }
}
