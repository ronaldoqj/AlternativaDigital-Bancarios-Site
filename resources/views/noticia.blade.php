<?php
    $noticia = $return['noticia'];
?>
@extends('layouts.layout')
@section('css')
    <link href="{{url(mix('/_site/css/pages/news.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('content')

<!-- Banner TOP -->
<section id="top-banner">
    @switch($noticia->tipoDaNoticia)
        @case('noticia-video')
            <div class="container">
                <iframe width="100%" height="352" src="https://www.youtube.com/embed/{{$noticia->videoYoutube}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        @break

        @default
            @if ($noticia->fileImagemDestaque_pathfile != '')
                <div class="container" style='background-image: url({{asset("/{$noticia->fileImagemDestaque_pathfile}/{$noticia->fileImagemDestaque_namefile}")}}); height: 350px;'></div>    
            @endif
    @endswitch
</section>
<!-- Fim Banner TOP -->

<section id="noticias">
    <div class="container">
    
        @switch($noticia->tipoDaNoticia)

            @case('noticia-destaque')

                <div class="row controls-of-news">

                    <div class="col col-md-10 offset-md-1 box__social--midia">

                        <div class="d-flex bd-highlight SHARED__icons__socials--midia">
                            
                            <div> <div class="titulo-btns">Compartilhar</div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Facebook-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Twitter-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Instagram-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Whatsapp-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            
                            <div class="ml-auto"> <div class="titulo-btns">Ampliar fonte</div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Diminuir.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Aumentar.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                        </div>
                    
                    </div>

                </div>
                

                <div class="row COMPONENTE__news--with--only-text mb-2">
                    <div class="col-12 __news--right">
                        <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>#{{$noticia->tags}}</span></div>
                        <div class="__text--2">{{ $noticia->titulo }}</div>
                    </div>
                </div>
                
            @break

            @case('noticia-video')
                <div class="row controls-of-news">

                    <div class="col col-md-10 offset-md-1 box__social--midia">

                        <div class="d-flex bd-highlight SHARED__icons__socials--midia">
                            
                            <div> <div class="titulo-btns">Compartilhar</div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Facebook-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Twitter-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Instagram-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Whatsapp-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            
                            <div class="ml-auto"> <div class="titulo-btns">Ampliar fonte</div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Diminuir.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Aumentar.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                        </div>
                    
                    </div>
                
                </div>

                <div class="row COMPONENTE__news--with--only-text">
                    <div class="col-12 __news--right">
                        <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>#{{$noticia->tags}}</span></div>
                        <div class="__text--2">{{ $noticia->titulo }}</div>
                    </div>
                </div>
            @break

            @case('noticia-imagem')
                <div class="row controls-of-news">

                    <div class="col col-md-10 offset-md-1 box__social--midia">

                        <div class="d-flex bd-highlight SHARED__icons__socials--midia">
                            
                            <div> <div class="titulo-btns">Compartilhar</div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Facebook-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Twitter-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Instagram-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Whatsapp-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            
                            <div class="ml-auto"> <div class="titulo-btns">Ampliar fonte</div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Diminuir.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Aumentar.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                        </div>
                    
                    </div>
                
                </div>

                <div class="row COMPONENTE__news--with--only-text">
                    <div class="col-12 __news--right">
                        <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>#{{$noticia->tags}}</span></div>
                        <div class="__text--2">{{ $noticia->titulo }}</div>
                    </div>
                </div>
            @break
            
            @case('noticia-podcast')
                <div class="row controls-of-news">

                    <div class="col col-md-10 offset-md-1 box__social--midia">

                        <div class="d-flex bd-highlight SHARED__icons__socials--midia">
                            
                            <div> <div class="titulo-btns">Compartilhar</div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Facebook-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Twitter-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Instagram-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Whatsapp-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            
                            <div class="ml-auto"> <div class="titulo-btns">Ampliar fonte</div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Diminuir.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Aumentar.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                        </div>
                    
                    </div>

                </div>

                <div class="row COMPONENTE__news--with--only-text">
                    <div class="col-12 __news--right">
                        <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>#{{$noticia->tags}}</span></div>
                        <div class="__text--2">{{ $noticia->titulo }}</div>
                    </div>
                </div>

                <div class="container mt-4 mb-4">
                    <div class="row COMPONENTE__news--with--audio">
                        <div class="col-12 __news--right" style="padding: 0;">
                            <div class="__espectro--audio d-flex align-items-center">
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
            @break
            
            @case('noticia-simples')
                <div class="row controls-of-news">

                    <div class="col col-md-10 offset-md-1 box__social--midia">

                        <div class="d-flex bd-highlight SHARED__icons__socials--midia">
                            
                            <div> <div class="titulo-btns">Compartilhar</div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Facebook-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Twitter-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Instagram-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Whatsapp-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            
                            <div class="ml-auto"> <div class="titulo-btns">Ampliar fonte</div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Diminuir.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Aumentar.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                        </div>
                    
                    </div>

                </div>
                

                <div class="row COMPONENTE__news--with--only-text mb-2">
                    <div class="col-12 __news--right">
                        <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>#{{$noticia->tags}}</span></div>
                        <div class="__text--2">{{ $noticia->titulo }}</div>
                    </div>
                </div> 
            @break

        @endswitch

        {!! $noticia->texto !!}

    </div>
</section>

<div class="h-5"></div>

<section id="news" class="container">

    <div class="title-page">
        <span>OUTRAS MATÉRIAS</span> <!-- <span>BANCO</span> -->
    </div>


    <!-- $return['sugestoes'] -->


    @foreach ($return['sugestoes'] as $sugestao)

        @switch($sugestao->tipoDaNoticia)

            @case('noticia-destaque')
            <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

            <a href="/noticia/{{$sugestao->id}}/{{str_replace(' ', '-', $sugestao->titulo)}}">
            <div class="row COMPONENTE__news--with--image">
                <div class="col-12 col-lg-5 __news--left">
                    <div style='background-image: url({{asset("/{$sugestao->fileImagemDestaque_pathfile}/{$sugestao->fileImagemDestaque_namefile}")}}); height: 250px'></div>
                </div>
                <div class="col-12 col-lg-7 __news--right">
                    <div class="__text--1">{{ $sugestao->cartola }} | {{ \Carbon\Carbon::parse($sugestao->dataInclusao)->format('d/m/Y') }} <span>#{{$sugestao->tags}}</span></div>
                    <div class="__text--2">{{ $sugestao->titulo }}</div>
                    <div class="__text--3">{{ $sugestao->linhaDeApoio }}</div>
                </div>
            </div>
            </a>
            @break

            @case('noticia-video')
            <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

            <a href="/noticia/{{$sugestao->id}}/{{str_replace(' ', '-', $sugestao->titulo)}}">
            <div class="row COMPONENTE__news--with--video">
                <div class="col-12 col-lg-5 __news--left">
                    <iframe width="100%" height="252" src="https://www.youtube.com/embed/{{$sugestao->videoYoutube}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-12 col-lg-7 __news--right">
                    <div class="__text--1">{{ $sugestao->cartola }} | {{ \Carbon\Carbon::parse($sugestao->dataInclusao)->format('d/m/Y') }} <span>#{{$sugestao->tags}}</span></div>
                    <div class="__text--2">{{ $sugestao->titulo }}</div>
                    <div class="__text--3">{{ $sugestao->linhaDeApoio }}</div>
                </div>
            </div>
            </a>
            @break

            @case('noticia-imagem')
            <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

            <a href="/noticia/{{$sugestao->id}}/{{str_replace(' ', '-', $sugestao->titulo)}}">
            <div class="row COMPONENTE__news--with--image">
                <div class="col-12 col-lg-5 __news--left">
                    <div style='background-image: url({{asset("/{$sugestao->fileImagemDestaque_pathfile}/{$sugestao->fileImagemDestaque_namefile}")}}); height: 250px'></div>
                </div>
                <div class="col-12 col-lg-7 __news--right">
                    <div class="__text--1">{{ $sugestao->cartola }} | {{ \Carbon\Carbon::parse($sugestao->dataInclusao)->format('d/m/Y') }} <span>#{{$sugestao->tags}}</span></div>
                    <div class="__text--2">{{ $sugestao->titulo }}</div>
                    <div class="__text--3">{{ $sugestao->linhaDeApoio }}</div>
                </div>
            </div>
            </a>
            @break

            @case('noticia-podcast')
                <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

                <a href="/noticia/{{$sugestao->id}}/{{str_replace(' ', '-', $sugestao->titulo)}}">
                <div class="row COMPONENTE__news--with--audio">
                    <div class="col-12 __news--right">
                    <div class="__text--1">{{ $sugestao->cartola }} | {{ \Carbon\Carbon::parse($sugestao->dataInclusao)->format('d/m/Y') }} <span>#{{$sugestao->tags}}</span></div>
                        <div class="__text--2">{{ $sugestao->titulo }}</div>
                        <div class="__espectro--audio d-flex align-items-center">
                        <div></div>
                        </div>
                        <div class="__text--3">{{ $sugestao->linhaDeApoio }}</div>
                    </div>
                </div>
                </a>
            @break

            @case('noticia-simples')
                <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>
                
                <a href="/noticia/{{$sugestao->id}}/{{str_replace(' ', '-', $sugestao->titulo)}}">
                <div class="row COMPONENTE__news--with--only-text">
                    <div class="col-12 __news--right">
                        <div class="__text--1">{{ $sugestao->cartola }} | {{ \Carbon\Carbon::parse($sugestao->dataInclusao)->format('d/m/Y') }} <span>#{{$sugestao->tags}}</span></div>
                        <div class="__text--2">{{ $sugestao->titulo }}</div>
                        <div class="__text--3">{{ $sugestao->linhaDeApoio }}</div>
                    </div>
                </div>
                </a>
            @break

        @endswitch

    @endforeach

</section>

@endsection
