<?php
    $bannerFile = session()->get('sindicato')['banner_file']['pathfile'];
    $bannerPahtfile = session()->get('sindicato')['banner_file']['namefile'];
    $bannerLink = "/{$bannerFile}/{$bannerPahtfile}";
    $logoFile = session()->get('sindicato')['logo_file']['pathfile'];
    $logoPahtfile = session()->get('sindicato')['logo_file']['namefile'];
    $logoLink = "/{$logoFile}/{$logoPahtfile}";
?>
@extends('layouts.layout')
    @section('css-syndicate')
        <link href="{{url(mix('/_site/css/pages/menu-sindicato.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    @endsection

    @section('top-syndicate')
        <!-- Banner TOP -->
        <a href="/sindicato">
            <section id="top-banner">
                <div id="box-top-sindicato" class="container-fluid" style="background-image: url({{$bannerLink}}); height: 250px;">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="box-logo">
                                    <img src="{{asset($logoLink)}}" height="100" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </a>

        <div id="menu-sindicato" class="container-fluid">
            <div class="container">
                <div class="row container-menus-sindicatos">

                    <div class="col-md-12 col-lg-7 col-texts">
                        <div class="legendas">MENU DO SINDICATO</div>
                        <div class="flex-texts">
                            <div><a href="{{ route('sindicato-home') }}">HOME</a></div>
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
                            <div> <a href="https://www.facebook.com/seeb.camaqua"><img src="{{asset('/_site/assets/SVGs/Brancos/facebook.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/twitter.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/instagram.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/whatsapp.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/podcasts.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/youtube.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
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
