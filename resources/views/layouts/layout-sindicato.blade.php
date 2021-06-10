<?php
    $bannerFile = request()->syndicate['banner_file']['pathfile'] ?? null;
    $bannerPahtfile = request()->syndicate['banner_file']['namefile'] ?? null;
    $bannerLink = "/{$bannerFile}/{$bannerPahtfile}";
    $logoFile = request()->syndicate['logo_file']['pathfile'] ?? null;
    $logoPahtfile = request()->syndicate['logo_file']['namefile'] ?? null;
    $logoLink = "/{$logoFile}/{$logoPahtfile}";

    /**
     * Whatsapp
     */
    $syndicate = request()->syndicate;
    $whatsapp = request()->portal->whatsapp;
    $nameEntity = 'Portal dos Bancárioas-RS';
    
    if ($syndicate) {
        $whatsapp = $syndicate['whatsapp'];
        if ($syndicate['name']) {
            $nameEntity = $syndicate['name'];
        }
    }
    
    if ($whatsapp) {
        $whatsapp = 55 . preg_replace('/[^0-9]/', '', $whatsapp);
        $linkSocialMediaWhatsapp = "https://api.whatsapp.com/send?phone={$whatsapp}&text=Olá {$nameEntity}, acessei seu contato no Portal dos Bancários RS.";
    }

    //dd($whatsapp);
    //<div class="d-block"> <a title="Whatsapp" class="btSocialNetwork" href="{{ $linkSocialMediaWhatsapp }}"><img src="{{asset('/_site/assets/SVGs/Whatsapp-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
    //href="whatsapp://send?text={{$maisNoticias[$i]->title}} - {{url("/noticia/{$maisNoticias[$i]->id}")}}" title="Whatsapp" class="icon-whatsapp"
?>
@extends('layouts.layout')
    @section('css-syndicate')
        <link href="{{url(mix('/_site/css/pages/menu-sindicato.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    @endsection

    @section('top-syndicate')
        <!-- Banner TOP -->
        @if ($bannerFile && $bannerPahtfile)
        <a href="{{ route('sindicato') }}">
            <section id="top-banner">
                <div id="box-top-sindicato" class="container-fluid" style="background-image: url({{$bannerLink}}); height: 250px;">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col">
                                <img class="box-logo" src="{{ asset($logoLink) }}" height="130" />
                                <!-- <div class="box-logo" style=" background-image: url(' {{ asset($logoLink) }} ') ">
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </a>
        @endif
        <div id="menu-sindicato" class="container-fluid">
            <div class="container">
                <div class="row container-menus-sindicatos">

                    <div class="col-md-12 col-lg-7 col-texts">
                        <div class="legendas">MENU DO SINDICATO</div>
                        <div class="flex-texts">
                            <div><a href="{{ route('sindicato') }}">HOME</a></div>
                            <div class="separador">&nbsp;</div>
                            <div><a href="{{ route('sindicato-o-sindicato') }}">O SINDICATO</a></div>
                            <div class="separador">&nbsp;</div>
                            <div><a href="{{ route('sindicato-servicos') }}">SERVIÇOS</a></div>
                            <div class="separador">&nbsp;</div>
                            <div><a href="{{ route('sindicato-editais') }}">EDITAIS</a></div>
                            <div class="separador">&nbsp;</div>
                            <div><a href="{{ route('sindicato-sindicalize-se') }}">SINDICALIZE-SE</a></div>
                            <div class="separador">&nbsp;</div>
                            <div><a href="{{ route('sindicato-contato') }}">CONTATO</a></div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-lg-5">
                        <div class="legendas">REDES SOCIAIS DO SINDICATO</div>
                        <div class="flex-icons">
                            @if( request()->syndicate['facebook'] )
                                <div> <a href="{{url(request()->syndicate['facebook'])}}"><img src="{{asset('/_site/assets/SVGs/Brancos/facebook.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            @endif
                            @if( request()->syndicate['twitter'] )
                                <div> <a href="{{url(request()->syndicate['twitter'])}}"><img src="{{asset('/_site/assets/SVGs/Brancos/twitter.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            @endif
                            @if( request()->syndicate['instagram'] )
                            <div> <a href="{{url(request()->syndicate['instagram'])}}"><img src="{{asset('/_site/assets/SVGs/Brancos/instagram.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            @endif
                            
                            @if( request()->syndicate['whatsapp'] )
                            <div> <a title="Whatsapp" class="btSocialNetwork" href="{{ $linkSocialMediaWhatsapp }}"><img src="{{asset('/_site/assets/SVGs/Brancos/whatsapp.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            @endif

                            @if( request()->syndicate['podcast'] )
                                <div> <a href="{{url(request()->syndicate['podcast'])}}"><img src="{{asset('/_site/assets/SVGs/Brancos/podcasts.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            @endif
                            @if( request()->syndicate['youtube'] )
                                <div> <a href="{{url(request()->syndicate['youtube'])}}"><img src="{{asset('/_site/assets/SVGs/Brancos/youtube.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row title-menu-mobile">
                <div class="col-12">
                    <div class="text-tile-menu">MENU SINDICATO</div>
                    <div id="expand__menu--sindicato" class="d-lg-none">
                        <div class="rotate">
                            <img src="/_site/assets/expand-menu2.png" class="rounded-circle" />
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="clearfix"></div>

        </div>
        <!-- Fim Banner TOP -->
    @endsection

    @section('content')
        <section id="content-syndicate">
            @yield('content-syndicate')
        </section>
    @endsection
