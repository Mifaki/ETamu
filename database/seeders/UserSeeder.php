<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'name'              => 'Super Administrator',
            'email'             => 'superadmin@example.com',
            'username'          => 'superadmin',
            'password'          => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);
        $superAdmin->assignRole('Super Admin');

        $adminOPD = User::create([
            'name'              => 'Samsul Bahari',
            'email'             => 'adminopd1@opd.com',
            'username'          => 'adminopd1',
            'password'          => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);
        $adminOPD->assignRole('Admin OPD');

        $adminOPD2 = User::create([
            'name'              => 'Dewi Tristiani',
            'email'             => 'operator1@opd.com',
            'username'          => 'operator1',
            'password'          => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);
        $adminOPD2->assignRole('Admin OPD');

        $pengunjung = User::create([
            'name'              => 'John Doe',
            'email'             => 'pengunjung@example.com',
            'username'          => 'pengunjung1',
            'password'          => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);
        $pengunjung->assignRole('Pengunjung');
    }
}
