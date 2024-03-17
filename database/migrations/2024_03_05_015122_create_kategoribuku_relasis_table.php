<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategoribuku_relasis', function (Blueprint $table) {
            $table->id("id_kategori_buku");
            $table->unsignedBigInteger("id_buku");
            $table->unsignedBigInteger("id_kategori");

            $table->foreign("id_buku")
                ->references("id_buku")
                ->on("bukus")
                ->onDelete("CASCADE");
            $table->foreign("id_kategori")
                ->references("id_kategori")
                ->on("kategoris")
                ->onDelete("CASCADE");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoribuku_relasis');
    }
};
