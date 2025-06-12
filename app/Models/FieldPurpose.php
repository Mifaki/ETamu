<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldPurpose extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];
}
