<?php
namespace Database\Seeders;

use App\Models\RegionalDevice;
use Illuminate\Database\Seeder;

class RegionalDeviceSeeder extends Seeder
{
    public function run(): void
    {
        $devices = [
            [
                'name'        => 'Sekretariat Daerah',
                'logo_path'   => '/assets/img/logo-kab.png',
                'description' => 'Sekretariat Daerah Kabupaten Tangerang',
                'address'     => 'Jl. Pajajaran No. 1, Tigaraksa, Kabupaten Tangerang',
            ],
            [
                'name'        => 'Dinas Pendidikan',
                'logo_path'   => '/assets/img/logo-kab.png',
                'description' => 'Dinas Pendidikan Kabupaten Tangerang',
                'address'     => 'Jl. Daan Mogot No. 2, Tigaraksa, Kabupaten Tangerang',
            ],
            [
                'name'        => 'Dinas Kesehatan',
                'logo_path'   => '/assets/img/logo-kab.png',
                'description' => 'Dinas Kesehatan Kabupaten Tangerang',
                'address'     => 'Jl. Raya Tigaraksa No. 3, Tigaraksa, Kabupaten Tangerang',
            ],
            [
                'name'        => 'Dinas Pekerjaan Umum dan Penataan Ruang',
                'logo_path'   => '/assets/img/logo-kab.png',
                'description' => 'Dinas PUPR Kabupaten Tangerang',
                'address'     => 'Jl. Raya Tigaraksa No. 4, Tigaraksa, Kabupaten Tangerang',
            ],
            [
                'name'        => 'Dinas Perhubungan',
                'logo_path'   => '/assets/img/logo-kab.png',
                'description' => 'Dinas Perhubungan Kabupaten Tangerang',
                'address'     => 'Jl. Raya Tigaraksa No. 5, Tigaraksa, Kabupaten Tangerang',
            ],
            [
                'name'        => 'Dinas Sosial',
                'logo_path'   => '/assets/img/logo-kab.png',
                'description' => 'Dinas Sosial Kabupaten Tangerang',
                'address'     => 'Jl. Raya Tigaraksa No. 6, Tigaraksa, Kabupaten Tangerang',
            ],
            [
                'name'        => 'Dinas Kependudukan dan Pencatatan Sipil',
                'logo_path'   => '/assets/img/logo-kab.png',
                'description' => 'Disdukcapil Kabupaten Tangerang',
                'address'     => 'Jl. Raya Tigaraksa No. 7, Tigaraksa, Kabupaten Tangerang',
            ],
            [
                'name'        => 'Dinas Perindustrian dan Perdagangan',
                'logo_path'   => '/assets/img/logo-kab.png',
                'description' => 'Disperindag Kabupaten Tangerang',
                'address'     => 'Jl. Raya Tigaraksa No. 8, Tigaraksa, Kabupaten Tangerang',
            ],
            [
                'name'        => 'Dinas Pertanian',
                'logo_path'   => '/assets/img/logo-kab.png',
                'description' => 'Dinas Pertanian Kabupaten Tangerang',
                'address'     => 'Jl. Raya Tigaraksa No. 9, Tigaraksa, Kabupaten Tangerang',
            ],
            [
                'name'        => 'Dinas Pariwisata dan Kebudayaan',
                'logo_path'   => '/assets/img/logo-kab.png',
                'description' => 'Disparbud Kabupaten Tangerang',
                'address'     => 'Jl. Raya Tigaraksa No. 10, Tigaraksa, Kabupaten Tangerang',
            ],
        ];

        foreach ($devices as $device) {
            RegionalDevice::create($device);
        }
    }
}
