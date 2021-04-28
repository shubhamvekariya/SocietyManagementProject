<?php

namespace App\Exports;

use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class VisitorExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping
{
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:H1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => array(
                            'argb' => '000000',
                        )
                    ]
                ]);
            },
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Visitor::select('parking_details.*', 'visitors_details.*')->leftjoin('parking_details', 'visitors_details.id', '=', 'parking_details.visitor_id')->join('users', 'users.id', '=', 'visitors_details.user_id')->join('apartments', 'users.id', '=', 'apartments.user_id')->where('apartments.society_id', Auth::user()->society_id)->where('visitors_details.approved_at', '!=', null)->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'name',
            'phoneno',
            'address',
            'reason_to_meet',
            'entry_time',
            'exit_time',
            'User Name',
        ];
    }

    public function map($visitor): array
    {
        return [
            $visitor->id,
            $visitor->name,
            $visitor->phoneno,
            $visitor->address,
            $visitor->reason_to_meet,
            $visitor->entry_time,
            $visitor->exit_time,
            $visitor->user->name
        ];
    }
}
