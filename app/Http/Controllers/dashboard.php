<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashboard extends Controller
{

    public function index()
    {
        $buku = Buku::with('Penulis','Kategori')->paginate(10);
        return view('dashboard',compact('buku'));

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_buku' => 'required',
            'id_penulis'=> 'required',
            'id_kategori'=> 'required',
            'tahun_terbit'=> 'required',
            'penerbit'=> 'required',
        ]);


        Buku::create($validated);
        return redirect('dashboard');
    }
    public function create(Request $request)
    {
        $Penulis = Penulis::all();
        $Kategori = Kategori::all();

        return view('create',compact('Penulis','Kategori'));
    }

    public function show(string $id)
    {

    }

    public function edit($id)
    {
        $Penulis = Penulis::all();
        $Kategori = Kategori::all();

        $buku = Buku::with('Penulis','Kategori')->find($id);
        return view('edit',compact(['buku','Penulis','Kategori']));

    }

    public function update(Request $request,$id)
    {
        $buku = Buku::find($id);

        $validated = $request->validate([
            'judul_buku' => 'required',
            'id_penulis'=> 'required',
            'id_kategori'=> 'required',
            'tahun_terbit'=> 'required',
            'penerbit'=> 'required',
        ]);

        $buku->id_penulis = $request->input('create');
        $buku->id_kategori = $request->input('create');

        $buku -> update($validated);
        return redirect('dashboard');


    }

    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        $buku -> delete();
        return redirect('dashboard');
    }
}
