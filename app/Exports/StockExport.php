<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StockExport implements FromCollection, WithHeadings, WithMapping
{
    protected $data;
    protected $month;

    public function __construct($data, $month)
    {
        $this->data = $data;
        $this->month = $month;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'Stock Code',
            'Transaction Month',
            'Total Volume',
            'Total Value',
            'Total Frequency'
        ];
    }

    public function map($row): array
    {
        return [
            $row->stock_code,
            $this->getMonthName($this->month),
            number_format($row->transaksiHarians->sum('total_volume')),
            number_format($row->transaksiHarians->sum('total_value')),
            number_format($row->transaksiHarians->sum('total_frequency'))
        ];
    }

    private function getMonthName($month)
    {
        return date('F', mktime(0, 0, 0, $month, 1));
    }
}