<?php

namespace App\Http\Controllers;
Use \App\Models\Curso;
Use \App\Models\Disciplina;
Use \App\Http\Requests\StoreDisciplinaRequest;

use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Disciplina::all();
        $disciplinas = "Disciplinas";
        foreach($dados as $item){
            $curso = Curso::find($item['curso']);
            $item['curso'] = $curso['nome'];
        }
        return view('disciplinas.index', compact(['dados', 'disciplinas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('disciplinas.create', compact(['cursos']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDisciplinaRequest $request)
    {
        Disciplina::create([
            'nome' =>  $request->nome,
            'carga' =>  $request->carga,
            'curso' =>  $request->curso
        ]);
        return redirect()->route('disciplinas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = Disciplina::find($id);  
        $curso = Curso::find($dados['curso']);
        $dados['curso'] = $curso['nome'];
        return view('disciplinas.show', compact(['dados'])); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Disciplina::find($id);    
        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }
        $cursos = Curso::all();
        return view('disciplinas.edit', compact(['dados', 'cursos']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDisciplinaRequest $request, $id)
    {
        $obj = Disciplina::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' =>  $request->nome,
            'carga' =>  $request->carga,
            'curso' =>  $request->curso
        ]);

        $obj->save();
        return redirect()->route('disciplinas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Disciplina::find($id);
        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }
        Disciplina::destroy($id);
        return redirect()->route('disciplinas.index');
    }
}
