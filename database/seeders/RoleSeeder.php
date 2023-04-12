<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Crear Permisos (php artisan db:seed --class=RoleSeeder) */

        $permisos = [

            //Operaciones sobre Dashboard y titulos
            'ver-dash',
            'ver-config',
            'ver-movimientos',
            'ver-perfiles',

            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operaciones sobre usuarios
            'ver-users',
            'crear-users',
            'editar-users',
            'borrar-users',

            //Operaciones sobre Regionales
            'ver-regionales',
            'crear-regionales',
            'editar-regionales',
            'borrar-regionales',

            //Operaciones sobre Centros
            'ver-centros',
            'crear-centros',
            'editar-centros',
            'borrar-centros',

            //Operaciones sobre Coordinaciones
            'ver-coordinaciones',
            'crear-coordinaciones',
            'editar-coordinaciones',
            'borrar-coordinaciones',

            //Operacoones sobre sedes
            'ver-sedes',
            'crear-sedes',
            'editar-sedes',
            'borrar-sedes',

            //Operaciones sobre Tipo de Personal
            'ver-tipop',
            'crear-tipop',
            'editar-tipop',
            'borrar-tipop',

            //Operaciones sobre Tipo Identificacion
            'ver-tipoi',
            'crear-tipoi',
            'editar-tipoi',
            'borrar-tipoi',

            //Operaciones sobre Programa
            'ver-programa',
            'crear-programa',
            'editar-programa',
            'borrar-programa',

            //Operaciones sobre fichas
            'ver-fichas',
            'crear-fichas',
            'editar-fichas',
            'borrar-fichas',

        ];


        $roles = [

            'Administrador',
            'Director',
            'SubDirector',
            'Cordinador',
            'Portero',
            'Personal',
            'Aprendiz'

        ];


        foreach($roles as $permiso) {
            Role::create(['name'=>$permiso]);
        }

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }


    }
}
