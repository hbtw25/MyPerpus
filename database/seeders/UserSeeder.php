<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                "id_user" => 1,
                "nama_lengkap" => "hbtw",
                "username" => "hbtw",
                "alamat" => "garut",
                "email" => "hbtw@gmail.com",
                "password" => Hash::make("password"),
                "flag_active" => "Y",
                "role" => "admin",
                "profile_picture" => null,
                "created_at" => now(),
                "created_by" => "root",
            ],
            [
                "id_user" => 2,
                "nama_lengkap" => "adira",
                "username" => "adira",
                "alamat" => "Jakarta",
                "email" => "adira@gmail.com",
                "password" => Hash::make("password"),
                "flag_active" => "Y",
                "role" => "petugas",
                "profile_picture" => null,
                "created_at" => now(),
                "created_by" => "root",
            ],
            [
                "id_user" => 3,
                "nama_lengkap" => "ucupestes",
                "username" => "dxx",
                "alamat" => "Jakarta",
                "email" => "ucup@gmail.com",
                "password" => Hash::make("password"),
                "flag_active" => "Y",
                "role" => "peminjam",
                "profile_picture" => null,
                "created_at" => now(),
                "created_by" => 1,
            ],
            [
                "id_user" => 4,
                "nama_lengkap" => "Budi Santoso",
                "username" => "budisantoso",
                "alamat" => "Surabaya",
                "email" => "budi.santoso@gmail.com",
                "password" => Hash::make("password"),
                "flag_active" => "Y",
                "role" => "peminjam",
                "profile_picture" => null,
                "created_at" => now(),
                "created_by" => 1,
            ],
            [
                "id_user" => 5,
                "nama_lengkap" => "Rina Fitriani",
                "username" => "rinafitriani",
                "alamat" => "Bandung",
                "email" => "rina.fitriani@gmail.com",
                "password" => Hash::make("password"),
                "flag_active" => "N",
                "role" => "peminjam",
                "profile_picture" => null,
                "created_at" => now(),
                "created_by" => 1,
            ],
            [
                "id_user" => 6,
                "nama_lengkap" => "Dewi Lestari",
                "username" => "dewilestari",
                "alamat" => "Yogyakarta",
                "email" => "dewi.lestari@gmail.com",
                "password" => Hash::make("password"),
                "flag_active" => "Y",
                "role" => "peminjam",
                "profile_picture" => null,
                "created_at" => now(),
                "created_by" => 1,
            ],
        ]);
    }
}
