<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_imagens', function (Blueprint $table) {
            $table->id();

            $table->Text('path');
            $table->foreignId('tbl_imagen_tbl_perfil_id')->nullable()->constrained('tbl_perfils')->unique()->cascadeOnUpdate()->cascadeonDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_imagens');
    }
};
