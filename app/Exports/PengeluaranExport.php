<?php

namespace App\Exports;
 
use App\Keuangan;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class PengeluaranExport implements FromView, ShouldAutoSize, WithEvents
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
        return view('pengeluaran.print_pengeluaran', [
            'laporan' => Keuangan::where('status', 2)->whereBetween('created_at', [$this->sebelum, $this->sesudah])->get(),
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A2:f3'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12)->setBold($cellRange);
                $event->sheet->wrapText('A1:AC100');
                $event->sheet->horizontalAlign('A1' , \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->horizontalAlign('b2' , \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $event->sheet->setFontFamily('A1:f3', 'Times New Roman');
            },
        ];
    } 
}