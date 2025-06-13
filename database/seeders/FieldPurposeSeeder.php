<?php
namespace Database\Seeders;

use App\Models\FieldPurpose;
use Illuminate\Database\Seeder;

class FieldPurposeSeeder extends Seeder
{
    public function run(): void
    {
        $purposes = [
            [
                'name'        => 'Sekretaris Daerah',
                'description' => 'Bertemu dengan Sekretaris Daerah',
            ],
            [
                'name'        => 'Asisten Pemerintahan',
                'description' => 'Bertemu dengan Asisten Pemerintahan',
            ],
            [
                'name'        => 'Asisten Perekonomian',
                'description' => 'Bertemu dengan Asisten Perekonomian',
            ],
            [
                'name'        => 'Asisten Administrasi',
                'description' => 'Bertemu dengan Asisten Administrasi',
            ],
            [
                'name'        => 'Kepala Dinas Pendidikan',
                'description' => 'Bertemu dengan Kepala Dinas Pendidikan',
            ],
            [
                'name'        => 'Kepala Dinas Kesehatan',
                'description' => 'Bertemu dengan Kepala Dinas Kesehatan',
            ],
            [
                'name'        => 'Kepala Dinas PUPR',
                'description' => 'Bertemu dengan Kepala Dinas Pekerjaan Umum dan Penataan Ruang',
            ],
            [
                'name'        => 'Kepala Dinas Perhubungan',
                'description' => 'Bertemu dengan Kepala Dinas Perhubungan',
            ],
            [
                'name'        => 'Kepala Dinas Sosial',
                'description' => 'Bertemu dengan Kepala Dinas Sosial',
            ],
            [
                'name'        => 'Kepala Disdukcapil',
                'description' => 'Bertemu dengan Kepala Dinas Kependudukan dan Pencatatan Sipil',
            ],
            [
                'name'        => 'Kepala Disperindag',
                'description' => 'Bertemu dengan Kepala Dinas Perindustrian dan Perdagangan',
            ],
            [
                'name'        => 'Kepala Dinas Pertanian',
                'description' => 'Bertemu dengan Kepala Dinas Pertanian',
            ],
            [
                'name'        => 'Kepala Disparbud',
                'description' => 'Bertemu dengan Kepala Dinas Pariwisata dan Kebudayaan',
            ],
            [
                'name'        => 'Kepala Bagian Umum',
                'description' => 'Bertemu dengan Kepala Bagian Umum',
            ],
            [
                'name'        => 'Kepala Bagian Hukum',
                'description' => 'Bertemu dengan Kepala Bagian Hukum',
            ],
            [
                'name'        => 'Kepala Bagian Organisasi',
                'description' => 'Bertemu dengan Kepala Bagian Organisasi',
            ],
        ];

        foreach ($purposes as $purpose) {
            FieldPurpose::create($purpose);
        }
    }
}
