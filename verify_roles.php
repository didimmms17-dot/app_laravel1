<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== USERS TABLE VERIFICATION ===\n\n";

$users = \App\Models\User::select('id', 'name', 'email', 'role')->get();

echo "Total users: " . $users->count() . "\n\n";

foreach($users as $user) {
    echo $user->name . " ({$user->email})\n";
    echo "  Role: " . $user->role . "\n\n";
}

echo "=== DATABASE SCHEMA ===\n";
$columns = \DB::select("DESC users");
echo "Users table columns:\n";
foreach($columns as $col) {
    if($col->Field === 'role') {
        echo "  " . $col->Field . " -> Type: " . $col->Type . " | Null: " . $col->Null . " | Default: " . ($col->Default ?? 'NULL') . "\n";
    }
}
