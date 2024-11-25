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
        Schema::create('product_tendas', function (Blueprint $table) {
            $table->id();
            $table->string("id_product");
            $table->string("name_produdct");
            $table->string("ukuran");
            $table->date("masa_waktu");
            $table->integer("harga");
            $table->string("satuan");
            $table->string("tipe");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_tendas');
    }
};
