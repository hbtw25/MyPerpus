<?php

namespace Database\Seeders;

use App\Models\Koleksi_pribadi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Koleksi_pribadiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Koleksi_pribadi::insert([
            // Book 1
            ["id_buku" => 1, "id_user" => 1, "created_at" => now()],
            ["id_buku" => 1, "id_user" => 2, "created_at" => now()],
            ["id_buku" => 1, "id_user" => 3, "created_at" => now()],
            // Book 2
            ["id_buku" => 2, "id_user" => 2, "created_at" => now()],
            ["id_buku" => 2, "id_user" => 3, "created_at" => now()],
            // Book 3
            ["id_buku" => 3, "id_user" => 1, "created_at" => now()],
            ["id_buku" => 3, "id_user" => 3, "created_at" => now()],
            // Book 4
            ["id_buku" => 4, "id_user" => 1, "created_at" => now()],
            ["id_buku" => 4, "id_user" => 2, "created_at" => now()],
        ]);
}
}
