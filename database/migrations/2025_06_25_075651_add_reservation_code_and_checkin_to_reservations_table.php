<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('reservations', function (Blueprint $table) {
        $table->string('reservation_code', 10)->unique()->nullable()->after('user_id');
        $table->dateTime('checked_in_at')->nullable()->after('status');
        $table->boolean('is_checked_in')->default(false)->after('checked_in_at');
    });
}

public function down()
{
    Schema::table('reservations', function (Blueprint $table) {
        $table->dropColumn(['reservation_code', 'checked_in_at', 'is_checked_in']);
    });
}

};
