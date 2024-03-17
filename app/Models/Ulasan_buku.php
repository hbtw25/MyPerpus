<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan_buku extends Model
{
    use HasFactory;

    protected $table = "Ulasan_bukus";
    protected $primaryKey = "id_ulasan";
    protected $guarded = ["id_ulasan"];

    public function createdBy()
    {
        return $this->belongsTo(User::class, "created_by", "id_user");
    }

    public function book()
    {
        return $this->belongsTo(Buku::class, "id_buku", "id_buku");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "id_user", "id_user");
    }
}
