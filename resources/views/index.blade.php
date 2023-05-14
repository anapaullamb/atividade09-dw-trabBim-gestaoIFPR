<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ["",""])
<!-- Preenche o conteúdo da seção "titulo" -->
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

 
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-4">Trabalho Bimestral!</h1>
          <p class="lead">O trabalho bimestral tem como objetivo o desenvolvimento de uma aplicação web que contemple todos os conteúdos lecionados até o momento na disciplina de Desenvolvimento Web II. A aplicação em questão será um sistema de gerenciamento de cursos, disciplinas e professores;</p>
        
        </div>
      </div>          

      <div class="container">
      <hr class="my-4">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-3">
            <h2>Eixos</h2>
            <p><a class="btn btn-secondary" href="{{route('eixos.index')}}" role="button">Gerencie seus eixos &raquo;</a></p>
          </div>
          <div class="col-md-3">
            <h2>Cursos</h2>
            <p><a class="btn btn-secondary" href="{{route('cursos.index')}}" role="button">Gerencie seus cursos &raquo;</a></p>
          </div>
          <div class="col-md-3">
            <h2>Professores</h2>
            <p><a class="btn btn-secondary" href="{{route('professores.index')}}" role="button">Gerencie seus professores &raquo;</a></p>
          </div>
          <div class="col-md-3">
            <h2>Disciplinas</h2>
            <p><a class="btn btn-secondary" href="{{route('disciplinas.index')}}" role="button">Gerencie suas disciplinas &raquo;</a></p>
          </div>
        </div>

        <hr>

      </div> <!-- /container -->
@endsection