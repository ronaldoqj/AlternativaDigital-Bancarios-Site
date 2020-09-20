<?php
    $fieldSearch = $return['fieldSearch'];
    $noticias = $return['noticias'];
    $linkComplemento = '';
?>

@extends('layouts.layout')
@section('css')
    <link href="{{url(mix('/_site/css/pages/search.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content')
<section id="page--search" class="container">

    <div class="title-page">
        Pesquisa
    </div>

    <form action="{{route('search')}}" method="POST" class="fieldsRounded">
        @csrf
        <div class="row mb-3">
            <div class="col-12 col-md-12 mt-5">
                <div class="form-group">
                    <label for="nome">Pesquisar</label>
                    <input type="text" class="form-control" id="search" name="search" value="{{ $fieldSearch ?? '' }}" placeholder="Digite sua pesquisa">
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary btn-block">
            <div>Pesquisar</div>
        </button>
    </form>
    <br>
    <br class="mb-5">


    @forelse ($noticias as $noticia)

        @switch($noticia->tipoDaNoticia)

            @case('noticia-destaque')
            <!-- BLOCO NOTICIA IMAGEM -->
            <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

            <a href="/{{$linkComplemento}}noticia/{{$noticia->id}}/{{str_replace(' ', '-', $noticia->titulo)}}">
            <div class="row COMPONENTE__news--with--image">
                <div class="col-12 col-lg-5 __news--left">
                    <div style='background-image: url({{asset("/{$noticia->fileImagemDestaque_pathfile}/{$noticia->fileImagemDestaque_namefile}")}}); height: 250px'></div>
                </div>
                <div class="col-12 col-lg-7 __news--right">
                    <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>{{-- '#' --}}{{-- $noticia->tags --}}</span></div>
                    <div class="__text--2">{{ $noticia->titulo }}</div>
                    <div class="__text--3">{{ $noticia->linhaDeApoio }}</div>
                </div>
            </div>
            </a>
            <!-- FIM - BLOCO NOTICIA IMAGEM -->
            @break

            @case('noticia-video')
                <!-- BLOCO NOTICIA VÍDEO -->
                <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

                <a href="/{{$linkComplemento}}noticia/{{$noticia->id}}/{{str_replace(' ', '-', $noticia->titulo)}}">
                <div class="row COMPONENTE__news--with--video">
                    <div class="col-12 col-lg-5 __news--left">
                        <iframe width="100%" height="252" src="https://www.youtube.com/embed/{{$noticia->videoYoutube}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="col-12 col-lg-7 __news--right">
                        <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>{{-- '#' --}}{{-- $noticia->tags --}}</span></div>
                        <div class="__text--2">{{ $noticia->titulo }}</div>
                        <div class="__text--3">{{ $noticia->linhaDeApoio }}</div>
                    </div>
                </div>
                </a>
                <!--FIM -  BLOCO NOTICIA VÍDEO -->
            @break

            @case('noticia-imagem')
                <!-- BLOCO NOTICIA IMAGEM -->
                <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

                <a href="/{{$linkComplemento}}noticia/{{$noticia->id}}/{{str_replace(' ', '-', $noticia->titulo)}}">
                <div class="row COMPONENTE__news--with--image">
                    <div class="col-12 col-lg-5 __news--left">
                        <div style='background-image: url({{asset("/{$noticia->fileImagemDestaque_pathfile}/{$noticia->fileImagemDestaque_namefile}")}}); height: 250px'></div>
                    </div>
                    <div class="col-12 col-lg-7 __news--right">
                        <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>{{-- '#' --}}{{-- $noticia->tags --}}</span></div>
                        <div class="__text--2">{{ $noticia->titulo }}</div>
                        <div class="__text--3">{{ $noticia->linhaDeApoio }}</div>
                    </div>
                </div>
                </a>
                <!-- FIM - BLOCO NOTICIA IMAGEM -->
            @break


            @case('noticia-podcast')
                <!-- BLOCO NOTICIA AUDIO -->
                <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>
                
                <div class="row COMPONENTE__news--with--audio">
                    <div class="col-12 __news--right">
                        <a href="/{{$linkComplemento}}noticia/{{$noticia->id}}/{{str_replace(' ', '-', $noticia->titulo)}}">
                            <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>{{-- '#' --}}{{-- $noticia->tags --}}</span></div>
                            <div class="__text--2">{{ $noticia->titulo }}</div>
                        </a>
                        <div class="player__audio">
                            <div class="__espectro--audio d-flex align-items-center" rel="stop">
                                <div class="control__play-Pause"></div>
                            </div>
                            <audio controls >
                                <source src="{{url($noticia->filePodcast_pathfile. '/' .$noticia->filePodcast_namefile)}}" type="{{ $noticia->filePodcast_mimetype }}">
                                Seu navegador de internet não suporta o elemento do tipo audio.
                            </audio>
                        </div>
                        <a href="/{{$linkComplemento}}noticia/{{$noticia->id}}/{{str_replace(' ', '-', $noticia->titulo)}}">
                            <div class="__text--3">{{ $noticia->linhaDeApoio }}</div>
                        </a>
                    </div>
                </div>
                <!-- FIM - BLOCO NOTICIA AUDIO -->
            @break


            @case('noticia-simples')
                <!-- BLOCO NOTICIA NORMAL -->
                <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>
                    
                <a href="/{{$linkComplemento}}noticia/{{$noticia->id}}/{{str_replace(' ', '-', $noticia->titulo)}}">
                <div class="row COMPONENTE__news--with--only-text">
                    <div class="col-12 __news--right">
                        <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>{{-- '#' --}}{{-- $noticia->tags --}}</span></div>
                        <div class="__text--2">{{ $noticia->titulo }}</div>
                        <div class="__text--3">{{ $noticia->linhaDeApoio }}</div>
                    </div>
                </div>
                </a>
                <!-- FIM - BLOCO NOTICIA NORMAL -->	
            @break

        @endswitch

    @empty
        <h1 class="mt-5">Não foram encontradas notícias cadastradas</h1>
    @endforelse

	
</section>

@endsection
