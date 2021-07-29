<?php

namespace App\Exports;
 
use App\Keuangan;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class LaporanExport implements FromView, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $sebelum;
    protected $sesudah;

    function __construct($sebelum, $sesudah) {
        $this->sebelum = $sebelum;
        $this->sesudah = $sesudah;
    }
    public function view(): View
    {
        return view('laporan.print_laporan', [
            'laporan' => Keuangan::whereBetween('created_at', [$this->sebelum, $this->sesudah])->get(),
            'saldo'   => Keuangan::select('saldo')->latest()->first(),
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A2:f3'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12)->setBold($cellRange);
                // $sheet = $event->sheet->getDelegate();
                // $sheet->getStyle('A5:f5')->getFont()
                //     ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //     ->getStartColor()->setARGB('FFFF0000');
         //        $event->sheet->getStyle('A1:F20')->applyFromArray([
         //            'borders' => [
         //                'allBorders' => [
         //                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
         //                    'color' => ['argb' => '000000'],
         //                ],
         //            ],
         // ]);
                $event->sheet->wrapText('A1:AC100');
                $event->sheet->horizontalAlign('A1' , \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->horizontalAlign('b2' , \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                // $event->sheet->horizontalAlign('A3' , \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                // $event->sheet->horizontalAlign('B4' , \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $event->sheet->setFontFamily('A1:f3', 'Times New Roman');
                // $event->sheet->horizontalAlign('A6:F20' , \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                // $event->sheet->horizontalAlign('E6:X6' , \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                // $event->sheet->verticalAlign('A1:AC100' , \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                // $event->sheet->verticalAlign('A8:D100' , \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
                // $event->sheet->horizontalAlign('A6:X7', \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                // $event->sheet->horizontalAlign('E8:AC100', \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER); 
                // $event->sheet->verticalAlign('E7:X7' , \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_BOTTOM);
                // $event->sheet->verticalAlign('A8:D100' , \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
                // $event->sheet->horizontalAlign('A8:D100', \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT); 
                // $event->sheet->textRotation('E7:X7', 90);
            },
        ];
    } 
}