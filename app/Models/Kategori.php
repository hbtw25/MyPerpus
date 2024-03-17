<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Kategori extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "kategoris";
    protected $primaryKey = "id_kategori";
    protected $guarded = ["id_kategori"];

    public function createdBy()
    {
        return $this->belongsTo(User::class, "created_by", "id_user");
    }

    public function books()
    {
        return $this->belongsToMany(Kategori::class, 'kategoribuku_relasis', 'id_kategori', 'id_buku');
    }

    public function scopeFilter($query, $filters)
    {
        // SEARCH: GENRE
        $query->when(
            $filters["search"] ?? false,
            fn ($query, $search) =>
            $query->whereHas(
                "books",
                fn ($query) => $query->where('kategoris.nama', $search)
            )
                ->get()
        );
    }
}
