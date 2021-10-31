<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class KategoriController extends Controller
{
    public function addKategori(Request $request)
    {
        $psn = [
            'required'           => "Nama kategori wajib diisi.",
            'unique'             => "Kategori $request->nama_kategori sudah ada."
        ];

        $validasi = Validator::make($request->all(), [
            'nama_kategori'      => "required|unique:kategoris"
        ], $psn);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->errorWoy(0, $val[0]);
        }

        $kategori = Kategori::create(array_merge($request->all(), [
            'slug'               => Str::slug($request->nama_kategori, '-')
        ]));

        return response()->json([
            'status'    => 1,
            'message'   => "Kategori $kategori->nama_kategori, berhasil ditambahkan.",
            'data'      => $kategori
        ], Response::HTTP_OK);
    }

    public function getKategori()
    {
        $kategori = Kategori::orderBy('id', 'desc')->get();
        return response()->json([
            'status'    => 1,
            'message'   => "Berhasil mendapatkan data kategori.",
            'data'      => $kategori
        ], Response::HTTP_OK);
    }

    public function errorWoy($status, $message)
    {
        return response()->json([
            'status'    => $status,
            'message'   => $message
        ], Response::HTTP_OK);
    }
}
