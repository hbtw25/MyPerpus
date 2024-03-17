<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoribuku_relasi extends Model
{
    use HasFactory;

    protected $table = "kategoribuku_relasis";
    protected $primaryKey = "id_kategori_buku";
    protected $guarded = ["id_kategori_buku"];

    public function genre()
    {
        return $this->belongsTo(Kategori::class, "id_kategori", "id_kategori");
    }

    public function book()
    {
        return $this->belongsTo(Buku::class, "id_buku", "id_buku");
    }
}
