<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Fortify\Fortify;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')
                ->after('id')
                ->nullable();

            $table->string('last_name')
                ->after('first_name')
                ->nullable();
            $table->dropColumn(['name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')
                ->after('id')
                ->nullable();
            $table->dropColumn([
                'first_name',
                'last_name',
            ]);
        });
    }
};
