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

        Permission::create([
            'name' => 'admin.home',
            'description' => __('See Dashboard')
        ])->syncRoles([$role1, $role2]); // Permiso de ver dashboard

        // Categorias
        Permission::create([
            'name' => 'admin.categories.index',
            'description' => __('See categories list')
        ])->syncRoles([$role1, $role2]);       // Permiso de ver categorias
        Permission::create([
            'name' => 'admin.categories.create',
            'description' => __('Create a category')
        ])->syncRoles([$role1]);              // Permiso de crear categorias
        Permission::create([
            'name' => 'admin.categories.edit',
            'description' => __('Edit a category')
        ])->syncRoles([$role1]);                // Permiso de editar categorias
        Permission::create([
            'name' => 'admin.categories.destroy',
            'description' => __('Delete a category')
        ])->syncRoles([$role1]);             // Permiso de eliminar categorias

        // Tags
        Permission::create([
            'name' => 'admin.tags.index',
            'description' => __('See tags list')
        ])->syncRoles([$role1, $role2]);       // Permiso de ver tags
        Permission::create([
            'name' => 'admin.tags.create',
            'description' => __('Create a tag')
        ])->syncRoles([$role1]);              // Permiso de crear tags
        Permission::create([
            'name' => 'admin.tags.edit',
            'description' => __('Edit a tag')
        ])->syncRoles([$role1]);                // Permiso de editar tags
        Permission::create([
            'name' => 'admin.tags.destroy',
            'description' => __('Delete a tag')
        ])->syncRoles([$role1]);             // Permiso de eliminar tags

        // Posts
        Permission::create([
            'name' => 'admin.posts.index',
            'description' => __('See post list')
        ])->syncRoles([$role1, $role2]);       // Permiso de ver posts
        Permission::create([
            'name' => 'admin.posts.create',
            'description' => __('Create a post')
        ])->syncRoles([$role1, $role2]);      // Permiso de crear posts
        Permission::create([
            'name' => 'admin.posts.edit',
            'description' => __('Edit a post')
        ])->syncRoles([$role1, $role2]);        // Permiso de editar posts
        Permission::create([
            'name' => 'admin.posts.destroy',
            'description' => __('Delete a post')
        ])->syncRoles([$role1, $role2]);     // Permiso de eliminar posts

        // Usuarios
        Permission::create([
            'name' => 'admin.users.index',
            'description' => __('See users list')
        ])->syncRoles([$role1]);           // Permiso de ver usuarios
        Permission::create([
            'name' => 'admin.users.edit',
            'description' => __('Assign a role to a user')
        ])->syncRoles([$role1]);            // Permiso de escoger roles para los usuarios
    }
}
