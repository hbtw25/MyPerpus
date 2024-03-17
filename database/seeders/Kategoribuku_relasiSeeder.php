<?php

namespace Database\Seeders;

use App\Models\Kategoribuku_relasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Kategoribuku_relasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategoribuku_relasi::insert([
            // Dompet Ayah Sepatu Ibu
            ["id_buku" => 1, "id_kategori" => 1],
            ["id_buku" => 1, "id_kategori" => 2],
            ["id_buku" => 1, "id_kategori" => 3],
            ["id_buku" => 1, "id_kategori" => 4],
            // Laut Bercerita
            ["id_buku" => 2, "id_kategori" => 8],
            ["id_buku" => 2, "id_kategori" => 5],
            ["id_buku" => 2, "id_kategori" => 6],
            ["id_buku" => 2, "id_kategori" => 7],
            // I Saw the Same Dream Again
            ["id_buku" => 3, "id_kategori" => 3],
            ["id_buku" => 3, "id_kategori" => 4],
            ["id_buku" => 3, "id_kategori" => 6],
            ["id_buku" => 3, "id_kategori" => 7],
            // The Midnight Library
            ["id_buku" => 4, "id_kategori" => 3],
            ["id_buku" => 4, "id_kategori" => 2],
            ["id_buku" => 4, "id_kategori" => 8],
            ["id_buku" => 4, "id_kategori" => 4],
        ]);
    }
}
