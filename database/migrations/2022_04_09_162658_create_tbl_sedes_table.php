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
        Schema::create('tbl_sedes', function (Blueprint $table) {
            $table->id()->increments('tbl_sedes_id');

            $table->integer('tbl_sedes_codigo');
            $table->Text('tbl_sedes_nombre');
            $table->Text('tbl_sedes_ciudad');
            $table->Text('tbl_sedes_direccion');
            $table->foreignId('tbl_sedes_tbl_coordinacions_id')->nullable()->constrained('tbl_coordinacions')->cascadeOnUpdate();

            $table->timestamp('created_at')->useCurrent();

            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sedes');
    }
};
