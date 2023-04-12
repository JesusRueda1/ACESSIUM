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
        Schema::create('tbl_perfils', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tbl_perfil_tbl_tipo_identificacions_id')->nullable()->constrained('tbl_tipo_identificacions')->cascadeOnUpdate();
            $table->Text('tbl_perfil_idenficacion');
            $table->Text('tbl_perfil_nombres');
            $table->Text('tbl_perfil_apellidos');
            $table->Text('tbl_perfil_celular')->nullable();
            $table->Text('tbl_perfil_ciudad_residencia')->nullable();
            $table->Text('tbl_perfil_direccion')->nullable();
            $table->Text('tbl_perfil_vacuna')->nullable();
            $table->Text('tbl_perfil_RH')->nullable();
            $table->Text('tbl_perfil_estado_civil')->nullable();
            $table->Text('tbl_perfil_sexo')->nullable();
            $table->Text('tbl_perfil_estado')->nullable();
            $table->Text('tbl_perfil_pase')->default("fuera");
            $table->foreignId('tbl_perfil_tbl_fichas_id')->nullable()->constrained('tbl_fichas')->cascadeOnUpdate();
            $table->foreignId('tbl_perfil_tbl_tipo_personals_id')->nullable()->constrained('tbl_tipo_personals')->cascadeOnUpdate();
            $table->foreignId('tbl_perfil_tbl_centros_id')->nullable()->constrained('tbl_centros')->cascadeOnUpdate();

            $table->foreignId('tbl_perfil_user_id')->nullable()->constrained('users')->unique()->cascadeOnUpdate()->onDelete('set null');

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
        Schema::dropIfExists('tbl_perfils');
    }
};
