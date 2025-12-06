<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('jobs', function (Blueprint $table) {
        $table->string('location')->after('description');
        $table->string('level')->after('location');
        $table->foreignId('category_id')
              ->after('level')
              ->constrained()
              ->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('jobs', function (Blueprint $table) {
        $table->dropColumn(['location', 'level']);
        $table->dropForeign(['category_id']);
        $table->dropColumn('category_id');
    });
}

};
