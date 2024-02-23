<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nivel;
use App\Models\Docente;
use App\Models\Curso;
use App\Models\Leciona;
use App\Models\Tipo_contrato;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;
class DocenteController extends Controller
{
    public function register_form(){
        $niveis = Nivel::all();
        $cursos = Curso::all();
        return view('docente.reg_form', ['niveis'=>$niveis, 'cursos'=>$cursos]);
    }

    public function save(Request $request){
        try {
            // Create a User record
            //return response()->json($request->all());
            
            $user = new User;
            $user->name = $request->nome; 
            $user->email = $request->email;
            $user->password = Hash::make('zxcvbnm');
            $user->tipo_user = 2;
            $user->save();
            
            $docente = new Docente;
            $docente->nome_docente = $request->nome;
            $docente->apelido_docente = $request->apelido;
            $docente->nuit = $request->nuit;
            $docente->bi = $request->bi;
            $docente->nacionalidade = $request->nacionalidade;
            $docente->id_nivel = $request->nivel;
            $docente->email = $request->email;
            $docente->id_curso_in_docente = $request->curso;
            $docente->save();
            
    
            return response()->json(['response' => 'Docente Registado com sucesso'], 201);
        } catch (\Exception $e) {
            return response()->json(['response' => $e->getMessage()], 500);
        }
    }

    public function find(Request $request)
    {
        $docente = Docente::select('*')
            ->join('nivels', 'nivels.id_nivel', '=', 'docentes.id_nivel')
            ->join('cursos', 'cursos.id_curso', '=', 'docentes.id_curso_in_docente')
            ->where('email', $request->email)
            ->first();
        //$docente = Docente::where('email', $request->email)
        //return response()->json($docente);
            return view('docente.dados', ['docente' => $docente])->render();
    }
 

    public function get_all(Request $request){
        $docente = Docente::select('*')
            ->join('nivels', 'nivels.id_nivel', '=', 'docentes.id_nivel')
            ->join('cursos', 'cursos.id_curso', '=', 'docentes.id_curso_in_docente')
            ->get();
        if(!isset($request->json)){
            
            return view('docente.vizualisar', ['docentes' => $docente])->render();
        }else{
            return response()->json($docente);
        }
        
        //return response()->json($docente);
    }

    public function get(){

    }

    public function alocar_disciplina(){
        $cursos = Curso::all();
        $tipos_contrato = Tipo_contrato::all();
        return view('docente.alocar_disciplinas_form', ['cursos' => $cursos, 'tipo_contrato'=>$tipos_contrato]);
    }

    public function add_disciplina(Request $request) {
        try {
            $leciona = new Leciona;
            $leciona->id_docente_in_leciona = $request->id_docente;
            $leciona->id_curso_in_leciona = $request->id_curso;
            $leciona->codigo_disciplina_in_leciona = $request->codigo_disciplina;
            $leciona->id_tipo_contrato_in_leciona = $request->tipo_contrato;
            $leciona->ano_contrato = date("Y");
            $leciona->save();
    
            $novo_registo = Leciona::select('*')
            ->join('docentes', 'lecionas.id_docente_in_leciona', '=', 'docentes.id_docente')
            ->join('cursos', 'lecionas.id_curso_in_leciona', '=', 'cursos.id_curso')
            ->join('disciplinas', 'lecionas.codigo_disciplina_in_leciona', '=', 'disciplinas.codigo_disciplina')
            ->where('lecionas.ano_contrato', '=', date('Y')) // Changed "ano" to "ano_contrato"
            ->where('lecionas.id_docente_in_leciona', '=', $request->id_docente)
            ->where('lecionas.id_curso_in_leciona', '=', $request->id_curso)
            ->where('lecionas.codigo_disciplina_in_leciona', '=', $request->codigo_disciplina)
            ->where('lecionas.id_tipo_contrato_in_leciona', $request->tipo_contrato)
            ->get();

            //'response' => 'disciplina alocada com sucesso', 
            return response()->json(['response' => 'disciplina alocada com sucesso','novo_registo' => $novo_registo], 201);
        } catch (\Exception $e) {
            return response()->json(['response' => $e->getMessage()], 500);
        }
    }

    public function get_disciplinas(Request $request)
    {
        try {
            //return response()->json($request->all());
            if(isset($request->tipo_contrato)){
                $disciplinas = Leciona::select("*")
                    ->join('docentes', 'lecionas.id_docente_in_leciona', '=', 'docentes.id_docente')
                    ->join('cursos', 'lecionas.id_curso_in_leciona', '=', 'cursos.id_curso')
                    ->join('disciplinas', 'lecionas.codigo_disciplina_in_leciona', '=', 'disciplinas.codigo_disciplina')
                    ->join('categorias', 'disciplinas.id_cat_disciplina', '=', 'categorias.id_cat_disciplina') // Add this join
                    ->leftJoin('lecionado_ems', function ($join) {
                        $join->on('lecionado_ems.id_curso', '=', 'lecionas.id_curso_in_leciona')
                            ->on('lecionado_ems.codigo_disciplina', '=', 'lecionas.codigo_disciplina_in_leciona');
                    })
                    ->where('lecionas.id_docente_in_leciona', $request->id_docente)
                    ->where('docentes.id_docente', $request->id_docente)
                    ->where('lecionas.id_tipo_contrato_in_leciona', $request->tipo_contrato)
                    ->get();

                }else{
                    $disciplinas = Leciona::select("*")
                    ->join('docentes', 'lecionas.id_docente_in_leciona', '=', 'docentes.id_docente')
                    ->join('cursos', 'lecionas.id_curso_in_leciona', '=', 'cursos.id_curso')
                    ->join('disciplinas', 'lecionas.codigo_disciplina_in_leciona', '=', 'disciplinas.codigo_disciplina')
                    ->join('categorias', 'disciplinas.id_cat_disciplina', '=', 'categorias.id_cat_disciplina') // Add this join
                    ->leftJoin('lecionado_ems', function ($join) {
                        $join->on('lecionado_ems.id_curso', '=', 'lecionas.id_curso_in_leciona')
                            ->on('lecionado_ems.codigo_disciplina', '=', 'lecionas.codigo_disciplina_in_leciona');
                    })
                    ->where('lecionas.id_docente_in_leciona', $request->id_docente)
                    ->where('docentes.id_docente', $request->id_docente)
                    
                    ->get();
                }
            return response()->json(['response' => $disciplinas], 201);
        } catch (\Exception $e) {
            return response()->json(['response' => $e->getMessage()], 500);
        }
        
    
    }

    public function get_all_disciplinas(Request $request){
        try {
            //return response()->json($request->all());
            $disciplinas = Leciona::select("*")
                ->join('docentes', 'lecionas.id_docente_in_leciona', '=', 'docentes.id_docente')
                ->join('cursos', 'lecionas.id_curso_in_leciona', '=', 'cursos.id_curso')
                ->join('disciplinas', 'lecionas.codigo_disciplina_in_leciona', '=', 'disciplinas.codigo_disciplina')
                ->join('categorias', 'disciplinas.id_cat_disciplina', '=', 'categorias.id_cat_disciplina') // Add this join
                ->leftJoin('lecionado_ems', function ($join) {
                    $join->on('lecionado_ems.id_curso', '=', 'lecionas.id_curso_in_leciona')
                        ->on('lecionado_ems.codigo_disciplina', '=', 'lecionas.codigo_disciplina_in_leciona');
                })
                ->where('lecionas.id_docente_in_leciona', $request->id_docente)
                ->where('docentes.id_docente', $request->id_docente)
                
                ->get();

                
            return response()->json(['response' => $disciplinas], 201);
        } catch (\Exception $e) {
            return response()->json(['response' => $e->getMessage()], 500);
        }
    }
}
