<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromQuery;

use App\Divisa;
use Exportable;


class InvoicesExport implements FromCollection
{

    public function __construct($del, $al)
    {	
    	$this->del = $del;
    	$this->al = $al;
        
    }

    public function collection()
    {
        return Divisa::whereBetween('fecha',[$this->del, $this->al])->get();
    }
}
