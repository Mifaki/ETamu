<?php
namespace Database\Seeders;

use App\Models\GuestCategory;
use Illuminate\Database\Seeder;

class GuestCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name'        => 'Warga Masyarakat',
                'description' => 'Warga masyarakat umum yang mengajukan kunjungan',
            ],
            [
                'name'        => 'Pelajar/Mahasiswa',
                'description' => 'Pelajar atau mahasiswa yang melakukan kunjungan studi',
            ],
            [
                'name'        => 'Perusahaan Swasta',
                'description' => 'Perwakilan dari perusahaan swasta',
            ],
            [
                'name'        => 'Instansi Pemerintah',
                'description' => 'Perwakilan dari instansi pemerintah lain',
            ],
            [
                'name'        => 'Media',
                'description' => 'Jurnalis dan perwakilan media',
            ],
            [
                'name'        => 'Lembaga Swadaya Masyarakat',
                'description' => 'Perwakilan dari LSM',
            ],
            [
                'name'        => 'Organisasi Kemasyarakatan',
                'description' => 'Perwakilan dari ormas',
            ],
            [
                'name'        => 'Badan Usaha Milik Negara',
                'description' => 'Perwakilan dari BUMN',
            ],
            [
                'name'        => 'Badan Usaha Milik Daerah',
                'description' => 'Perwakilan dari BUMD',
            ],
            [
                'name'        => 'Lembaga Pendidikan',
                'description' => 'Perwakilan dari lembaga pendidikan',
            ],
        ];

        foreach ($categories as $category) {
            GuestCategory::create($category);
        }
    }
}
