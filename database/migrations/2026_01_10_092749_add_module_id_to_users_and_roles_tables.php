<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('module_id')
                  ->nullable()
                  ->constrained('modules')
                  ->nullOnDelete(); // met module_id à null si le module est supprimé
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->foreignId('module_id')
                  ->nullable()
                  ->constrained('modules')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['module_id']);
            $table->dropColumn('module_id');
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->dropForeign(['module_id']);
            $table->dropColumn('module_id');
        });
    }
};
