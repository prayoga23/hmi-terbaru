<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Publikasi extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = "publikasi";
    protected $primaryKey = 'id';
    protected $fillable =
    [
        'kategori_publikasi_id',
        'judul',
        'tanggal_rilis',
        'deskripsi',
        'gambar',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
    public function kategori()
    {
        return $this->hasOne('App\KategoriPublikasi', 'id', 'kategori_publikasi_id');
    }
}
