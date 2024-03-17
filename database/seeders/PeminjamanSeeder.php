<?php

namespace Database\Seeders;

use App\Models\Peminjaman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peminjaman::insert([
            [
                "id_buku" => 1,
                "id_user" => 4,
                "jumlah" => 2,
                "tanggal_peminjaman" => now()->format('Y-m-d'),
                "tanggal_pengembalian" => now()->subDays(-7)->format('Y-m-d'),
                "status" => "dikembalikan",
                "tanggal_dikembalikan" => now()->subDays(-2)->format('Y-m-d'),
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "id_buku" => 2,
                "id_user" => 5,
                "jumlah" => 1,
                "tanggal_peminjaman" => now()->subDays(29)->format('Y-m-d'),
                "tanggal_pengembalian" => now()->subDays(22)->format('Y-m-d'),
                "status" => "dipinjam",
                "tanggal_dikembalikan" => null,
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "id_buku" => 3,
                "id_user" => 4,
                "jumlah" => 4,
                "tanggal_peminjaman" => now()->subDays(8)->format('Y-m-d'),
                "tanggal_pengembalian" => now()->subDays(1)->format('Y-m-d'),
                "status" => "terlambat",
                "tanggal_dikembalikan" => null,
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "id_user" => 4,
                "id_buku" => 2,
                "jumlah" => 2,
                "tanggal_peminjaman" => now()->subDays(8)->format('Y-m-d'),
                "tanggal_pengembalian" => now()->subDays(1)->format('Y-m-d'),
                "status" => "dikembalikan",
                "tanggal_dikembalikan" => now()->subDays(3)->format('Y-m-d'),
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "id_user" => 4,
                "id_buku" => 2,
                "jumlah" => 5,
                "tanggal_peminjaman" => now()->subDays(8)->format('Y-m-d'),
                "tanggal_pengembalian" => now()->subDays(1)->format('Y-m-d'),
                "status" => "dikembalikan",
                "tanggal_dikembalikan" => now()->subDays(3)->format('Y-m-d'),
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "id_user" => 4,
                "id_buku" => 2,
                "jumlah" => 1,
                "tanggal_peminjaman" => now()->subDays(8)->format('Y-m-d'),
                "tanggal_pengembalian" => now()->subDays(1)->format('Y-m-d'),
                "status" => "dikembalikan",
                "tanggal_dikembalikan" => now()->subDays(3)->format('Y-m-d'),
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "id_buku" => 2,
                "id_user" => 6,
                "jumlah" => 1,
                "tanggal_peminjaman" => now()->subDays(29)->format('Y-m-d'),
                "tanggal_pengembalian" => now()->subDays(22)->format('Y-m-d'),
                "status" => "dipinjam",
                "tanggal_dikembalikan" => null,
                "created_by" => 1,
                "created_at" => now(),
            ],
        ]);
    }
}
