<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Seed the database with admin, user, and petugas (librarian) accounts.
     */
    public function run()
    {
        // Create Admin User
        User::firstOrCreate(
            ['email' => 'admin@perpustakaan.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'address' => 'Jalan Perpustakaan No. 1'
            ]
        );

        // Create Librarian/Petugas User
        User::firstOrCreate(
            ['email' => 'petugas@perpustakaan.com'],
            [
                'name' => 'Petugas Perpustakaan',
                'password' => Hash::make('petugas123'),
                'role' => 'petugas',
                'address' => 'Jalan Perpustakaan No. 1'
            ]
        );

        // Create Regular User/Member Users
        User::firstOrCreate(
            ['email' => 'member1@perpustakaan.com'],
            [
                'name' => 'Ahmad Rifai',
                'password' => Hash::make('member123'),
                'role' => 'user',
                'address' => 'Jalan Kenangan No. 5'
            ]
        );

        User::firstOrCreate(
            ['email' => 'member2@perpustakaan.com'],
            [
                'name' => 'Siti Nurhaliza',
                'password' => Hash::make('member123'),
                'role' => 'user',
                'address' => 'Jalan Merdeka No. 10'
            ]
        );

        User::firstOrCreate(
            ['email' => 'member3@perpustakaan.com'],
            [
                'name' => 'Budi Santoso',
                'password' => Hash::make('member123'),
                'role' => 'user',
                'address' => 'Jalan Gatot Subroto No. 3'
            ]
        );

        echo "\n";
        echo "═══════════════════════════════════════════════════════════════\n";
        echo "✅ USER SEEDING COMPLETED\n";
        echo "═══════════════════════════════════════════════════════════════\n\n";

        echo "📋 ADMIN ACCOUNT:\n";
        echo "   Email: admin@perpustakaan.com\n";
        echo "   Password: admin123\n";
        echo "   Role: Admin (Akses penuh)\n\n";

        echo "📋 PETUGAS/LIBRARIAN ACCOUNT:\n";
        echo "   Email: petugas@perpustakaan.com\n";
        echo "   Password: petugas123\n";
        echo "   Role: Librarian (Petugas Perpustakaan)\n\n";

        echo "📋 MEMBER ACCOUNTS (3 akun):\n";
        echo "   1. Ahmad Rifai\n";
        echo "      Email: member1@perpustakaan.com\n";
        echo "      Password: member123\n\n";

        echo "   2. Siti Nurhaliza\n";
        echo "      Email: member2@perpustakaan.com\n";
        echo "      Password: member123\n\n";

        echo "   3. Budi Santoso\n";
        echo "      Email: member3@perpustakaan.com\n";
        echo "      Password: member123\n\n";

        echo "═══════════════════════════════════════════════════════════════\n";
        echo "🔐 ROLE TYPES:\n";
        echo "   • admin     = Administrator (Full Access)\n";
        echo "   • librarian = Petugas Perpustakaan (Library Staff)\n";
        echo "   • member    = Anggota Perpustakaan (Regular User)\n";
        echo "═══════════════════════════════════════════════════════════════\n\n";
    }
}
