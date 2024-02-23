<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Disciplina;
use App\Models\Curso;
use App\Models\Lecionado_em;

class DisciplinaController extends Controller
{
    public function register_form()
    {
        $categoria = Categoria::all();
        return view('disciplina.reg_form' , ['categorias'=>$categoria]);
    }

    public function save(Request $data)
    {
        /*$data->validate([
            'codigo_disciplina' => ['string', 'required', Rule::exists('codigo_disciplina', 'disciplinas')],
            'nome_disciplina' => ['string', 'required', Rule::exists('codigo_disciplina', 'disciplinas')],
        ]);
*/
        $disciplina = new Disciplina;
        $disciplina->codigo_disciplina = $data->input('codigo_disciplina');
        $disciplina->nome_disciplina = $data->input('nome_disciplina');
        $disciplina->id_cat_disciplina = $data->input('id_categoria');
        $disciplina->sigla_disciplina = $data->input('sigla');
        $disciplina->save();

        return response()->json(['response' => 'Categoria Registado com sucesso']);
    }

    public function get_disciplinas_only(){
        $disciplina = Disciplina::select('*')
            ->join('categorias', 'categorias.id_cat_disciplina', '=', 'disciplinas.id_cat_disciplina')->get();
            return response()->json($disciplina);
    }
    public function get_all(Request $request) {
        $disciplina = Disciplina::select('*')
            ->join('categorias', 'categorias.id_cat_disciplina', '=', 'disciplinas.id_cat_disciplina')
            ->join('lecionado_ems', 'lecionado_ems.codigo_disciplina', '=', 'disciplinas.codigo_disciplina')
            ->where('lecionado_ems.id_curso', $request->id_curso)
            ->get();
       return view('disciplina.vizualisar', ['disciplinas' => $disciplina])->render();
        //return response()->json($disciplina);
    }

    public function get_discplinas_json() {
        $disciplina = Disciplina::select('*')
            ->join('categorias', 'categorias.id_cat_disciplina', '=', 'disciplinas.id_cat_disciplina')
            ->join('lecionado_ems', 'lecionado_ems.codigo_disciplina', '=', 'disciplinas.codigo_disciplina')
            ->get();
       //return view('disciplina.vizualisar', ['disciplinas' => $disciplina])->render();
        return response()->json($disciplina);
    }

    public function get_disciplinas_curso(Request $request) {
        
    }

    public function associar_form(){
        return view('disciplina.associar_com_curso');
    }

    public function associar_ao_curso(Request $request)
    {
        //return response()->json(['response',$request->all()]);
        try{
        $disciplina_lecionada_em = new Lecionado_em;
        $disciplina_lecionada_em->id_curso = $request->id_curso;
        $disciplina_lecionada_em->codigo_disciplina = $request->codigo_disciplina;
        $disciplina_lecionada_em->ano = $request->ano;
        $disciplina_lecionada_em->semestre = $request->semestre;
        $disciplina_lecionada_em->horas_contacto = $request->horas_c;
        $disciplina_lecionada_em->save();
        return response()->json(['response' => 'Disciplina associada com sucesso'], 201);
        } catch (\Exception $e) {
            return response()->json(['response' => $e->getMessage()], 500);
        }
    }
}
