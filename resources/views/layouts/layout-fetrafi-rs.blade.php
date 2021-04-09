<?php
    $banner = '';
    $logo = '';

    if (request()->fetrafirs->dataBanner) {
        $banner = request()->fetrafirs->dataBanner['pathfile'] .'/'. request()->fetrafirs->dataBanner['namefile'];
    }
    if (request()->fetrafirs->dataLogo) {
        $logo = request()->fetrafirs->dataLogo['pathfile'] .'/'. request()->fetrafirs->dataLogo['namefile'];
    }
?>

@extends('layouts.layout')
    @section('css-syndicate')
        <link href="{{url(mix('/_site/css/pages/menu-fetrafi-rs.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    @endsection

    @section('top-syndicate')
        <!-- Banner TOP -->
        <section id="top-banner">
            <div id="box-top-fetrafi-rs" class="container-fluid" style="background-image: url({{asset($banner)}}); height: 250px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col cols__texts--fetrafi-rs">
                            
                            <div><a href="/fetrafi-rs"><img src="{{asset($logo)}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                            <div><a href="http://www.fetrafirs.org.br/intranet/" target="_blank"><img src="{{asset('/_site/assets/_FetrafiRS/acesso-area-restrita.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="menu-fetrafi-rs" class="container-fluid">
            <div class="container">
                <div class="row container-menus-fetrafi-rs">
                
                    <div class="col col-texts">
                        <div class="legendas">MENU FETRAFI-RS</div>
                        <div class="flex-texts">
                            <div><a href="{{ route('fetrafi-rs-federacao') }}">A FEDERAÇÃO</a></div>
                            <div class="separador">&nbsp;</div>
                            <!-- <div><a href="{{ route('fetrafi-rs-servicos') }}">SERVIÇOS</a></div> -->
                            <div class="separador">&nbsp;</div>
                            <div><a href="http://www.fetrafirs.org.br/intranet/" target="_blank">ÁREA RESTRITA</a></div>
                            <div class="separador">&nbsp;</div>
                            <div><a href="{{ route('fetrafi-rs-contato') }}">CONTATO</a></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row title-menu-mobile">
                <div class="col-12">
                    <div class="text-tile-menu">MENU FETRAFI-RS</div>
                    <div id="expand__menu--fetrafi-rs" class="d-lg-none">
                        <div class="rotate">
                            <img src="/_site/assets/expand-menu2-fetrafi-rs.png" class="rounded-circle" />
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
