<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('guest_name');
            $table->foreignId('guest_category_id')->constrained('guest_categories')->onDelete('restrict');
            $table->string('organization')->nullable();
            $table->foreignId('guest_purpose_id')->constrained('guest_purposes')->onDelete('restrict');
            $table->string('phone_number');
            $table->string('email');
            $table->foreignId('field_purpose_id')->constrained('field_purposes')->onDelete('restrict');
            $table->time('meeting_time_start');
            $table->time('meeting_time_end');
            $table->text('address');
            $table->enum('reservation_type', ['individual', 'organization']);
            $table->string('id_card_path')->nullable();
            $table->string('organization_document_path')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
