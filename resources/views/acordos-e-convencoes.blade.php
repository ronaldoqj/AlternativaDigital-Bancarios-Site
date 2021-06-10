<?php
    $linkSocialMediaFacebook = url('editais');
    $linkSocialMediaTwitter = '&url=' . url('editais');

    $imagePortalToShare = '';
    if ( isset(request()->portal->dataLogo['pathfile']) && isset(request()->portal->dataLogo['namefile']) )
    {
        $imagePortalToShare = asset(request()->portal->dataLogo['pathfile'] . '/' . request()->portal->dataLogo['namefile']);
    }
?>

@extends('layouts.layout')

@section('metatags')
<meta property="og:url"          content="{{$linkSocialMediaFacebook}}" />
<meta property="og:type"         content="website" />
<meta property="og:title"        content="Portal dos bancários-rs - Acordos e Convenções " />
<?php /*
<meta property="og:description" content="{{$noticia->subtitulo}}" />
<meta property="og:image"       content="{{$urlImage}}" />
*/ ?>
<meta name="twitter:card"        content="summary_large_image">
<meta name="twitter:creator"     content="@fetrafi_rs">
<meta name="twitter:description" content="Acordos e Convenções ">
<meta name="twitter:domain"      content="Portal Bancários RS ">
<meta name="twitter:image"       content="{{ $imagePortalToShare }}">
<meta name="twitter:site"        content="@fetrafi_rs">
<meta name="twitter:title"       content="Acordos e Convenções">
@endsection

@section('css')
    <link href="{{asset('/_site/css/pages/acordos-e-convencoes.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('content')
<section id="acordos-e-convencoes" class="container">

<div class="title-page">
    Acordos e Convenções
</div>
 

<div class="accordionStandard" id="accordionStandard">
    @foreach($list as $key => $ano)
    <div class="card">
        <div class="card-header">
            <div class="box--header {{$loop->first ? '' : 'collapsed'}}" data-toggle="collapse" data-target="#collapse-{{$loop->iteration}}" aria-expanded="{{$loop->first ? 'true' : 'false'}}" aria-controls="collapse-{{$loop->iteration}}">
                <div class="title--header">{{$key}}</div>
            </div>
        </div>
        <div id="collapse-{{$loop->iteration}}" class="collapse {{$loop->first ? 'show' : ''}}" aria-labelledby="headingOne" data-parent="#accordionStandard">
            <div class="card-body">
                <!-- Sub-Collapse -->
                <?php
                    $arrayEntidades = ['Aditiva - RS', 'Fenaban', 'Banco do Brasil'];
                ?>

                @foreach($ano as $key2 => $entidade)
                <h2 data-toggle="collapse" data-target="#sub-collapse-{{$loop->parent->iteration}}-{{$loop->iteration}}" aria-expanded="{{$loop->first ? 'true' : 'false'}}" aria-controls="sub-collapse-{{$loop->iteration}}">
                    {{$key2}}
                </h2>

                <div id="sub-collapse-{{$loop->parent->iteration}}-{{$loop->iteration}}" class="row __card--acordion  collapse {{$loop->first ? 'show' : ''}}">

                    @foreach($entidade as $key3 => $edital)
                    <div class="col-12 col-md-6 __card--box">
                        <div class="__card--content">
                            <div class="__text--1">{{$edital->cartola}}</div>
                            <div class="__text--2">{{$edital->titulo}}</div>
                            <div class="__text--3">{{$edital->linhaDeApoio}}</div>

                            <div class="__icons--editais">
                                <div class="SHARED__download"> <a href='{{url("/acordos-e-convencoes/download/{$edital->id}")}}'><img src="{{asset('/_site/assets/SVGs/baixar-edital.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            </div>

                            <div class="titulo-btns">Compartilhar</div>
                            <div class="SHARED__icons__socials--midia">
                                <div> <a title="Facebook" class="btSocialNetwork" href="{{ $linkSocialMediaFacebook }}"> <img src="{{asset('/_site/assets/SVGs/Facebook-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                                <div> <a title="Twitter" class="btSocialNetwork" href="{{ $edital->titulo . $linkSocialMediaTwitter }}"> <img src="{{asset('/_site/assets/SVGs/Twitter-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                                <div class="d-block d-lg-none"> <a title="Whatsapp" title="Whatsapp" href="whatsapp://send?text={{$edital->titulo}} - {{url("/acordos-e-convencoes")}}" ><img src="{{asset('/_site/assets/SVGs/Whatsapp-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            </div>

                            <div class="clear-fix"></div>
                        </div>
                    </div>
                    @endforeach

                </div>
                @endforeach
                <!-- Sub-Collapse Fim -->
            </div>
        </div>
    </div>
    @endforeach
</div>

</section>
@endsection
