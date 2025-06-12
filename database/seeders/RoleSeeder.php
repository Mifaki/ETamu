<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Super Admin',
            'Admin OPD',
            'Pengunjung',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $permissions = [
            'manage users',
            'manage reservations',
            'manage regional devices',
            'manage guest categories',
            'manage guest purposes',
            'manage field purposes',
            'view questionnaires',
            'view guests',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $superAdmin = Role::findByName('Super Admin');
        $adminOPD   = Role::findByName('Admin OPD');
        $pengunjung = Role::findByName('Pengunjung');

        $superAdmin->givePermissionTo(Permission::all());

        $adminOPD->givePermissionTo([
            'manage reservations',
            'manage regional devices',
            'manage guest categories',
            'manage guest purposes',
            'manage field purposes',
            'view questionnaires',
            'view guests',
        ]);

        // Pengunjung gets limited permissions
        $pengunjung->givePermissionTo([
            'view questionnaires',
            'view guests',
        ]);
    }
}
