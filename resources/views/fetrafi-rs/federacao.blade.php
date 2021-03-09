@extends('layouts.layout-fetrafi-rs')
@section('css')
    <link href="{{url(mix('/_site/css/pages/fetrafi-rs/o-fetrafi-rs.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content-syndicate')

<section id="o-sindicato">

    <div class="container">
        <!-- BK -->
        <!-- <div class="title-page fetrafi-rs mt-5 mb-5">
            A Federacao
        </div>

        <div class="mt-4"></div>
        
        <div class="mt-3 mb-3"></div>
        <p>
            A FEDERAÇÃO DOS TRABALHADORES E TRABALHADORAS EM INSTITUIÇÕES FINANCEIRAS DO RIO GRANDE DO SUL utiliza a sigla FETRAFI-RS e foi fundada em 1º de Maio de 1943. Trata-se de uma entidade que representa 38 sindicatos filiados, integrantes da categoria profissional dos Trabalhadores e Trabalhadoras em Instituições Financeiras, sem fins lucrativos, com abrangência em todo o território do Rio Grande do Sul, com sede e foro em Porto Alegre/RS.
        </p> -->
        
        <div class="title-page fetrafi-rs mt-5 mb-5">
            A Federacao
        </div>

        <div class="mt-4"></div>
        
        <div class="mt-3 mb-3"></div>
        
        <!-- Colocar aqui o texto institucional -->
        {!! request()->fetrafirs->textInstitucional ?? '' !!}
        
    </div>
    
</section>

@endsection
