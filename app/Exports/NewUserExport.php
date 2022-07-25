<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class NewUserExport implements FromCollection, WithHeadings, WithEvents
{
    protected $data;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function collection()
    {
        return $this->data;
       //return collect($this->data);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return [
            'id',
            'name',
            'email',
            'address'
        ];
    }

    /**
     * Write code on Method
     *
     * @return response()
     */ 
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $styleArray = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ];
                $event->sheet->getDelegate()->getStyle('A1:D1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFA500');
                $event->sheet->getDelegate()->getStyle('A1:D1')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('A1:D1')->getFont()->setSize(16);  
                $event->sheet->mergeCells('A1:D1')->setCellValue('A1', "THE SAMAJ");  
                $event->sheet->getDelegate()->getStyle('A2:B2')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFA500');
                $event->sheet->getDelegate()->getStyle('C2:D2')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('dc3545');
                $event->sheet->getDelegate()->getStyle('A2:D2')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('A2:D2')->getFont()->setSize(13);
                $event->sheet->mergeCells('A2:B2')->setCellValue('A2', "REPORT 1");
                $event->sheet->mergeCells('C2:D2')->setCellValue('C2', "REPORT 2");

                $event->sheet->getDelegate()->getStyle('A3:D3')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('A3:D3')->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle('A3:D3')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('58eeee');
                $event->sheet->setCellValue('A3', "ID");
                $event->sheet->setCellValue('B3', "NAME");
                $event->sheet->setCellValue('C3', "EMAIL ID");
                $event->sheet->setCellValue('D3', "ADDRESS");
                $i=4;
                foreach($this->data as $key=>$val){
                $event->sheet->setCellValue('A'.$i, @$val->id);
                $event->sheet->setCellValue('B'.$i, @$val->name);
                $event->sheet->setCellValue('C'.$i, @$val->email);
                $event->sheet->setCellValue('D'.$i, @$val->address);
                $i++;
                }
            },

        ];
    }
}