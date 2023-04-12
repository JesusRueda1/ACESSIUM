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
        Schema::create('tbl_centros', function (Blueprint $table) {
            $table->id()->increments('tble_centros_id');

            $table->integer('tbl_centros_codigo');
            $table->Text('tbl_centros_nombre');
            $table->Text('tbl_centros_subdirector')->nullable();
            $table->foreignId('tbl_centros_tbl_regionals_id')->nullable()->constrained('tbl_regionals')->cascadeOnUpdate();

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
        Schema::dropIfExists('tbl_centros');
    }
};
