<?php
    $linkSocialMediaFacebook = url('editais');
    $linkSocialMediaTwitter = '&url=' . url('editais');

    $imageSyndicateToShare = '';
    if ( isset(request()->syndicate['logo_file']['pathfile']) && isset(request()->syndicate['logo_file']['namefile']) )
    {
        $imageSyndicateToShare = asset(request()->syndicate['logo_file']['pathfile'] . '/' . request()->syndicate['logo_file']['namefile']);
    }
?>
@extends('layouts.layout-sindicato')


@section('metatags')
<meta property="og:url"          content="{{$linkSocialMediaFacebook}}" />
<meta property="og:type"         content="website" />
<meta property="og:title"        content="Portal dos bancários-rs - Editais" />
<?php /*
<meta property="og:description" content="{{$noticia->subtitulo}}" />
<meta property="og:image"       content="{{$urlImage}}" />
*/ ?>
<meta name="twitter:card"        content="summary_large_image">
<meta name="twitter:creator"     content="@fetrafi_rs">
<meta name="twitter:description" content="Editais ">
<meta name="twitter:domain"      content="Portal Bancários RS ">
<meta name="twitter:image"       content="{{ $imageSyndicateToShare }}">
<meta name="twitter:site"        content="@fetrafi_rs">
<meta name="twitter:title"       content="Edital">
@endsection

@section('css')
<link href="{{asset('/_site/css/pages/sindicatos/editais.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content-syndicate')


<section id="editais" class="container">
    <div class="container">
        <div class="title-page"> Editais </div>

        @forelse($editais as $item)

        @if($loop->iteration % 2 == 1)
        <div class="row __news--editais">
        @endif
            <div class="col-12 col-md-6 __news--box">
                <div class="__news--content">
                    <div class="__text--1">{{ $item->cartola }} | {{ \Carbon\Carbon::parse($item->dataInclusao)->format('d/m/Y') }} <!--span>#{{$item->tags}}</span--></div>
                    <div class="__text--2">{{ $item->titulo }}</div>
                    <div class="__text--3">{{ $item->linhaDeApoio }}</div>

                    <div class="__icons--editais">
                        <div class="SHARED__download"> <a href='{{ url("/editais/download/{$item->id}") }}'><img src="{{asset('/_site/assets/SVGs/baixar-edital.svg')}}" class="img-fluid" onload="SVGInject(this)" title="{{ $item->file_namefile }}" /></a> </div>
                    </div>

                    <div class="titulo-btns">Compartilhar</div>
                    <div class="SHARED__icons__socials--midia">
                        <div> <a title="Facebook" class="btSocialNetwork" href="{{ $linkSocialMediaFacebook }}"> <img src="{{asset('/_site/assets/SVGs/Facebook-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                        <div> <a title="Twitter" class="btSocialNetwork" href="{{ $item->titulo . $linkSocialMediaTwitter }}"> <img src="{{asset('/_site/assets/SVGs/Twitter-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                        <div class="d-block d-lg-none"> <a title="Whatsapp" title="Whatsapp" href="whatsapp://send?text={{$item->titulo}} - {{url("/sindicato/editais")}}" ><img src="{{asset('/_site/assets/SVGs/Whatsapp-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                    </div>

                    <div class="clear-fix"></div>
                </div>
            </div>
        @if($loop->iteration % 2 == 0 || $loop->last)
        </div>
        @endif

        @empty
        <div class="emptyRegisters">Não há editais no momento</div>
        <hr>
        @endforelse
    </div>
</section>

@endsection
