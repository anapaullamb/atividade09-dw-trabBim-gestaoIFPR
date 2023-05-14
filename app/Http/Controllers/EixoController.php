<?php

namespace App\Http\Controllers;
Use \App\Models\Eixo;
Use \App\Http\Requests\StoreEixoRequest;

use Illuminate\Http\Request;

class EixoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    
    public function index() {
        $dados = Eixo::all();
        $eixos = "Eixos";
        error_log($dados);
        return view('eixos.index', compact(['dados', 'eixos']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eixos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEixoRequest $request)
    {
        Eixo::create(['nome' =>  $request->nome]);
        return redirect()->route('eixos.index');
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
        $dados = Eixo::find($id);    
        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }
        return view('eixos.edit', compact('dados')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEixoRequest $request, $id)
    {
        $obj = Eixo::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => $request->nome
        ]);

        $obj->save();
        return redirect()->route('eixos.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Eixo::find($id);
        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }
        Eixo::destroy($id);
        return redirect()->route('eixos.index');
    }
}
