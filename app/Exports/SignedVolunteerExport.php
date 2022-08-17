<?php

namespace App\Exports;

use App\Models\Signed_form;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SignedVolunteerExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithEvents
{
    use Exportable;

    public function __construct(int $ivid)
    {
        $this->ivid = $ivid;

        return $this;
    }

    public function collection()
    {
        return Signed_form::where('form_id', $this->ivid)->with('volunteer', 'position', 'volun')->get();
    }

    public function map($signed): array
    {
        return [
            $signed->volunteer->name,
            $signed->volunteer->firstname,
            $signed->volunteer->lastname,
            $signed->volunteer->telephone,
            $signed->volun->tshirt_size,
            $signed->position->title,
        ];
    }

    public function headings(): array
    {
        return [
            'Login',
            'Imię',
            'Nazwisko',
            'Numer telefonu',
            'Rozmiar koszulki',
            'Stanowisko',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A')->applyFromArray(['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]]);
                $event->sheet->getStyle('B:F')->applyFromArray(['alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT]]);
                $event->sheet->getStyle('A1:F1')->applyFromArray([
                    'font' => ['bold' => true],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);
                $event->sheet->getStyle('A1:F250')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '00000000'],
                        ],
                    ],
                ]);
            }
        ];
    }
}

