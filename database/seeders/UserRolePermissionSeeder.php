<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    protected static ?string $password;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();
        try {
            $admin = User::create(array_merge([
                'email' => 'admin@gmail.com',
                'name' => 'admin',
            ], $default_user_value));
            $subadmin1 = User::create(array_merge([
                'email' => 'subadmin1@gmail.com',
                'name' => 'subadmin1',
            ], $default_user_value));
            $subadmin2 = User::create(array_merge([
                'email' => 'subadmin2@gmail.com',
                'name' => 'subadmin2',
            ], $default_user_value));

            $role_admin = Role::create(['name' => 'admin']);
            $role_subadmin1 = Role::create(['name' => 'subadmin1']);
            $role_subadmin2 = Role::create(['name' => 'subadmin2']);

            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'update role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'delete role']);

            $admin->givePermissionTo('read role');
            $admin->givePermissionTo('update role');
            $admin->givePermissionTo('create role');
            $admin->givePermissionTo('delete role');

            $admin->assignRole('admin');
            $subadmin1->assignRole('subadmin1');
            $subadmin2->assignRole('subadmin2');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
