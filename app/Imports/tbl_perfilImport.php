<?php

namespace App\Imports;

use App\Models\tbl_perfil;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class tbl_perfilImport implements
ToCollection,
WithHeadingRow,
SkipsOnError,
WithValidation,
SkipsOnFailure,
WithChunkReading,
ShouldQueue,
WithEvents
{
    use Importable, SkipsErrors, SkipsFailures, RegistersEventListeners;

    public function collection(Collection $rows )
    {
        foreach ($rows as $row) {
            $user = User::create([
                'id' => $row['id'],
                'name'     => $row['nombres'],
                'email'    => $row['email'],
                'password' => Hash::make($row['identificacion']),
            ]);

            $perfil = tbl_perfil::create([
                'id' => $row['id'],
                'tbl_perfil_tbl_tipo_identificacions_id' => $row['tipo_identificacion'],
                'tbl_perfil_idenficacion' => $row['identificacion'],
                'tbl_perfil_nombres' => $row['nombres'],
                'tbl_perfil_apellidos' => $row['apellidos'],
                'tbl_perfil_celular' => $row['celular'],
                'tbl_perfil_ciudad_Residencia' => $row['ciudad_residencia'],
                'tbl_perfil_direccion' => $row['direccion'],
                'tbl_perfil_vacuna' => $row['vacuna'],
                'tbl_perfil_RH' => $row['rh'],
                'tbl_perfil_estado_civil' => $row['estado_civil'],
                'tbl_perfil_sexo' => $row['sexo'],
                'tbl_perfil_estado' => 'Activo',
                'tbl_perfil_tbl_coordinacion_id' => $row['coordinacion'],
                'tbl_perfil_tbl_fichas_id' => $row['ficha'],
                'tbl_perfil_tbl_tipo_personals_id' => $row['tipo_personal'],
                'tbl_perfil_tbl_centros_id' => $row['centro'],
                'tbl_perfil_user_id' => $row['id']
                 ]);

        }
    }

    public function rules(): array
    {
        return [
            '*.email' => ['email', 'unique:users'],
            '*.tbl_perfil_idenficacion' => ['unique:tbl_perfils']
        ];
    }


    public function chunkSize(): int
    {
        return 1000;
    }

    public static function afterImport(AfterImport $event)
    {
    }

    public function onFailure(Failure ...$failure)
    {
    }
}
