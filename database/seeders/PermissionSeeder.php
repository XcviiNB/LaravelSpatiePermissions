<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'      => 'Administrator',
            'email'     => 'me@email.com',
            'password'  => bcrypt('password')
        ]);

        $admin = Role::create(['name' => 'admin']);

        $createUserPemission    = Permission::create(['name' => 'create-user']);
        $createItem             = Permission::create(['name' => 'create-item']);
        $editItem               = Permission::create(['name' => 'edit-item']);
        $viewItem               = Permission::create(['name' => 'view-item']);
        $deleteItem             = Permission::create(['name' => 'delete-item']);
        $listItem               = Permission::create(['name' => 'list-item']);

        $admin->givePermissionTo('create-user');
        $admin->givePermissionTo('create-item');
        $admin->givePermissionTo('edit-item');
        $admin->givePermissionTo('view-item');
        $admin->givePermissionTo('delete-item');
        $admin->givePermissionTo('list-item');

        $editor = Role::create(['name' => 'editor']);

        $editor->givePermissionTo('view-item');
        $editor->givePermissionTo('edit-item');
        $editor->givePermissionTo('list-item');

        $guest  = Role::create(['name' => 'guest']);

        $guest->givePermissionTo('list-item');
    }
}
