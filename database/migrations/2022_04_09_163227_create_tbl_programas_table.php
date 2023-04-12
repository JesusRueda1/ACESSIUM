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
        Schema::create('tbl_programas', function (Blueprint $table) {
            $table->id()->increments('tbl_programas_id');

            $table->Text('tbl_programas_codigo');
            $table->Text('tbl_programas_nombre');
            $table->Text('tbl_programas_version')->nullable();

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
        Schema::dropIfExists('tbl_programas');
    }
};
