<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Gerente']);
        $role3 = Role::create(['name' => 'Cliente']);
        $role4 = Role::create(['name' => 'Proveedor']);
        $role5 = Role::create(['name' => 'Ingeniero']);


        Permission::create(['name' => 'home','description' => 'Ver el dasboard'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);

        Permission::create(['name' => 'usuarios.index','description' => 'Ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuario.create','description' => 'Vrear usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuarios.edit','description' => 'Editar usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuarios.destroy','description' => 'Eliminar usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'marcas.index','description' => 'Ver listado de marcas'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'marcas.create','description' => 'Crear de marcas'])->syncRoles([$role1, $role4 ]);
        Permission::create(['name' => 'marcas.edit','description' => 'Editar marcas'])->syncRoles([$role1, $role4 ]);
        Permission::create(['name' => 'marcas.destroy','description' => 'Eliminar marcas'])->syncRoles([$role1, $role4 ]);

        Permission::create(['name' => 'tipoMateriales.index','description' => 'Ver listado de tipo materiales'])->syncRoles([$role1, $role2, $role4 ]);
        Permission::create(['name' => 'tipoMateriales.create','description' => 'Crear tipo materiales'])->syncRoles([$role1, $role4 ]);
        Permission::create(['name' => 'tipoMateriales.edit','description' => 'Editar tipo materiales'])->syncRoles([$role1, $role4 ]);
        Permission::create(['name' => 'tipoMateriales.destroy','description' => 'Eliminar tipo materiales'])->syncRoles([$role1, $role4 ]);

        Permission::create(['name' => 'materiales.index','description' => 'Ver listado de materiales'])->syncRoles([$role1, $role2, $role4 ]);
        Permission::create(['name' => 'materiales.create','description' => 'Crear materiales'])->syncRoles([$role1, $role4 ]);
        Permission::create(['name' => 'materiales.edit','description' => 'Editar materiales'])->syncRoles([$role1, $role4 ]);
        Permission::create(['name' => 'materiales.destroy','description' => 'Eliminar materiales'])->syncRoles([$role1, $role4 ]);

        Permission::create(['name' => 'entradas.index','description' => 'Ver listado de entradas'])->syncRoles([$role1, $role2, $role4 ]);
        Permission::create(['name' => 'entradas.create','description' => 'Crear entradas'])->syncRoles([$role1, $role2, $role4 ]);
        Permission::create(['name' => 'entradas.edit','description' => 'Editar entradas'])->syncRoles([$role1, $role2, $role4 ]);
        Permission::create(['name' => 'entradas.destroy','description' => 'Eliminar entradas'])->syncRoles([$role1, $role2, $role4 ]);

        Permission::create(['name' => 'obras.index','description' => 'Ver listado de obras'])->syncRoles([$role1, $role2, $role3, $role5]);
        Permission::create(['name' => 'obras.create','description' => 'Crear obras'])->syncRoles([$role1, $role5]);
        Permission::create(['name' => 'obras.edit','description' => 'Editar obras'])->syncRoles([$role1, $role5]);
        Permission::create(['name' => 'obras.destroy','description' => 'Eliminar obras'])->syncRoles([$role1, $role5]);

        Permission::create(['name' => 'entradaMateriales.index','description' => 'Ver listado de entrada materiales'])->syncRoles([$role1, $role2,  $role4, $role5]);
        Permission::create(['name' => 'entradaMateriales.create','description' => 'Crear entrada materiales'])->syncRoles([$role1,  $role4, $role5]);
        Permission::create(['name' => 'entradaMateriales.edit','description' => 'Editar entrada materiales'])->syncRoles([$role1,  $role4, $role5]);
        Permission::create(['name' => 'entradaMateriales.destroy','description' => 'Eliminar entrada materiales'])->syncRoles([$role1,  $role4, $role5]);

        Permission::create(['name' => 'proveedores.index','description' => 'Ver listado de proveedores'])->syncRoles([$role1, $role2, $role4 ]);
        Permission::create(['name' => 'proveedores.create','description' => 'Crear proveedores'])->syncRoles([$role1 ]);
        Permission::create(['name' => 'proveedores.edit','description' => 'Editar proveedores'])->syncRoles([$role1, $role2, $role4 ]);
        Permission::create(['name' => 'proveedores.destroy','description' => 'Eliminar proveedores'])->syncRoles([$role1 ]);

        Permission::create(['name' => 'categorias.index','description' => 'Ver listado decategorias'])->syncRoles([$role1, $role2, $role5]);
        Permission::create(['name' => 'categorias.create','description' => 'Crear categorias'])->syncRoles([$role1, $role5]);
        Permission::create(['name' => 'categorias.edit','description' => 'Editar categorias'])->syncRoles([$role1, $role5]);
        Permission::create(['name' => 'categorias.destroy','description' => 'Eliminar categorias'])->syncRoles([$role1, $role5]);

        Permission::create(['name' => 'clientes.index','description' => 'Ver listado de clientes'])->syncRoles([$role1, $role3, $role2, $role5]);
        Permission::create(['name' => 'clientes.create','description' => 'Crear clientes'])->syncRoles([$role1, $role3, $role2 ]);
        Permission::create(['name' => 'clientes.edit','description' => 'Editar clientes'])->syncRoles([$role1, $role3, $role2 ]);
        Permission::create(['name' => 'clientes.destroy','description' => 'Eliminar clientes'])->syncRoles([$role1, $role2 ]);

        Permission::create(['name' => 'salidas.index','description' => 'Ver listado de salidas'])->syncRoles([$role1, $role2 ]);
        Permission::create(['name' => 'salidas.create','description' => 'Crear salidas'])->syncRoles([$role1 ]);
        Permission::create(['name' => 'salidas.edit','description' => 'Editar salidas'])->syncRoles([$role1 ]);
        Permission::create(['name' => 'salidas.destroy','description' => 'Eliminar salidas'])->syncRoles([$role1 ]);

        Permission::create(['name' => 'salidasMateriales.index','description' => 'Ver listado de salida materiales'])->syncRoles([$role1, $role2 ]);
        Permission::create(['name' => 'salidasMateriales.create','description' => 'Crear salida materiales'])->syncRoles([$role1 ]);
        Permission::create(['name' => 'salidasMateriales.edit','description' => 'Editar salida materiales'])->syncRoles([$role1 ]);
        Permission::create(['name' => 'salidasMateriales.destroy','description' => 'Eliminar salida materiales'])->syncRoles([$role1 ]);

        Permission::create(['name' => 'roles.index','description' => 'Ver listado de roles'])->syncRoles([$role1, $role2 ]);
        Permission::create(['name' => 'roles.create','description' => 'Crear roles'])->syncRoles([$role1 ]);
        Permission::create(['name' => 'roles.edit','description' => 'Editar roles'])->syncRoles([$role1 ]);
        Permission::create(['name' => 'roles.destroy','description' => 'Eliminar roles'])->syncRoles([$role1 ]);

        Permission::create(['name' => 'permissions.index','description' => 'Ver listado de permisos'])->syncRoles([$role1, $role2 ]);
        Permission::create(['name' => 'permissions.create','description' => 'Crear permisos'])->syncRoles([$role1 ]);
        Permission::create(['name' => 'permissions.edit','description' => 'Editar permisos'])->syncRoles([$role1 ]);
        Permission::create(['name' => 'permissions.destroy','description' => 'Eliminar permisos'])->syncRoles([$role1 ]);

        Permission::create(['name' => 'pedidos.index','description' => 'Ver listado de pedidos'])->syncRoles([$role1, $role2, $role5]);
        Permission::create(['name' => 'pedidos.create','description' => 'Crear pedidos'])->syncRoles([$role1, $role5]);
        Permission::create(['name' => 'pedidos.edit','description' => 'Editar pedidos'])->syncRoles([$role1, $role5]);
        Permission::create(['name' => 'pedidos.destroy','description' => 'Eliminar pedidos'])->syncRoles([$role1, $role5 ]);



    }
}
