<?php
//dump(request());
// dump(request()->portal->facebook);
// dd(request()->fetrafirs);
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('metatags')

        <title>{{ config('app.name', 'Portal Bancários RS') }}</title>

        <link rel="icon" type="image/x-icon" href="ico_portal.svg">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{ url(mix('/_site/css/plugins.css')) }}" />
        <link rel="stylesheet" type="text/css" href="{{ url(mix('/_site/css/mCustomScrollbar.css')) }}" />
        <link rel="stylesheet" type="text/css" href="{{ url(mix('/_site/css/template.css')) }}" />

        <!-- Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        @yield('css-syndicate')
        @yield('css')
        @yield('js-before')
        <script src="{{ url(mix('/_site/js/svg-inject.min.js')) }}"></script>
        
        <!-- Facebook SDK -->
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                appId            : '419848051455948',
                autoLogAppEvents : true,
                xfbml            : true,
                version          : 'v9.0'
                });
            };
        </script>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-3YEGYVT5X6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-3YEGYVT5X6');
        </script>
    </head>
    <body>
        <nav id="sidebar" class="">
            <div id="dismiss">
                <!-- <i class="fas fa-arrow-left"></i> -->
                X
            </div>

            <div class="sidebar-header">
                <a href="{{ route('home') }}">
                    <img src="/_site/assets/bancariosrs.svg" class="img-fluid logo" onload="SVGInject(this)" width="220" />
                </a>
            </div>

            <ul class="list-unstyled components">
                <p>Menu</p>
                <li class="active">
                    <a href="{{ route('home') }}">Página Inicial</a>
                </li>
                <li>
                    <a href="{{route('fetrafi-rs')}}">Fetrafi-RS</a>
                </li>
                <!-- <li>
                    <a href="http://www.fetrafirs.org.br/intranet/" target="_blank">Área Restrita</a>
                </li> -->
                <li>
                    <a href="{{route('editais')}}">Editais</a>
                </li>
                <li>
                    <a href="{{route('acordos-e-convencoes')}}">Acordos e Convenções</a>
                </li>
                <li>
                    <a href="{{route('meu-sindicato')}}">Meu Sindicato</a>
                </li>
                <li>
                    <a href="{{route('entidades-parceiras')}}">Entidades Parceiras</a>
                </li>
            </ul>

            <ul class="list-unstyled components">
                <p>Redes Sociais</p>

                <div class="redes-sociais">
                    <div class="d-flex justify-content-between">
                        @if( request()->portal->facebook )
                            <div ><a target="_blank" href="{{url(request()->portal->facebook)}}"><img src="{{asset('/_site/assets/SVGs/Brancos/facebook.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                        @endif
                        @if( request()->portal->twitter )
                            <div ><a target="_blank" href="{{url(request()->portal->twitter)}}"><img src="{{asset('/_site/assets/SVGs/Brancos/twitter.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                        @endif
                        @if( request()->portal->instagram )
                            <div ><a target="_blank" href="{{url(request()->portal->instagram)}}"><img src="{{asset('/_site/assets/SVGs/Brancos/instagram.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="d-block d-lg-none"><a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/whatsapp.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                        @if( request()->portal->podcast )
                            <div ><a target="_blank" href="{{url(request()->portal->podcast)}}"><img src="{{asset('/_site/assets/SVGs/Brancos/podcasts.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                        @endif
                        @if( request()->portal->youtube )
                            <div ><a target="_blank" href="{{url(request()->portal->youtube)}}"><img src="{{asset('/_site/assets/SVGs/Brancos/youtube.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                        @endif
                    </div>
                </div>
            </ul>

            <ul class="list-unstyled components">
                <p>Contato</p>                
                <div class="contato">
                    @if( request()->portal->fone )
                    <div class="d-flex ">
                        <div><img src="{{asset('/_site/assets/SVGs/icon-telefone.svg')}}" class="img-fluid" /></div>
                        <div>{{ request()->portal->fone }}</div>
                    </div>
                    @endif
                    @if( request()->portal->email )
                    <div class="d-flex ">
                        <div><img src="{{asset('/_site/assets/SVGs/icon-caracter-arroba.svg')}}" class="img-fluid" /></div>
                        <div>{{ request()->portal->email }}</div>
                    </div>
                    @endif
                </div>
            </ul>

            <!-- <ul class="list-unstyled components">
                <p>Entidades Parceiras</p>

                <div class="contato">
                    <div class="d-flex">
                        <div style="width: 25%;"><img src="{{asset('/_site/assets/SVGs/logo-cut.svg')}}" class="img-fluid" /></div>
                        <div style="width: 55%;"><img src="{{asset('/_site/assets/SVGs/logo-contraf.svg')}}" class="img-fluid" /></div>
                    </div>
                </div>
            </ul> -->
        </nav>

        <main>
            <!-- showMenu2 -->
            <header id="top-of-site" class="">
                <div class="container">

                    <div class="row align-items-center">

                        <div id="sidebarCollapse" class="col-2 col-lg-1 order-2 order-lg-1 hamburguer">
                            <img src="/_site/assets/hamburguer.png" class="img-fluid" />
                        </div>
                        <div id="logo" class="col-8 col-lg-3 order-3 order-lg-2">
                            <!-- Second Menu -->
                            <div id="expand__menu2" class="d-lg-none">
                                <img src="/_site/assets/expand-menu2.png" class="rounded-circle" />
                            </div>
                            <a href="{{ route('home') }}">
                                <img src="/_site/assets/bancariosrs.svg" class="img-fluid logo" onload="SVGInject(this)"  />
                            </a>
                        </div>
                        <div id="menus" class="col-12 col-lg-6 offset-lg-2 order-1 order-lg-3">
                            <nav>
                                <h2 id="title-redes-sociais" class="d-lg-none text-center">REDES SOCIAIS</h2>
                                <div id="social-buttons" class="container-fluid">
                                    <div class="row">
                                        <div class="col">
                                            @if( request()->portal->facebook )
                                                <div ><a target="_blank" href="{{url(request()->portal->facebook)}}"><img src="{{asset('/_site/assets/SVGs/Brancos/facebook.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                                            @endif
                                            @if( request()->portal->twitter )
                                                <div ><a target="_blank" href="{{url(request()->portal->twitter)}}"><img src="{{asset('/_site/assets/SVGs/Brancos/twitter.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                                            @endif
                                            @if( request()->portal->instagram )
                                                <div ><a target="_blank" href="{{url(request()->portal->instagram)}}"><img src="{{asset('/_site/assets/SVGs/Brancos/instagram.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                                            @endif
                                            
                                            <div class="d-block d-lg-none"><a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/whatsapp.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                                            
                                            @if( request()->portal->podcast )
                                                <div ><a target="_blank" href="{{url(request()->portal->podcast)}}"><img src="{{asset('/_site/assets/SVGs/Brancos/podcasts.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                                            @endif
                                            @if( request()->portal->youtube )
                                                <div ><a target="_blank" href="{{url(request()->portal->youtube)}}"><img src="{{asset('/_site/assets/SVGs/Brancos/youtube.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <form action="{{route('search')}}" method="POST">
                                @csrf
                                <div id="filters" class="row mx-md-n6">
                                    <div class="col-12 col-sm-6 order-2 order-sm-1">

                                        <div class="btn-group combo-box">
                                            <button type="button" id="btn-banco" class="btn btn-secondary dropdown-toggle btn-sm" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                                                {{ $return['bancoSelecionado'] ?? 'Meu Banco' }}
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                <a href="{{ url('/?banco=0') }}"><button class="dropdown-item" type="button"> Todos Bancos </button></a>
                                                @forelse (request()->bancos as $sessionBanco)
                                                    <a href="{{ url('?banco='.$sessionBanco->id) }}"><button class="dropdown-item" type="button">{{$sessionBanco->name}}</button></a>
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-sm-6 order-1 order-sm-2">
                                        <div class="input-group input-group-sm input-busca">
                                            
                                            <input type="text" class="form-control" name="search" placeholder="Busca" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">BUSCAR</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </nav>
                        </div>

                    </div>

                </div>
            </header>

            <section id="content">

                @yield('top-syndicate')
                @yield('content')

            </section>

        </main>

        <footer class="footer">
            <section>
                <div class="container">
                    <div class="row">
                        <div class="box__footer--logos">
                            <div class="col brand-footer">
                                <a href="{{route('fetrafi-rs')}}" target="_self">
                                    <img src="/_site/assets/fetrafirs.svg" class="img-fluid" onload="SVGInject(this)" height="30"/>
                                </a>
                            </div>

                            <div class="col text-right brand-alternativa-digital">
                                <a href="http://alternativadigital.com.br/" target="_blank">
                                    <img src="/_site/assets/SVGs/Footer/alternativa-digital.svg" class="img-fluid " width="200" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </footer>

        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <!-- Plugins -->
        <script src="{{ url(mix('/_site/js/plugins.js')) }}"></script>
        
        
        <!-- Scripts -->
        <script src="{{ url(mix('/_site/js/template.js')) }}"></script>
        
        @yield('js')

    </body>
</html>
