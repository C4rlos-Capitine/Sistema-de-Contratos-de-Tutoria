<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculdade;

class FaculdadeController extends Controller
{
    public function register_form()
    {
        return view('faculdade.reg_form');
    }

    public function save(Request $data)
    {
        // Validation rules
        /*$rules = [
            'nome_faculdade' => 'required|string|max:255',
            'sigla_faculdade' => 'required|string|max:10',
        ];
    
        $validator = Validator::make($data->all(), $rules);*/
        //return $data->all();
        /*if ($validator->fails()) {
            return response()->json(['response' => $validator->errors()], 422);
        }*/
    
        try {
            $faculdade = new Faculdade;
            $faculdade->nome_faculdade = $data->input('nome_faculdade');
            $faculdade->sigla_faculdade = $data->input('sigla_faculdade');
            $faculdade->save();
            
            return response()->json(['response' => 'Faculdade registrada com sucesso']);
        } catch (\Exception $e) {
            return response()->json(['response' => $e->getMessage()], 500);
        }
    }
    
    
    public function get_all() {
        $faculdade = Faculdade::all();
        $htmlSnippet = view('faculdade.vizualisar', ['faculdades' => $faculdade])->render();
        return $htmlSnippet;
    }

    public function get_disciplinas(Request $request)
    {

    }
    
}
