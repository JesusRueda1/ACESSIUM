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
        Schema::create('tbl_fichas', function (Blueprint $table) {
            $table->id()->increments('tbl_fichas_id');

            $table->Text('tbl_fichas_codigo');
            $table->Text('tbl_fichas_grupo');
            $table->foreignId('tbl_fichas_tbl_programas_id')->nullable()->constrained('tbl_programas')->cascadeOnUpdate();
            $table->foreignId('tbl_fichas_tbl_coordinacions')->nullable()->constrained('tbl_coordinacions')->cascadeOnUpdate();

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
        Schema::dropIfExists('tbl_fichas');
    }
};
