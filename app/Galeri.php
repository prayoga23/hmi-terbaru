<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "galeri";
    protected $primaryKey = 'id';
    protected $fillable =
    [
        'kategori_galeri_id',
        'judul',
        'gambar',
    ];
    public function kategori()
    {
        return $this->hasOne('App\KategoriGaleri', 'id', 'kategori_galeri_id');
    }
}
