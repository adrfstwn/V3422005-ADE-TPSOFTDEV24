<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenulisController extends Controller
{

    public function index()
    {
        $penulis = Penulis::all();
        return view('penulis/index',compact('penulis'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama_penulis' => 'required',
        ], [
            'nama_penulis.required' => 'Kolom nama penulis harus diisi',
        ]);

        $data = $request->except('_token');
        $data['nama_penulis'] = $request->input('nama_penulis'); // Mengambil nilai dari input 'nama_agama'

        Penulis::create($data); // Membuat instansi Agama dengan data yang telah disiapkan

        return redirect()->route('penulis.index');
    }
    public function create(Request $request)
    {
        $penulis = Penulis::all();
        return view('penulis.create',compact('penulis'));
    }

    public function show(string $id)
    {

    }

    public function edit($id)
    {
        $penulis = Penulis::find($id);
        return view('penulis.edit',compact(['penulis']));

    }

    public function update(Request $request,$id)
    {

        $validated = $request->validate([
            'nama_penulis' => 'required',
        ], [
            'nama_penulis.required' => 'Kolom nama penulis harus diisi',
        ]);

        $penulis = Penulis::find($id);
        $penulis->nama_penulis = $request->nama_penulis;
        $penulis -> update($request->except('_token'));
        return redirect('penulis/index');
    }

    public function destroy(string $id)
    {
        $penulis = Penulis::find($id);
        $bukuAssociatedWithPenulis = Buku::where('id_penulis', $id)->get();
        foreach ($bukuAssociatedWithPenulis as $buku) {
            $buku->id_penulis = null;
            $buku->save();
        }
        $penulis -> delete();
        return redirect('penulis/index');
    }
}
