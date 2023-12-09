<?php

namespace App\Http\Controllers;


use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori/index',compact('kategori'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'jenis_kategori' => 'required',
        ], [
            'jenis_kategori.required' => 'Kolom jenis kategori harus diisi',
        ]);

        $data = $request->except('_token');
        $data['jenis_kategori'] = $request->input('jenis_kategori'); // Mengambil nilai dari input 'nama_agama'

        Kategori::create($data); // Membuat instansi Agama dengan data yang telah disiapkan

        return redirect()->route('kategori.index');
    }
    public function create(Request $request)
    {
        $kategori = Kategori::all();
        return view('kategori.create',compact('kategori'));
    }

    public function show(string $id)
    {

    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit',compact(['kategori']));

    }

    public function update(Request $request,$id)
    {

        $validated = $request->validate([
            'jenis_kategori' => 'required',
        ], [
            'jenis_kategori.required' => 'Kolom jenis kategori harus diisi',
        ]);

        $kategori = Kategori::find($id);
        $kategori->jenis_kategori = $request->jenis_kategori;
        $kategori -> update($request->except('_token'));
        return redirect('kategori/index');
    }

    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        $bukuAssociatedWithPenulis = Buku::where('id_kategori', $id)->get();
        foreach ($bukuAssociatedWithPenulis as $buku) {
            $buku->id_kategori = null;
            $buku->save();
        }
        $kategori -> delete();
        return redirect('kategori/index');
    }
}
