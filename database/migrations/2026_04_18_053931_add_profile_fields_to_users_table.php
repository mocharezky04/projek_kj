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
        Schema::table('users', function (Blueprint $table) {
            $table->string('prodi')->after('name');
            $table->enum('gender', ['L', 'P'])->after('prodi');
            $table->string('angkatan', 4)->after('gender');
            $table->string('role')->default('member')->after('angkatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['prodi', 'gender', 'angkatan', 'role']);
        });
    }
};
