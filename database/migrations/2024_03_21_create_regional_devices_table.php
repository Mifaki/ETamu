<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('regional_devices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo_path')->nullable();
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('regional_devices');
    }
};
