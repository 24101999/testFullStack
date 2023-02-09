<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PdfController extends Controller
{
    public function pdf()
    {

        $dados = DB::table('contatos')->get();

        $pdf = PDF::loadView('pdf');

        return $pdf->setPaper('a4')->stream('relatorio.pdf');

        \print_r(\json_encode($dados));
    }
}
