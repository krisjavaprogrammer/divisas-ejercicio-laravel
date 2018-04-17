<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Divisa;

use Excel;

use App\Exports\InvoicesExport;


class ExportExcelController extends Controller
{
    //

    public function index(Request $request)
    {

    	$del = $request->input('del');
    	$al  = $request->input('al');

    	// $divisas = Divisa::whereBetween('fecha',
    	// 				 [$del, $al])->get();

    	return Excel::download(new InvoicesExport($del,$al), 'divisas.xlsx');

    }
}
