<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = [
            'view course',
            'create course',
            'edit course',
            'delete course',
        ];

        foreach ($permission as $permission) {
            ModelsPermission::create([
                'name' => $permission
            ]);
        }

        $teacherRole = Role::create([
            'name' => 'teacher',
        ]);

        $teacherRole->givePermissionTo([
            'view course',
            'create course',
            'edit course',
            'delete course',
        ]);

        $studentRole = Role::create([
            'name' => 'student'
        ]);

        $studentRole->givePermissionTo([
            'view course',
        ]);

        // membuat data user super admin
        $user = User::create([
            'name' => 'Tyo',
            'email' => 'tyo@softwareengineer.com',
            'password' => Hash::make('123123123'),
        ]);

        $user->assignRole($teacherRole);
    }
}
