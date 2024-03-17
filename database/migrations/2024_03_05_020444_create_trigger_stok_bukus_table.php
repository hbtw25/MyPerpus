<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Decrease
        DB::unprepared('
            CREATE TRIGGER TR_decrease_book_stock_AI
            AFTER INSERT
            ON `peminjamen` FOR EACH ROW
            BEGIN
                UPDATE bukus SET stock = bukus.stock - NEW.jumlah
                    WHERE bukus.id_buku = NEW.id_buku;
            END
        ');

        // Increase
        DB::unprepared('
            CREATE TRIGGER TR_increase_book_stock_AU
            AFTER UPDATE
            ON `peminjamen` FOR EACH ROW
            BEGIN
                UPDATE bukus SET stock = bukus.stock + OLD.jumlah
                WHERE bukus.id_buku = OLD.id_buku;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trigger_stok_bukus');
    }
};
