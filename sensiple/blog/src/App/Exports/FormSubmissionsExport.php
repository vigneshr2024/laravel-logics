<?php

namespace Sensiple\Blog\App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Sensiple\Blog\App\Models\Form;
use Sensiple\Blog\App\Models\FormSubmission;

class FormSubmissionsExport implements FromCollection,WithHeadings
{
    protected $data;
    protected $headers;

    public function __construct($headers,$data)
    {
        $this->headers = $headers;
        $this->data    = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return $this->headers;
    }

}
