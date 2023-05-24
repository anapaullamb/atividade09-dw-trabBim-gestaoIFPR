<?php

namespace App\Http\Controllers;

Use \App\Models\Professor;
Use \App\Models\Disciplina;
Use \App\Models\ProfessoresDisciplinas;
use Illuminate\Http\Request;

class ProfessoresDisciplinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $vinculos = ProfessoresDisciplinas::all();
        $disciplinas = Disciplina::all();
        $professores = Professor::all();
        foreach($professores as $item){
            if($item['ativo'] == 0){
                unset($professores[$item['id']-1]);
            }
        }
        foreach($disciplinas as $item){
            foreach($vinculos as $vinculo){
                if($vinculo['disciplina'] == $item['id']){
                    $item['professor'] = $vinculo['professor'];
                    break;
                }
            }
        }
        return view('professoresDisciplinas.index', compact(['disciplinas','professores']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
     public function findVinculoByIdDisciplina( $disciplina){
        error_log("entrou aq");
        $vinculos = ProfessoresDisciplinas::all();
        foreach($vinculos as $item){
            if($item['disciplina'] == $disciplina){
                error_log("entrou aq2");
                return ProfessoresDisciplinas::find($item['id']);
            }
        }
        return null;

    }
    public function store(Request $request)
    {
        $vinculos = ProfessoresDisciplinas::all();
        $disciplinas = Disciplina::all();
        foreach($disciplinas as $item){
            if($request->{"selectProfessorDisciplina_{$item['id']}"} != null){
                $professor = $request->{"selectProfessorDisciplina_{$item['id']}"};
                $obj = $this->findVinculoByIdDisciplina($item['id']);
                error_log($obj);
                if($obj == null){
                    ProfessoresDisciplinas::create([
                        'disciplina' =>  $item['id'],
                        'professor' =>  $professor
                    ]);
                    error_log("criado");
                }else{
                    $obj->fill([
                        'disciplina' =>  $item['id'],
                        'professor' =>  $professor
                    ]);
                    $obj->save();
                    error_log("editado");
                }
            }else{
                $obj = $this->findVinculoByIdDisciplina($item['id']);
                if($obj != null){
                    ProfessoresDisciplinas::destroy($obj['id']);
                }
            }
        }
        return view('index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
