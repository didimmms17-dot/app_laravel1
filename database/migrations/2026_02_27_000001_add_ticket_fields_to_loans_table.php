<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->string('ticket_code')->nullable()->unique()->after('status');
            $table->timestamp('approved_at')->nullable()->after('ticket_code');
        });
    }

    public function down()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->dropColumn(['ticket_code', 'approved_at']);
        });
    }
};
