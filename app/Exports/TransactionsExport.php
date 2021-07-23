<?php

namespace App\Exports;

use App\Models\Transaction;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithPreCalculateFormulas;
use Maatwebsite\Excel\Events\AfterSheet;

class TransactionsExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping, WithColumnFormatting, WithEvents, WithPreCalculateFormulas
{
    use Exportable;

    protected $outlet;
    protected $request;

    public function __construct($outlet, $request)
    {   
        $this->outlet = $outlet;
        $this->request = $request;
    }

    public function query()
    {
        $datef = $this->request->get('date-from');
        $datet = $this->request->get('date-to');
        $barber_id = $this->request->get('barber_id');

        return Transaction::query()->with(['cashier', 'outlet', 'barber'])
        ->whereIn('outlet_id', $this->outlet)
        ->when($datef, function ($query, $datef) {
            $query->whereDate('created_at', '>=', $datef);
        })
        ->when($datet, function ($query, $datet) {
            $query->whereDate('created_at', '<=', $datet);
        })
        ->when($barber_id, function ($query, $barber_id) {
            $query->where('barber_id', $barber_id);
        })
        ->orderBy('created_at', 'desc')
        ;
    }

    public function headings(): array
    {
        return ["Outlet", "Kasir", "Tukang Cukur", "Pelanggan", "Total Belanja", "Tanggal"];
    }

    public function map($transaction): array
    {
        return [
            $transaction->outlet->name,
            $transaction->cashier->name,
            $transaction->barber->name,
            $transaction->customer_name,
            $transaction->total,
            Date::dateTimeToExcel($transaction->created_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeExport::class  => function(BeforeExport $event) {
                $event->writer->setCreator('Kasir Kita');
            },
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

                // $event->sheet->styleCells(
                //     'B2:G8',
                //     [
                //         'borders' => [
                //             'outline' => [
                //                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                //                 'color' => ['argb' => 'FFFF0000'],
                //             ],
                //         ]
                //     ]
                // );
                $lastColumn = chr(ord($event->sheet->getDelegate()->getHighestColumn()) - 2);

                $event->sheet->mergeCells('A' . ($event->sheet->getDelegate()->getHighestRow() + 1) . ':' . $lastColumn . ($event->sheet->getDelegate()->getHighestRow() + 1));
                $event->sheet->setCellValue('A' . $event->sheet->getDelegate()->getHighestRow(), 'Total Pemasukan');
                $event->sheet->setCellValue('E' . $event->sheet->getDelegate()->getHighestRow(), "=SUM(E2:E{$event->sheet->getDelegate()->getHighestRow()})");
            },
        ];
    }

}
