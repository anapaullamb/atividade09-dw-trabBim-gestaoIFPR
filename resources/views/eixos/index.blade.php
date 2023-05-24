<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Eixos e Áreas", 'rota' => "eixos.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('eixo') eixos @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <!-- Utiliza o componente "datalist" criado -->
            <x-datatable 
                title="Eixos e Áreas" 
                crud="eixos" 
                :header="['id', 'nome']" 
                :data="$dados"
                :hide="[true, false]" 
                :button="['show' => false,'delete' => true, 'vinculo' => false]" 
            />

        </div>
    </div>
@endsection