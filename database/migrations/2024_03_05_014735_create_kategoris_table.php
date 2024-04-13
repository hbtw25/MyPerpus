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
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id("id_kategori");
            $table->string("nama", 50);
            $table->text("deskripsi");
            $table->string("slug")->unique();
            $table->enum("flag_active", ["Y", "N"])->default("Y");
            $table->string("created_by")->nullable();
            $table->string("updated_by")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoris');
    }
};
