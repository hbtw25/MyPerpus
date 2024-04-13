<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; // Import Str class for slug

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::insert([
            [
                "judul" => "Dompet Ayah Sepatu Ibu",
                "slug" => Str::slug("Dompet Ayah Sepatu Ibu"), // Generate slug
                "penulis" => "J. S. Khairen",
                "penerbit" => "Gramedia Widia Sarana Indonesia",
                "tahun_terbit" => "2023",
                "synopsis" => "The world is evil and you lost? Look at the palm of your hand. Father always forged that hand to not give up. Mom never stops holding that hand to pray. Rise up to take a step. This is the story of a father and mother, whose love was born even before you were born, whose love grew even before you grew. This is a story of fathers and mothers, whose tears can light a fire, whose tears can put out a fire. The hottest fire is lit when mom and dad cry in disappointment. The hottest fire is extinguished by mom and dad's tears of struggle. So, always remember home.",
                "stock" => 19,
                "cover" => "images/Dompet Ayah Sepatu Ibu.png",
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "judul" => "Laut Bercerita",
                "slug" => Str::slug("Laut Bercerita"), // Generate slug
                "penulis" => "Leila S. Chudori",
                "penerbit" => "Penerbit KPG",
                "tahun_terbit" => "2017",
                "synopsis" => "At dusk, in a flat in Jakarta, a student named Biru Laut was ambushed by four unknown men. Together with his friends, Daniel Tumbuan, Sunu Dyantoro, Alex Perazon, he was taken to an unknown place. For months they were held captive, interrogated, beaten, kicked, hung and electrocuted to answer one important question: who was behind the activist and student movements at the time.",
                "stock" => 15,
                "cover" => "images/Laut Bercerita.png",
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "judul" => "Talking to Strangers",
                "slug" => Str::slug("Talking to Strangers"), // Generate slug
                "penulis" => "Malcolm Gladwell",
                "penerbit" => "Penguin Books",
                "tahun_terbit" => "2019",
                "synopsis" => "How did Fidel Castro fool the CIA for a generation? Why did Neville Chamberlain think he could trust Adolf Hitler? Why are campus sexual assaults on the rise? Do television sitcoms teach us something about the way we relate to each other that isn't true? While tackling these questions, Malcolm Gladwell was not solely writing a book for the page. He was also producing for the ear. In the audiobook version of Talking to Strangers, you'll hear the voices of people he interviewed--scientists, criminologists, military psychologists. Court transcripts are brought to life with re-enactments. You actually hear the contentious arrest of Sandra Bland by the side of the road in Texas. As Gladwell revisits the deceptions of Bernie Madoff, the trial of Amanda Knox, and the suicide of Sylvia Plath, you hear directly from many of the players in these real-life tragedies. There's even a theme song - Janelle Monae's 'Hell You Talmbout.' Something is very wrong, Gladwell argues, with the tools and strategies we use to make sense of people we don't know. And because we don't know how to talk to strangers, we are inviting conflict and misunderstanding in ways that have a profound effect on our lives and our world.",
                "stock" => 24,
                "cover" => "images/Talking to Strangers.png",
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "judul" => "The Visual MBA",
                "slug" => Str::slug("The Visual MBA"), // Generate slug
                "penulis" => "Jason Barron",
                "penerbit" => "Penguin Books",
                "tahun_terbit" => "2019",
                "synopsis" => "Jason Barron spent 516 hours in class, completed mountains of homework and shelled out tens of thousands of dollars to complete his MBA at the BYU Marriott School of Business. Along the way, rather than taking boring notes that he would never read (nor use) again, Jason created sketch notes for each class—visually capturing the essential points of his education—and providing an engaging and invaluable resource.   Once finished with his MBA, Jason launched a widely successful Kickstarter campaign distilling these same notes into a self-published book to help aspiring business leaders of all backgrounds and income levels understand the critical concepts one learns in business school.   Whether you are thinking about applying to business school, are currently in college studying business, or have always wondered what is taught in an MBA program, this highly entertaining and visual book is for you.",
                "stock" => 34,
                "cover" => "images/The Visual MBA.png",
                "created_by" => 1,
                "created_at" => now(),
            ],
        ]);
    }
}
