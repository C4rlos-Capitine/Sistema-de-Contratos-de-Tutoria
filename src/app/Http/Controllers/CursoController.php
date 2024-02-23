<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso; // Change 'app\Models' to 'App\Models'
use App\Models\Categoria;
use App\Models\Disciplina;
use App\Models\Faculdade;
use App\Models\Lecionado_em;
use Illuminate\Support\Facades\DB;
class CursoController extends Controller
{
    public function register_form()
    {
        $faculdades = Faculdade::all();
        return view('curso.reg_form', ['faculdades'=>$faculdades]);
    }

    public function save(Request $data)
    {
        //return $data->all();
       try{
            $curso = new Curso;
            $curso->designacao_curso = $data->input('designacao_curso');
            $curso->sigla_curso = $data->input('sigla');
            $curso->id_faculdade_in_curso = $data->input('faculdade');
            $curso->save();
        return response()->json(['response' => 'Curso Registado com sucesso'], 201);
        } catch (\Exception $e) {
            return response()->json(['response' => $e->getMessage()], 500);
        }

        
    }
    public function get_all() {
        $cursos = Curso::select('*')
            ->join('faculdades', 'faculdades.id_faculdade', '=', 'cursos.id_faculdade_in_curso')->get();
        $htmlSnippet = view('curso.vizualisar', ['cursos' => $cursos])->render();
        return $htmlSnippet;
    }

    public function get_by_json(){
        $cursos = Curso::select('*')
        ->join('faculdades', 'faculdades.id_faculdade', '=', 'cursos.id_faculdade_in_curso')->get();
        return response()->json($cursos);
    }

    public function get_disciplinas_byano(Request $request)
    {
        //return $request->all();
        if($request->tipo_contrato == 1){
            $disciplinas = Lecionado_em::select("*")
            ->join('cursos', 'lecionado_ems.id_curso', '=', 'cursos.id_curso')
            ->join('disciplinas', 'lecionado_ems.codigo_disciplina', '=', 'disciplinas.codigo_disciplina')
            ->where('lecionado_ems.id_curso', '=', intval($request->id_curso))
            ->where('lecionado_ems.ano', '=', intval($request->ano))
            ->where('lecionado_ems.semestre', '=', intval($request->semestre))
            ->where('disciplinas.id_cat_disciplina', '!=', 3)
            ->get();
            return response()->json($disciplinas);
        }else{
            $disciplinas = Lecionado_em::select("*")
            ->join('cursos', 'lecionado_ems.id_curso', '=', 'cursos.id_curso')
            ->join('disciplinas', 'lecionado_ems.codigo_disciplina', '=', 'disciplinas.codigo_disciplina')
            ->where('lecionado_ems.id_curso', '=', intval($request->id_curso))
            ->where('lecionado_ems.ano', '=', intval($request->ano))
            ->where('lecionado_ems.semestre', '=', intval($request->semestre))
            ->where('disciplinas.id_cat_disciplina', '=', 3)
            ->get();
            return response()->json($disciplinas);
        }
        
    }

    public function disciplinas_nao_associada(Request $request){
        $result = DB::table('disciplinas')
        ->join('lecionado_ems', 'disciplinas.codigo_disciplina', '=', 'lecionado_ems.codigo_disciplina')
        ->where('lecionado_ems.id_curso', $request->id_curso)
        ->whereIn('disciplinas.codigo_disciplina', function ($query) use ($request) {
            $query->select('lecionado_ems.codigo_disciplina')
                ->from('lecionado_ems')
                ->where('lecionado_ems.id_curso', $request->id_curso)
                ->whereNotIn('lecionado_ems.codigo_disciplina', function ($subquery) use ($request) {
                    $subquery->select('disciplinas.codigo_disciplina')
                        ->from('lecionas')
                        ->join('disciplinas', 'lecionas.codigo_disciplina_in_leciona', '=', 'disciplinas.codigo_disciplina')
                        ->where('lecionas.id_curso_in_leciona', $request->id_curso);
                });
        })
        ->get();
    return response()->json(["response" => $result]);
    }  
    
    public function get_count_disciplinas_associadas(){
        $cursos = Curso::all();
        $totalDisciplinas = 0;
        $cursosCount = $cursos->count();
        $cada_curso = [];

        foreach ($cursos as $curso) {
            $count = DB::table('disciplinas')
                ->join('lecionado_ems', 'disciplinas.codigo_disciplina', '=', 'lecionado_ems.codigo_disciplina')
                ->where('lecionado_ems.id_curso', $curso->id_curso)
                ->whereIn('lecionado_ems.codigo_disciplina', function ($query) use ($curso) {
                    $query->select('lecionas.codigo_disciplina_in_leciona')
                        ->from('lecionas')
                        ->where('lecionas.ano_contrato', 2023)
                        ->where('lecionas.id_curso_in_leciona', $curso->id_curso);
                })
                ->count();
                
                $countLecionadoEmsCurso2 = DB::table('disciplinas')
                ->join('lecionado_ems', 'disciplinas.codigo_disciplina', '=', 'lecionado_ems.codigo_disciplina')
                ->where('lecionado_ems.id_curso', $curso->id_curso)
                ->count();
                
                $cada_curso[] = [
                    'id_curso' => $curso->id_curso,
                    'designacao_curso' => $curso->designacao_curso,
                    'nao_associadas' => $count,
                    'total_disciplinas' => $countLecionadoEmsCurso2,
                ];

            $totalDisciplinas += $count;
        }

        //return response()->json(['curso' => $cursos, 'total_cursos' => $cursosCount, 'cada_curso' => $cada_curso]);
        return $htmlSnippet = view('estatisticas', ['curso' => $cursos, 'total_cursos' => $cursosCount, 'cada_curso' => $cada_curso])->render();
       // echo "Total Disciplinas: " . $totalDisciplinas;
        //echo "Total Cursos: " . $cursosCount; // Display the total number of cursos
        

    }
    
}
