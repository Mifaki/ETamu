<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->string('canceled_notes')->nullable()->after('notes');
        });

        DB::statement("ALTER TABLE reservations MODIFY COLUMN status ENUM('pending', 'approved', 'rejected', 'completed', 'canceled') DEFAULT 'pending'");
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('canceled_notes');
        });

        DB::statement("ALTER TABLE reservations MODIFY COLUMN status ENUM('pending', 'approved', 'rejected', 'completed') DEFAULT 'pending'");
    }
};
