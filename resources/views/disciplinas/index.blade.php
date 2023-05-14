<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Disciplinas", 'rota' => "disciplinas.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('disciplina') disciplinas @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <!-- Utiliza o componente "datalist" criado -->
            <x-datatable 
                title="Disciplinas" 
                crud="disciplinas" 
                :header="['id', 'nome','curso']" 
                :data="$dados"
                :hide="[true, false, false]" 
                :button="['show' => true,'delete' => true]" 
            />

        </div>
    </div>
@endsection