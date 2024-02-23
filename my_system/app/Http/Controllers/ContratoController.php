<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
class ContratoController extends Controller
{
    public function create(Request $request)
    {
        $contrato = new Contrato;
        $contrato->id_docente_in_contrato = $request->id_docente;
        $contrato->id_tipo_contrato_in_contrato = $request->id_contrato;
    }
}
