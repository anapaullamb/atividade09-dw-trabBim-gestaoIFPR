<?php

namespace App\Http\Controllers;
Use \App\Models\Eixo;
Use \App\Models\Curso;
Use \App\Http\Requests\StoreCursoRequest;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Curso::all();
        $cursos = "Cursos";
        error_log($dados);
        return view('cursos.index', compact(['dados', 'cursos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eixos = Eixo::all();
        return view('cursos.create', compact(['eixos']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCursoRequest $request)
    {
        Curso::create([
            'nome' =>  $request->nome,
            'sigla' =>  $request->sigla,
            'tempo' =>  $request->tempo,
            'eixo' =>  $request->eixo
        ]);
        return redirect()->route('cursos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = Curso::find($id);  
        $eixo = Eixo::find($dados['eixo']);
        $dados['eixo'] = $eixo['nome'];
        return view('cursos.show', compact('dados')); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Curso::find($id);    
        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }
        $eixos = Eixo::all();
        return view('cursos.edit', compact(['dados', 'eixos']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCursoRequest $request, $id)
    {
        $obj = Curso::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' =>  $request->nome,
            'sigla' =>  $request->sigla,
            'tempo' =>  $request->tempo,
            'eixo' =>  $request->eixo
        ]);

        $obj->save();
        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Curso::find($id);
        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }
        Curso::destroy($id);
        return redirect()->route('cursos.index');
    }
}
