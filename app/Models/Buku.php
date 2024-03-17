<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = "bukus";
    protected $primaryKey = "id_buku";
    protected $guarded = ["id_buku"];

    public function createdBy()
    {
        return $this->belongsTo(User::class, "created_by", "id_user");
    }

    public function genres()
    {
        return $this->belongsToMany(Kategori::class, 'kategoribuku_relasis', 'id_buku', 'id_kategori');
    }

    public function receipts()
    {
        return $this->hasMany(Peminjaman::class, "id_buku", "id_buku");
    }

    public function wishlists()
    {
        return $this->hasMany(Koleksi_pribadi::class, 'id_buku', 'id_buku');
    }

    public function reviews()
    {
        return $this->hasMany(Ulasan_buku::class, 'id_buku', 'id_buku');
    }

    public function scopeFilter($query, array $filters)
    {
        // SEARCH: BOOK
        $query->when(
            $filters["search"] ?? false,
            fn ($query, $search) =>
            $query->where(
                fn ($query) => $query
                    ->where("judul", "like", "%" . $search . "%")
                    ->orWhere("penulis", "like", "%" . $search . "%")
            )
        );

        // SEARCH: GENRE
        $query->when(
            $filters["genre"] ?? false,
            fn ($query, $genre) =>
            $query->whereHas(
                "genres",
                fn ($query) => $query->where('kategoribuku_relasis.id_kategori', $genre)
            )
                ->get()
        );
    }
}
