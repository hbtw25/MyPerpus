<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi_pribadi extends Model
{
    use HasFactory;

    protected $table = "koleksi_pribadis";
    protected $primaryKey = "id_koleksi";
    protected $guarded = ["id_koleksi"];

    public function book()
    {
        return $this->belongsTo(Buku::class, "id_buku", "id_buku");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "id_user", "id_user");
    }
}
