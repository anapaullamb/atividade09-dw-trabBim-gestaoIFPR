<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Ver Professor"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Professores @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')
<div class="row">
    <div class="col" >
        <div class="form-floating mb-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ativo" value=1 id="ativo1"  {{ ( $dados['ativo'] == 1) ? 'checked' : '' }} disabled>
                <label class="form-check-label" for="ativo1">Ativo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ativo" value=0 id="ativo2" {{ ( $dados['ativo'] == 0) ? 'checked' : '' }} disabled>
                <label class="form-check-label" for="ativo2">Inativo</label>
            </div>
        </div>

        <div class="form-floating mb-3">
            <input  type="text"  class="form-control " disabled
                value="{{$dados['nome']}}"
            />
            <label for="nome">Nome do Professor</label>
        </div>
        <div class="form-floating mb-3">
            <input  type="email"  class="form-control" disabled
                value="{{$dados['email']}}"
            />
            <label for="email">E-mail do Professor</label>
        </div>
        <div class="form-floating mb-3">
            <input  type="number"  class="form-control" disabled
                value="{{$dados['siape']}}"
            />
            <label for="siape">SIAPE do Professor</label>
        </div>
        <div class="form-floating mb-3">
            <label class="sr-only" for="eixo">Eixo / Area</label>
            <div class="input-group">
                <div class="input-group-prepend">
                        <div class="input-group-text">Eixo / Area</div>
                </div>
                    <input  type="text"  class="form-control" disabled 
                        value="{{$dados['eixo']}}"
                    />
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="{{route('professores.index')}}" class="btn btn-secondary btn-block align-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
            </svg>
            &nbsp; Voltar
        </a>
    </div>
</div>
@endsection