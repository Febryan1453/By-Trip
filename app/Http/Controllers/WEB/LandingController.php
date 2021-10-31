<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class LandingController extends Controller
{
    public function index()
    {
        return view('section.index');
    }

    public function tambahKategori(Request $request)
    {
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug'          => Str::slug($request->nama_kategori, '-')
        ]);
        return redirect()->back();
    }

    public function editKategori(Request $request)
    {
        $kategori = Kategori::findOrFail($request->id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'slug'          => Str::slug($request->nama_kategori, '-')
        ]);
        return redirect()->back();
    }

    public function listKategori()
    {
        $title = "Data Kategori";
        $jumlahKategori = Kategori::count();
        $kategori = Kategori::orderBy('id', 'desc')->get();
        return view('section.kategori', compact('kategori', 'title', 'jumlahKategori'));
    }

    public function deleteKategori($id)
    {
        Kategori::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function tambahWisata(Request $request)
    {
        Wisata::create([
            'kategori_id'   => $request->kategori_id,
            'nama_wisata'   => $request->nama_wisata,
            'slug'          => Str::slug($request->nama_wisata, '-'),
            'harga'         => $request->harga,
            'deskripsi'     => $request->deskripsi,
            'kota'          => $request->kota,
            'provinsi'      => $request->provinsi,
            'alamat'        => $request->alamat,
            'waktu_buka'    => $request->waktu_buka,
            'latitude'      => $request->latitude,
            'longitude'     => $request->longitude,
            'image'         => $request->image
        ]);
        return redirect()->back();
    }

    public function listWisata()
    {
        $title = "Data Wisata";
        $jumlahWisata = Wisata::count();
        $wisata = Wisata::orderBy('id', 'desc')->get();
        return view('section.wisata', compact('wisata', 'title', 'jumlahWisata'));
    }

    public function editWisata(Request $request)
    {
        // return dd($request);

        $wisata = Wisata::findOrFail($request->id);

        if ($request->image == null) {
            $wisata->update([
                'kategori_id'   => $request->kategori_id,
                'nama_wisata'   => $request->nama_wisata,
                'slug'          => Str::slug($request->nama_wisata, '-'),
                'harga'         => $request->harga,
                'deskripsi'     => $request->deskripsi,
                'kota'          => $request->kota,
                'provinsi'      => $request->provinsi,
                'alamat'        => $request->alamat,
                'waktu_buka'    => $request->waktu_buka,
                'latitude'      => $request->latitude,
                'longitude'     => $request->longitude
            ]);
        } else {
            $wisata->update([
                'kategori_id'   => $request->kategori_id,
                'nama_wisata'   => $request->nama_wisata,
                'slug'          => Str::slug($request->nama_wisata, '-'),
                'harga'         => $request->harga,
                'deskripsi'     => $request->deskripsi,
                'kota'          => $request->kota,
                'provinsi'      => $request->provinsi,
                'alamat'        => $request->alamat,
                'waktu_buka'    => $request->waktu_buka,
                'latitude'      => $request->latitude,
                'longitude'     => $request->longitude,
                'image'         => $request->image
            ]);
        }

        return redirect()->back();
    }

    public function deleteWisata($id)
    {
        Wisata::findOrFail($id)->delete();
        return redirect()->back();
    }
}
