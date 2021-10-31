<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class WisataController extends Controller
{
    public function getWisata()
    {
        $wisata = Wisata::orderBy('id', 'desc')->get();
        return response()->json([
            'status'    => 1,
            'message'   => "Berhasil mendapatkan data wisata.",
            'data'      => $wisata
        ], Response::HTTP_OK);
    }

    public function getWisataPerKategori($id)
    {
        $kategori = Kategori::find($id);
        $wisata = Wisata::where('kategori_id', $id)->get();
        return response()->json([
            'status'    => 1,
            'message'   => "Mendapatkan data wisata pada kategori $kategori->nama_kategori.",
            'data'      => $wisata
        ], Response::HTTP_OK);
    }
}
