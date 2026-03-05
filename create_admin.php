<?php
require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Cek apakah admin sudah ada
$admin = User::where('email', 'admin@localhost')->first();

if ($admin) {
    echo "✅ Admin user sudah ada!\n";
    echo "Email: admin@localhost\n";
    echo "Password: admin123\n";
} else {
    // Buat admin user
    $admin = User::create([
        'name' => 'Admin',
        'email' => 'admin@localhost',
        'password' => Hash::make('admin123'),
        'role' => 'admin',
        'address' => 'Admin Office'
    ]);
    
    echo "✅ Admin user berhasil dibuat!\n";
    echo "Email: admin@localhost\n";
    echo "Password: admin123\n";
}

// Cek apakah petugas user sudah ada
$petugas = User::where('email', 'petugas@localhost')->first();

if (!$petugas) {
    User::create([
        'name' => 'Petugas',
        'email' => 'petugas@localhost',
        'password' => Hash::make('petugas123'),
        'role' => 'petugas',
        'address' => 'Perpustakaan'
    ]);
    echo "✅ Petugas user berhasil dibuat!\n";
    echo "Email: petugas@localhost\n";
    echo "Password: petugas123\n";
}

// Cek apakah regular user sudah ada
$user = User::where('email', 'user@localhost')->first();

if (!$user) {
    User::create([
        'name' => 'User Member',
        'email' => 'user@localhost',
        'password' => Hash::make('user123'),
        'role' => 'user',
        'address' => 'Rumah'
    ]);
    echo "✅ User member berhasil dibuat!\n";
    echo "Email: user@localhost\n";
    echo "Password: user123\n";
}

echo "\n=== SEMUA USER ===\n";
$users = User::all();
foreach ($users as $u) {
    echo "- {$u->name} ({$u->email}) - Role: {$u->role}\n";
}
?>
