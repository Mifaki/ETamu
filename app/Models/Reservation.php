<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'guest_name',
        'guest_category_id',
        'organization',
        'guest_purpose_id',
        'phone_number',
        'email',
        'field_purpose_id',
        'meeting_time_start',
        'meeting_time_end',
        'address',
        'reservation_type',
        'id_card_path',
        'organization_document_path',
        'notes',
        'status',
        'regional_device_id',
    ];

    protected $casts = [
        'meeting_time_start' => 'datetime',
        'meeting_time_end'   => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function guestCategory(): BelongsTo
    {
        return $this->belongsTo(GuestCategory::class);
    }

    public function guestPurpose(): BelongsTo
    {
        return $this->belongsTo(GuestPurpose::class);
    }

    public function fieldPurpose(): BelongsTo
    {
        return $this->belongsTo(FieldPurpose::class);
    }

    public function regionalDevice(): BelongsTo
    {
        return $this->belongsTo(RegionalDevice::class);
    }

    public function questionnaire(): HasOne
    {
        return $this->hasOne(Questionnaire::class);
    }
}
