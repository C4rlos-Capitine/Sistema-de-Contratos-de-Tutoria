<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;
use App;
class PDFController extends Controller
{
    public function generate(Request $request){
       
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }
}
