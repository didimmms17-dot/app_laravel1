<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Change role column to ENUM with specific values: admin, user, petugas
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // For MySQL, change column to ENUM
            DB::statement("ALTER TABLE users MODIFY role ENUM('admin', 'user', 'petugas') DEFAULT 'user'");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Revert back to string type
            DB::statement("ALTER TABLE users MODIFY role VARCHAR(255) DEFAULT 'user'");
        });
    }
};
