<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RegionalDevice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo_path',
        'description',
        'address',
    ];

    public function getLogoUrlAttribute()
    {
        return $this->logo_path ? asset('storage/' . $this->logo_path) : null;
    }

    public function getLogoAttribute()
    {
        if ($this->logo_path) {
            return '<img src="' . asset('storage/' . $this->logo_path) . '" alt="' . $this->name . '" class="w-16 h-16 object-cover rounded">';
        }
        return '<span class="text-gray-400">No logo</span>';
    }

    public function getNamaAttribute()
    {
        return $this->name;
    }

    public function getAlamatAttribute()
    {
        return $this->address ?: '-';
    }

    public function getDeskripsiAttribute()
    {
        return $this->description ? Str::limit($this->description, 100) : '-';
    }

    public function toArray()
    {
        $array              = parent::toArray();
        $array['Logo']      = $this->Logo;
        $array['Nama']      = $this->Nama;
        $array['Alamat']    = $this->Alamat;
        $array['Deskripsi'] = $this->Deskripsi;
        return $array;
    }
}
