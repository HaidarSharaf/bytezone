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
            $table->integer('phone_number')->nullable()->after('email');
            $table->string('avatar')->after('phone_number');
            $table->boolean('is_admin')->default(false)->after('avatar');
            $table->boolean('notifications')->default(false)->after('is_admin');
            $table->timestamp('deleted_at')->nullable()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_number');
            $table->dropColumn('avatar');
            $table->dropColumn('is_admin');
            $table->dropColumn('notifications');
            $table->dropColumn('deleted_at');
        });
    }
};
