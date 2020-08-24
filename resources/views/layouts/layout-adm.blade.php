<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('metatags')

        <title>{{ config('app.name-adm', 'Bancários') }}</title>

        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <!-- vuetify CSS -->
        <link rel="stylesheet" type="text/css" href="{{ url(mix('/_adm/css/app.css')) }}" />
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">    
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined">

        <!-- Icons -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
        @yield('css-syndicate')
        @yield('css')

        <!-- Scripts -->
        <script src="{{ asset('_adm/js/app.js') }}" defer></script>
        <script src="{{ asset('_site/js/svg-inject.min.js') }}"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        @yield('js')
    </head>
    <body>

        @yield('beforeDivApp')

        <div id="app">
        <v-app id="inspire">
            
            {{-- Input hidden responsavel por inserir dados da sessão para o Vue --}}
            <!-- <input type="hidden" v-bind:value="$global.auth = {{json_encode( (array) session()->get('auth') )}}" /> -->

            <div id="menu-sidebar" class="">
                <div id="box-nav">
                    <nav>
                        <sidebar-menu-component></sidebar-menu-component>
                        @yield('menu-sidebar')
                    </nav>
                </div>
            </div>

            <div id="content">
                <main id="main">
                    <header id="header">
                        <div class="box-left-right">
                            <div class="left">
                                <div class="title-header"> @yield('title') </div>
                                <div class="subtitle-header"> @yield('subtitle') </div>
                            </div>
                            <div class="right">
                                <div class="user">
                                    <div class="profile" style="background-image: url('{{asset('_adm/assets/profile-default.jpg')}}');">
                                    </div>
                                </div>
                                <div class="texts">
                                    <p>Nome do usuário logado</p>
                                    <p><span>emailuser@user.com.br</span></p>
                                    <p>corporação do usuário</p>
                                </div>

                                <div class="logout">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <img src="/_adm/assets/SVGs/icon-logout.svg" class="img-fluid" onload="SVGInject(this)" />
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        @yield('header')
                    </header>

                    @yield('content')

                </main>
            </div>

        </v-app>
        </div>
    </body>
</html>
