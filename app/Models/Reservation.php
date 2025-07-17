<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reservation_code',
        'guest_name',
        'guest_category_id',
        'organization',
        'guest_purpose_id',
        'phone_number',
        'email',
        'field_purpose_id',
        'regional_device_id',
        'meeting_time_start',
        'meeting_time_end',
        'address',
        'reservation_type',
        'id_card_path',
        'organization_document_path',
        'notes',
        'status',
        'checked_in_at',
        'is_checked_in',
        'canceled_notes',
    ];

    protected $casts = [
        'meeting_time_start' => 'datetime',
        'meeting_time_end'   => 'datetime',
        'checked_in_at'      => 'datetime',
        'is_checked_in'      => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($reservation) {
            if (empty($reservation->reservation_code)) {
                $reservation->reservation_code = static::generateUniqueCode();
            }
        });
    }

    public static function generateUniqueCode()
    {
        do {
            $code = strtoupper(Str::random(8));
        } while (static::where('reservation_code', $code)->exists());

        return $code;
    }

    public function canCheckIn()
    {
        if ($this->is_checked_in) {
            return false;
        }

        $now         = now();
        $meetingTime = $this->meeting_time_start;

        return $now->diffInHours($meetingTime, false) <= 24 && $meetingTime->isFuture();
    }

    public function checkIn()
    {
        if ($this->canCheckIn()) {
            $this->update([
                'is_checked_in' => true,
                'checked_in_at' => now(),
            ]);
            return true;
        }
        return false;
    }

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
