<?php

namespace App\Models;

use App\Models\Penulis;
use App\Models\Kategori;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';

    protected $fillable = ['judul_buku','id_penulis','id_kategori','tahun_terbit','penerbit'];

    public function Penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis');
    }
    public function Kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
