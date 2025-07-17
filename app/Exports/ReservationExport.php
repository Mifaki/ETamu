<?php
namespace App\Exports;

use App\Models\Reservation;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReservationExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $month;

    public function __construct($month)
    {
        $this->month = $month;
    }

    public function collection()
    {
        $startDate = Carbon::createFromFormat('Y-m', $this->month)->startOfMonth();
        $endDate   = Carbon::createFromFormat('Y-m', $this->month)->endOfMonth();

        return Reservation::with(['guestCategory', 'guestPurpose', 'fieldPurpose', 'regionalDevice', 'user'])
            ->whereBetween('meeting_time_start', [$startDate, $endDate])
            ->orderBy('meeting_time_start', 'asc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Kode Reservasi',
            'Nama Tamu',
            'Kategori Tamu',
            'Organisasi',
            'Keperluan Tamu',
            'Nomor Telepon',
            'Email',
            'Tujuan Bidang',
            'Perangkat Daerah',
            'Waktu Mulai Pertemuan',
            'Waktu Selesai Pertemuan',
            'Alamat',
            'Jenis Reservasi',
            'Status',
            'Catatan',
            'Check-in',
            'Waktu Check-in',
            'Catatan Pembatalan',
            'Tanggal Dibuat',
        ];
    }

    public function map($reservation): array
    {
        return [
            $reservation->reservation_code,
            $reservation->guest_name,
            $reservation->guestCategory->name ?? '-',
            $reservation->organization ?? '-',
            $reservation->guestPurpose->name ?? '-',
            $reservation->phone_number,
            $reservation->email,
            $reservation->fieldPurpose->name ?? '-',
            $reservation->regionalDevice->name ?? '-',
            $reservation->meeting_time_start->format('d/m/Y H:i'),
            $reservation->meeting_time_end->format('d/m/Y H:i'),
            $reservation->address,
            $this->getReservationType($reservation->reservation_type),
            $this->getStatusInIndonesian($reservation->status),
            $reservation->notes ?? '-',
            $reservation->is_checked_in ? 'Ya' : 'Tidak',
            $reservation->checked_in_at ? $reservation->checked_in_at->format('d/m/Y H:i') : '-',
            $reservation->canceled_notes ?? '-',
            $reservation->created_at->format('d/m/Y H:i'),
        ];
    }

    private function getReservationType($type)
    {
        return match ($type) {
            'individual' => 'Individu',
            'organization' => 'Organisasi',
            default        => $type
        };
    }

    private function getStatusInIndonesian($status)
    {
        return match ($status) {
            'pending'      => 'Menunggu',
            'approved'     => 'Disetujui',
            'rejected'     => 'Ditolak',
            'completed'    => 'Selesai',
            'canceled'     => 'Dibatalkan',
            default        => $status
        };
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
