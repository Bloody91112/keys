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
            $table->string('avatar')->nullable();
            $table->date('birthday')->nullable();
            $table->unsignedSmallInteger('gender')->nullable();
            $table->foreignId('role_id')->default(2)->index()->constrained('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('birthday');
            $table->dropColumn('gender');
            $table->dropConstrainedForeignId('role_id');
        });
    }
};
