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
        Schema::create('tbl_coordinacions', function (Blueprint $table) {
            $table->id()->increments('tbl_coordinacions_id');

            $table->integer('tbl_coordinacions_codigo');
            $table->Text('tbl_coordinacions_nombre');
            $table->Text('tbl_coordinacions_coordinador')->nullable();
            $table->foreignId('tbl_coordinacions_tbl_centros_id')->nullable()->constrained('tbl_centros')->cascadeOnUpdate();

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
        Schema::dropIfExists('tbl_coordinacions');
    }
};
