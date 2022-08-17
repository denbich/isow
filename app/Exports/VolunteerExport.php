<?php

namespace App\Exports;

use App\Models\Volunteer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class VolunteerExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithEvents
{
    use Exportable;

    protected $q;

    public function __construct($q) {
        $this->q = $q;
    }

    public function collection()
    {
        if($this->q == null)
        {
            return Volunteer::with('user')->get();
        } else {
            $s = $this->q;
            return Volunteer::with('user')->whereHas('user', function ($query) use ($s){
                $query->where('name', 'like', '%'.$s.'%')->orwhere('firstname', 'like', '%'.$s.'%')->orwhere('lastname', 'like', '%'.$s.'%')->orwhere('email', 'like', '%'.$s.'%')->orWhere('telephone', 'like', '%'.$s.'%');})->get();
        }
        
    }

    public function map($volunteer): array
    {
        return [
            $volunteer->id,
            $volunteer->user->firstname,
            $volunteer->user->lastname,
            $volunteer->user->telephone,
            $volunteer->user->email,
            $volunteer->birth,
            $volunteer->street,
            $volunteer->house_number,
            $volunteer->city,
            $volunteer->ice,
            $volunteer->points,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Imię',
            'Nazwisko',
            'Numer telefonu',
            'Adres email',
            'Data urodzenia',
            'Ulica',
            'Numer domu / mieszkania',
            'Miasto',
            'Numer ICE',
            'Ilość punktów',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:K1')->applyFromArray([
                    'font' => ['bold' => true],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);
                $event->sheet->getStyle('A')->applyFromArray(['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]]);
                $event->sheet->getStyle('B:K')->applyFromArray(['alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT]]);
            }
        ];
    }
}
