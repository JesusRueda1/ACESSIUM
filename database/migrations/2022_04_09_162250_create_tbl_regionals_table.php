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
        Schema::create('tbl_regionals', function (Blueprint $table) {
            $table->id()->increments('tble_regionals_id');

            $table->integer('tbl_regionals_codigo');
            $table->Text('tbl_regionals_nombre');
            $table->Text('tbl_regionals_director');

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
        Schema::dropIfExists('tbl_regionals');
    }
};
