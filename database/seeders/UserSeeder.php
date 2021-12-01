<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'apellido' => 'admin',
            'direccion' => 'Kennedy',
            'celular' => '75789457',
            'password' => bcrypt('123456789')
        ])->assignRole('Administrador');

        // // Gerente
        User::create([
            'name' => 'Gerente',
            'email' => 'gerente@gmail.com',
            'apellido' => 'Rol Gerente',
            'direccion' => 'Kennedy',
            'celular' => '12985287',
            'password' => bcrypt('123456789')
        ])->assignRole('Gerente');

        // // Cliente
        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@gmail.com',
            'apellido' => 'Rol Cliente',
            'direccion' => 'Kennedy',
            'celular' => '75468237485',
            'password' => bcrypt('123456789')
        ])->assignRole('Cliente');

        // // Proveedor
        User::create([
            'name' => 'Proveedor',
            'email' => 'proveedor@gmail.com',
            'apellido' => 'Rol Proveedor',
            'direccion' => 'Kennedy',
            'celular' => '75487485',
            'password' => bcrypt('123456789')
        ])->assignRole('Proveedor');

        // //Ingeniero
        User::create([
            'name' => 'Ingeniero',
            'email' => 'ingeniero@gmail.com',
            'apellido' => 'Rol Ingeniero',
            'direccion' => 'Kennedy',
            'celular' => '754866665',
            'password' => bcrypt('123456789')
         ])->assignRole('Ingeniero');

         User::factory(5)->create();
    }
}
