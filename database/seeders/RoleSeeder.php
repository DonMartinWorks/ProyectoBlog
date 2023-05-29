<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]); // Permiso de ver dashboard

        // Categorias
        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$role1, $role2]);       // Permiso de ver categorias
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$role1, $role2]);      // Permiso de crear categorias
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$role1, $role2]);        // Permiso de editar categorias
        Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([$role1, $role2]);     // Permiso de eliminar categorias

        // Tags
        Permission::create(['name' => 'admin.tags.index'])->syncRoles([$role1, $role2]);       // Permiso de ver tags
        Permission::create(['name' => 'admin.tags.create'])->syncRoles([$role1, $role2]);      // Permiso de crear tags
        Permission::create(['name' => 'admin.tags.edit'])->syncRoles([$role1, $role2]);        // Permiso de editar tags
        Permission::create(['name' => 'admin.tags.destroy'])->syncRoles([$role1, $role2]);     // Permiso de eliminar tags

        // Posts
        Permission::create(['name' => 'admin.posts.index'])->syncRoles([$role1, $role2]);       // Permiso de ver posts
        Permission::create(['name' => 'admin.posts.create'])->syncRoles([$role1, $role2]);      // Permiso de crear posts
        Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$role1, $role2]);        // Permiso de editar posts
        Permission::create(['name' => 'admin.posts.destroy'])->syncRoles([$role1, $role2]);     // Permiso de eliminar posts
    }
}
