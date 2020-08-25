<?php
    $noticiaDestaqueFirst = $return['noticiaDestaqueFirst'];
?>

@extends('layouts.layout')
@section('css')
    <link href="{{url(mix('/_site/css/pages/home.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content')
<!-- Banner TOP -->
<a href="/noticia/{{$noticiaDestaqueFirst->id}}/{{str_replace(' ', '-', $noticiaDestaqueFirst->titulo)}}">
<section id="top-banner">
    <div class="container" style='background-image: url({{asset("/{$noticiaDestaqueFirst->fileImagemDestaque_pathfile}/{$noticiaDestaqueFirst->fileImagemDestaque_namefile}")}}); height: 350px;'>
        <div class="row align-items-end">
            <div class="col cols__texts">

                <div class="col-12 col-lg-9 container-text-1">#{{ $noticiaDestaqueFirst->tags }}</div>
                <div class="container-text-2">{{ $noticiaDestaqueFirst->cartola }} | {{ \Carbon\Carbon::parse($noticiaDestaqueFirst->dataInclusao)->format('d/m/Y') }} </div>
                <div class="col-12 col-lg-9 container-text-3">{{ $noticiaDestaqueFirst->titulo }}</div>

            </div>
        </div>
    </div>
</section>
</a>
<!-- Fim Banner TOP -->

<section id="news" class="container">

@forelse ($return['noticias'] as $noticia)

    @switch($noticia->tipoDaNoticia)

        @case('noticia-destaque')
        <!-- BLOCO NOTICIA IMAGEM -->
                
        <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

        <a href="/noticia/{{$noticia->id}}/{{str_replace(' ', '-', $noticia->titulo)}}">
        <div class="row COMPONENTE__news--with--image">
            <div class="col-12 col-lg-5 __news--left">
                <div style='background-image: url({{asset("/{$noticia->fileImagemDestaque_pathfile}/{$noticia->fileImagemDestaque_namefile}")}}); height: 250px'></div>
            </div>
            <div class="col-12 col-lg-7 __news--right">
                <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>#{{$noticia->tags}}</span></div>
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

            <a href="/noticia/{{$noticia->id}}/{{str_replace(' ', '-', $noticia->titulo)}}">
            <div class="row COMPONENTE__news--with--video">
                <div class="col-12 col-lg-5 __news--left">
                    <!-- <iframe width="100%" height="252" src="https://www.youtube.com/embed/LcTqbMFVars" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                    <iframe width="100%" height="252" src="https://www.youtube.com/embed/{{$noticia->videoYoutube}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <!-- ONDE ERA O VÍDEO
                    <div style="background-image: url({{asset('/_site/assets/Home/video_corona.jpg')}}); height: 250px">
                        <div class="container">
                            <div class="row align-items-center text-center">
                                <div class="col">
                                    <img src="{{asset('/_site/assets/player.png')}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    -->
                </div>
                <div class="col-12 col-lg-7 __news--right">
                    <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>#{{$noticia->tags}}</span></div>
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

            <a href="/noticia/{{$noticia->id}}/{{str_replace(' ', '-', $noticia->titulo)}}">
            <div class="row COMPONENTE__news--with--image">
                <div class="col-12 col-lg-5 __news--left">
                    <div style='background-image: url({{asset("/{$noticia->fileImagemDestaque_pathfile}/{$noticia->fileImagemDestaque_namefile}")}}); height: 250px'></div>
                </div>
                <div class="col-12 col-lg-7 __news--right">
                    <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>#{{$noticia->tags}}</span></div>
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
                    <a href="/noticia/{{$noticia->id}}/{{str_replace(' ', '-', $noticia->titulo)}}">
                        <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>#{{$noticia->tags}}</span></div>
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
                </div>
                <a href="/noticia/{{$noticia->id}}/{{str_replace(' ', '-', $noticia->titulo)}}">
                    <div class="__text--3">{{ $noticia->linhaDeApoio }}</div>
                </a>
            </div>

            <!-- FIM - BLOCO NOTICIA AUDIO -->
        @break


        @case('noticia-simples')
            <!-- BLOCO NOTICIA NORMAL -->

            <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>
                
            <a href="/noticia/{{$noticia->id}}/{{str_replace(' ', '-', $noticia->titulo)}}">
            <div class="row COMPONENTE__news--with--only-text">
                <div class="col-12 __news--right">
                    <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>#{{$noticia->tags}}</span></div>
                    <div class="__text--2">{{ $noticia->titulo }}</div>
                    <div class="__text--3">{{ $noticia->linhaDeApoio }}</div>
                </div>
            </div>
            </a>

            <!-- FIM - BLOCO NOTICIA NORMAL -->	
        @break

    @endswitch

@empty
    <p>Não foram encontradas notícias cadastradas</p>
@endforelse

	
</section>

@endsection
