<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Professores", 'rota' => "professores.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('curso') professores @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <!-- Utiliza o componente "datalist" criado -->
            <x-datatable 
                title="Professores" 
                crud="professores" 
                :header="['id', 'nome','eixo', 'status']" 
                :data="$dados"
                :hide="[true, false, false,false]" 
                :button="['show' => true,'delete' => false, 'vinculo' => true]" 
            />

        </div>
    </div>
@endsection