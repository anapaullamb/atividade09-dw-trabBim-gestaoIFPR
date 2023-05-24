<?php

namespace App\Http\Controllers;
Use \App\Models\Eixo;
Use \App\Models\Professor;
Use \App\Http\Requests\StoreProfessorRequest;
Use \App\Http\Requests\EditProfessorRequest;

use Illuminate\Http\Request;


class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Professor::all();
        foreach($dados as $item){
            $eixo = Eixo::find($item['eixo']);
            $item['eixo'] = $eixo['nome'];
            $item['status'] = $item['ativo'] == 0 ? 'inativo' : 'ativo';
        }
        $professores = "Professores";
        return view('professores.index', compact(['dados', 'professores']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eixos = Eixo::all();
        return view('professores.create', compact(['eixos']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfessorRequest $request)
    {
        Professor::create([
            'nome' =>  $request->nome,
            'email' =>  $request->email,
            'siape' =>  $request->siape,
            'ativo' =>  $request->ativo,
            'eixo' =>  $request->eixo
        ]);
        return redirect()->route('professores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = Professor::find($id);  
        $eixo = Eixo::find($dados['eixo']);
        $dados['eixo'] = $eixo['nome'];
        return view('professores.show', compact('dados')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Professor::find($id);    
        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }
        $eixos = Eixo::all();
        return view('professores.edit', compact(['dados', 'eixos']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProfessorRequest $request, $id)
    {
        $obj = Professor::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }
        $obj->fill([
            'nome' =>  $request->nome,
            'email' =>  $request->email,
            'siape' =>  $request->siape,
            'ativo' =>  $request->ativo,
            'eixo' =>  $request->eixo
        ]);

        $obj->save();
        return redirect()->route('professores.index');
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
