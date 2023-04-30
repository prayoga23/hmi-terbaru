<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = "berita";
    protected $primaryKey = 'id';
    protected $fillable =
    [
        'kategori_berita_id',
        'judul',
        'tanggal_rilis',
        'deskripsi',
        'gambar',
    ];
    public function kategori()
    {
        return $this->hasOne('App\KategoriBerita', 'id', 'kategori_berita_id');
    }
}
