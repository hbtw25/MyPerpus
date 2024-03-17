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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id("id_peminjaman");
            $table->unsignedBigInteger("id_buku");
            $table->unsignedBigInteger("id_user");
            $table->integer("jumlah");
            $table->date("tanggal_peminjaman");
            $table->date("tanggal_pengembalian");
            $table->enum("status", ["dipinjam", "dikembalikan", "terlambat"])->default("dipinjam");
            $table->date("tanggal_dikembalikan")->nullable();

            $table->foreign("id_buku")
                ->references("id_buku")
                ->on("bukus")
                ->onDelete("CASCADE");
            $table->foreign("id_user")
                ->references("id_user")
                ->on("users")
                ->onDelete("CASCADE");

            $table->string("created_by")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
