<?php

namespace App\Exports;

use App\Models\Interview;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InterviewExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Interview::with('response')->get();
    }


    public function map($row): array
    {
        // Define your column values here
        return [
            $row->id,
            $row->name,
            $row->email,
            $row->age,
            $row->no_tlp,
            $row->last_education,
            $row->education_name,
            $row->response->type,
            $row->response->type == 'ditolak' ? '-' : $row->response->schedule,
        ];
    }

    public function headings(): array {
        return ['No', 'Nama', 'Email', 'Umur', 'No Tlp', 'Pendidikan Terakhir', 'Nama Pendidikan', 'Status','Schedule'];
    }
}
