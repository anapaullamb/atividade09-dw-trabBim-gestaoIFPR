<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Alterar Professor"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Professores @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

<form action="{{ route('professores.update', $dados['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col" >
                <div class="form-floating mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ativo" value=1 id="ativo1"  {{ ( $dados['ativo'] == 1) ? 'checked' : '' }}>
                        <label class="form-check-label" for="ativo1">Ativo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ativo" value=0 id="ativo2" {{ ( $dados['ativo'] == 0) ? 'checked' : '' }}>
                        <label class="form-check-label" for="ativo2">Inativo</label>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input  type="text"  class="form-control @error('nome') is-invalid @enderror" 
                        name="nome" 
                        placeholder="Nome"
                        value="{{$dados['nome']}}"
                    />
                    @error('nome')
                    <div class="invalid-feedback">
                            {{$message}}
                    </div>
                    @enderror
                    <label for="nome">Nome do Professor</label>
                </div>
                <div class="form-floating mb-3">
                    <input  type="email"  class="form-control @error('email') is-invalid @enderror" 
                        name="email" 
                        placeholder="Email"
                        value="{{$dados['email']}}"
                    />
                    @error('email')
                    <div class="invalid-feedback">
                            {{$message}}
                    </div>
                    @enderror
                    <label for="email">E-mail do Professor</label>
                </div>
                <div class="form-floating mb-3">
                    <input  type="number"  class="form-control @error('siape') is-invalid @enderror" 
                        name="siape" 
                        placeholder="SIAPE"
                        value="{{$dados['siape']}}"
                    />
                    @error('siape')
                    <div class="invalid-feedback">
                            {{$message}}
                    </div>
                    @enderror
                    <label for="siape">SIAPE do Professor</label>
                </div>
                <div class="form-floating mb-3">
                    <label class="sr-only" for="eixo">Eixo</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                                <div class="input-group-text">Eixo</div>
                        </div>
                        <select class="form-control @error('eixo') is-invalid @enderror" id="eixo" name="eixo">
                            @foreach ($eixos as $item)
                                <option value="{{ $item['id'] }}" {{ ( $item['id'] == $dados['eixo']) ? 'selected' : '' }}>{{ $item['nome'] }}</option>
                                
                            @endforeach
                        </select>
                        @error('eixo')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror
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
            <a href="javascript:document.querySelector('form').submit();" class="btn btn-success btn-block align-content-center">
                Confirmar &nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
            </a>
        </div>
    </div>

@endsection