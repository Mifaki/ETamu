<?php
namespace Database\Seeders;

use App\Models\GuestPurpose;
use Illuminate\Database\Seeder;

class GuestPurposeSeeder extends Seeder
{
    public function run(): void
    {
        $purposes = [
            [
                'name'        => 'Pengurusan Administrasi',
                'description' => 'Pengurusan dokumen dan administrasi kependudukan',
            ],
            [
                'name'        => 'Studi Banding',
                'description' => 'Kunjungan untuk studi banding dan pembelajaran',
            ],
            [
                'name'        => 'Koordinasi Program',
                'description' => 'Koordinasi program dan kegiatan',
            ],
            [
                'name'        => 'Pengajuan Proposal',
                'description' => 'Pengajuan proposal kerjasama atau bantuan',
            ],
            [
                'name'        => 'Pelaporan Kegiatan',
                'description' => 'Pelaporan hasil kegiatan',
            ],
            [
                'name'        => 'Konsultasi',
                'description' => 'Konsultasi permasalahan dan pengembangan',
            ],
            [
                'name'        => 'Pengawasan',
                'description' => 'Kunjungan pengawasan dan monitoring',
            ],
            [
                'name'        => 'Pelatihan',
                'description' => 'Kegiatan pelatihan dan pengembangan',
            ],
            [
                'name'        => 'Rapat Koordinasi',
                'description' => 'Rapat koordinasi antar instansi',
            ],
            [
                'name'        => 'Kunjungan Kerja',
                'description' => 'Kunjungan kerja resmi',
            ],
            [
                'name'        => 'Pengaduan Masyarakat',
                'description' => 'Pengaduan dan aspirasi masyarakat',
            ],
            [
                'name'        => 'Wawancara Media',
                'description' => 'Wawancara untuk pemberitaan media',
            ],
        ];

        foreach ($purposes as $purpose) {
            GuestPurpose::create($purpose);
        }
    }
}
