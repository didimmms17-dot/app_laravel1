<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('publisher')->nullable()->after('description');
            $table->year('year_published')->nullable()->after('publisher');
            $table->integer('pages')->nullable()->after('year_published');
            $table->string('isbn')->nullable()->after('pages');
            $table->string('language')->default('Indonesia')->after('isbn');
            $table->string('type')->default('Buku Cetak')->after('language');
            $table->string('format')->default('Hardcover')->after('type');
            $table->string('cover_image')->nullable()->after('format');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['publisher', 'year_published', 'pages', 'isbn', 'language', 'type', 'format', 'cover_image']);
        });
    }
};
