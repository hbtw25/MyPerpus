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
        Schema::create('ulasan_bukus', function (Blueprint $table) {
            $table->id("id_ulasan");
            $table->unsignedBigInteger("id_buku");
            $table->unsignedBigInteger("id_user");
            $table->text("body");
            $table->string("photo")->nullable();

            $table->foreign("id_buku")
                ->references("id_buku")
                ->on("bukus")
                ->onDelete("CASCADE");
            $table->foreign("id_user")
                ->references("id_user")
                ->on("users")
                ->onDelete("CASCADE");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan_bukus');
    }
};
