<?php
namespace Database\Seeders;

use App\Models\FieldPurpose;
use App\Models\GuestCategory;
use App\Models\GuestPurpose;
use App\Models\RegionalDevice;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    public function run(): void
    {
        $guestCategories = GuestCategory::all();
        $guestPurposes   = GuestPurpose::all();
        $fieldPurposes   = FieldPurpose::all();
        $regionalDevices = RegionalDevice::all();

        $visitorUser = User::role('Pengunjung')->first();
        $adminOPD    = User::role('Admin OPD')->first();

        $reservations = [
            [
                'user_id'            => $visitorUser->id,
                'guest_name'         => 'John Doe',
                'guest_category_id'  => $guestCategories->where('name', 'Warga Masyarakat')->first()->id,
                'guest_purpose_id'   => $guestPurposes->where('name', 'Pengurusan Administrasi')->first()->id,
                'field_purpose_id'   => $fieldPurposes->where('name', 'Kepala Disdukcapil')->first()->id,
                'regional_device_id' => $regionalDevices->where('name', 'Dinas Kependudukan dan Pencatatan Sipil')->first()->id,
                'phone_number'       => '081234567890',
                'email'              => 'pengunjung@example.com',
                'meeting_time_start' => Carbon::now()->addDays(2)->setHour(9)->setMinute(0),
                'meeting_time_end'   => Carbon::now()->addDays(2)->setHour(10)->setMinute(0),
                'address'            => 'Jl. Merdeka No. 123, Tigaraksa, Kabupaten Tangerang',
                'reservation_type'   => 'individual',
                'status'             => 'pending',
                'reservation_code' => \App\Models\Reservation::generateUniqueCode(),
                'is_checked_in'    => false,
            ],
            [
                'user_id'            => $adminOPD->id,
                'guest_name'         => 'Samsul Bahari',
                'guest_category_id'  => $guestCategories->where('name', 'Lembaga Pendidikan')->first()->id,
                'organization'       => 'Universitas Tangerang',
                'guest_purpose_id'   => $guestPurposes->where('name', 'Studi Banding')->first()->id,
                'field_purpose_id'   => $fieldPurposes->where('name', 'Kepala Dinas Pendidikan')->first()->id,
                'regional_device_id' => $regionalDevices->where('name', 'Dinas Pendidikan')->first()->id,
                'phone_number'       => '081234567891',
                'email'              => 'adminopd1@opd.com',
                'meeting_time_start' => Carbon::now()->addDays(3)->setHour(10)->setMinute(0),
                'meeting_time_end'   => Carbon::now()->addDays(3)->setHour(12)->setMinute(0),
                'address'            => 'Jl. Pendidikan No. 45, Tigaraksa, Kabupaten Tangerang',
                'reservation_type'   => 'organization',
                'status'             => 'approved',
                'reservation_code' => \App\Models\Reservation::generateUniqueCode(),
                'is_checked_in'    => false,
            ],
            [
                'user_id'            => $visitorUser->id,
                'guest_name'         => 'John Doe',
                'guest_category_id'  => $guestCategories->where('name', 'Perusahaan Swasta')->first()->id,
                'organization'       => 'PT Maju Bersama',
                'guest_purpose_id'   => $guestPurposes->where('name', 'Koordinasi Program')->first()->id,
                'field_purpose_id'   => $fieldPurposes->where('name', 'Kepala Disperindag')->first()->id,
                'regional_device_id' => $regionalDevices->where('name', 'Dinas Perindustrian dan Perdagangan')->first()->id,
                'phone_number'       => '081234567890',
                'email'              => 'pengunjung@example.com',
                'meeting_time_start' => Carbon::now()->addDays(4)->setHour(13)->setMinute(0),
                'meeting_time_end'   => Carbon::now()->addDays(4)->setHour(15)->setMinute(0),
                'address'            => 'Jl. Industri No. 78, Tigaraksa, Kabupaten Tangerang',
                'reservation_type'   => 'organization',
                'status'             => 'pending',
                'reservation_code' => \App\Models\Reservation::generateUniqueCode(),
                'is_checked_in'    => false,
            ],
            [
                'user_id'            => $adminOPD->id,
                'guest_name'         => 'Dewi Tristiani',
                'guest_category_id'  => $guestCategories->where('name', 'Lembaga Swadaya Masyarakat')->first()->id,
                'organization'       => 'LSM Peduli Masyarakat',
                'guest_purpose_id'   => $guestPurposes->where('name', 'Pengaduan Masyarakat')->first()->id,
                'field_purpose_id'   => $fieldPurposes->where('name', 'Asisten Pemerintahan')->first()->id,
                'regional_device_id' => $regionalDevices->where('name', 'Sekretariat Daerah')->first()->id,
                'phone_number'       => '081234567892',
                'email'              => 'operator1@opd.com',
                'meeting_time_start' => Carbon::now()->addDays(5)->setHour(9)->setMinute(0),
                'meeting_time_end'   => Carbon::now()->addDays(5)->setHour(11)->setMinute(0),
                'address'            => 'Jl. Masyarakat No. 90, Tigaraksa, Kabupaten Tangerang',
                'reservation_type'   => 'organization',
                'status'             => 'rejected',
                'reservation_code' => \App\Models\Reservation::generateUniqueCode(),
                'is_checked_in'    => false,
            ],
            [
                'user_id'            => $visitorUser->id,
                'guest_name'         => 'John Doe',
                'guest_category_id'  => $guestCategories->where('name', 'Pelajar/Mahasiswa')->first()->id,
                'guest_purpose_id'   => $guestPurposes->where('name', 'Konsultasi')->first()->id,
                'field_purpose_id'   => $fieldPurposes->where('name', 'Kepala Dinas Kesehatan')->first()->id,
                'regional_device_id' => $regionalDevices->where('name', 'Dinas Kesehatan')->first()->id,
                'phone_number'       => '081234567890',
                'email'              => 'pengunjung@example.com',
                'meeting_time_start' => Carbon::now()->addDays(6)->setHour(14)->setMinute(0),
                'meeting_time_end'   => Carbon::now()->addDays(6)->setHour(15)->setMinute(0),
                'address'            => 'Jl. Kesehatan No. 56, Tigaraksa, Kabupaten Tangerang',
                'reservation_type'   => 'individual',
                'status'             => 'completed',
                'reservation_code' => \App\Models\Reservation::generateUniqueCode(),
                'is_checked_in'    => false,
            ],
        ];

        foreach ($reservations as $reservation) {
            Reservation::create($reservation);
        }
    }
}
