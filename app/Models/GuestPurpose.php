<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestPurpose extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];
}
