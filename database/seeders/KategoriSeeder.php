<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::insert([
            [
                "nama" => "Action",
                "deskripsi" => "Action films usually include high energy, big-budget physical stunts and chases, possibly with rescues, battles, fights, escapes, destructive crises, etc.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "nama" => "Adventure",
                "deskripsi" => "Adventure films are usually exciting stories, with new experiences or exotic locales, very similar to or often paired with the action film genre.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "nama" => "Comedy",
                "deskripsi" => "Comedy is a story that tells about a series of funny, or comical events, intended to make the audience laugh. It is a very open genre, and thus crosses over with many other genres on a regular basis.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "nama" => "Drama",
                "deskripsi" => "Drama is a genre of narrative fiction (or semi-fiction) intended to be more serious than humorous in tone, focusing on in-depth development of realistic characters who must deal with realistic emotional struggles.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "nama" => "Horror",
                "deskripsi" => "Horror is a genre of speculative fiction which is intended to frighten, scare, disgust, or startle its readers by inducing feelings of horror and terror. Literary historian J. A.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "nama" => "Mystery",
                "deskripsi" => "Mystery fiction is a genre of fiction usually involving a mysterious death or a crime to be solved. In a closed circle of suspects, each suspect must have a credible motive and a reasonable opportunity for committing the crime.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "nama" => "Romance",
                "deskripsi" => "The romance genre is about love and emotion. It is about relationships, family, and friendship. It is about the way people grow and change. It is about the way life changes people. It is about the way love changes people. It is about the way love changes the world.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "nama" => "Science Fiction",
                "deskripsi" => "Science fiction is a genre of speculative fiction that typically deals with imaginative and futuristic concepts such as advanced science and technology, space exploration, time travel, parallel universes, and extraterrestrial life.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "nama" => "Thriller",
                "deskripsi" => "Thriller is a broad genre of literature, film, and television programming that uses suspense, tension, and excitement as its main elements. Thrillers heavily stimulate the viewer's moods, giving them a high level of anticipation, ultra-heightened expectation, uncertainty, surprise, anxiety, and terror.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
        ]);
    }
}
