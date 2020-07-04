<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('metatags')

        <title>{{ config('app.name', 'Bancários') }}</title>

        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{ url(mix('/_site/css/plugins.css')) }}" />
        <link rel="stylesheet" type="text/css" href="{{ url(mix('/_site/css/mCustomScrollbar.css')) }}" />
        <link rel="stylesheet" type="text/css" href="{{ url(mix('/_site/css/template.css')) }}" />

        <!-- Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        @yield('css-syndicate')
        @yield('css')


        <script src="{{ url(mix('/_site/js/svg-inject.min.js')) }}"></script>

    </head>
    <body>
        <nav id="sidebar" class="">
            <div id="dismiss">
                <!-- <i class="fas fa-arrow-left"></i> -->
                X
            </div>

            <div class="sidebar-header">
                <a href="/">
                    <img src="/_site/assets/logo.png" class="img-fluid logo"  />
                </a>
            </div>

            <ul class="list-unstyled components">
                <p>Menu</p>
                <li class="active">
                    <a href="{{url('/editais')}}">Editais</a>
                </li>
                <li>
                    <a href="{{url('/acordos-e-convencoes')}}">Acordos e Convenções</a>
                </li>
                <li>
                    <a href="#">Meu Banco</a>
                </li>
                <li>
                    <a href="{{url('/meu-sindicato')}}">Meu Sindicato</a>
                </li>
            </ul>

            <ul class="list-unstyled components">
                <p>Redes Sociais</p>

                <div class="redes-sociais">
                    <div class="d-flex justify-content-between">                        
                        <div ><a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/facebook.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                        <div ><a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/twitter.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                        <div ><a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/instagram.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div ><a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/whatsapp.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                        <div ><a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/podcasts.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                        <div ><a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/youtube.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                    </div>
                </div>
            </ul>


            <ul class="list-unstyled components">
                <p>Contato</p>
                
                <div class="contato">
                    <div class="d-flex ">
                        <div><img src="{{asset('/_site/assets/SVGs/icon-telefone.svg')}}" class="img-fluid" /></div>
                        <div>51. 3345 2565</div>
                    </div>
                    <div class="d-flex ">
                        <div><img src="{{asset('/_site/assets/SVGs/icon-caracter-arroba.svg')}}" class="img-fluid" /></div>
                        <div>CONTATO@BANCARIOSRS.COM.BR</div>
                    </div>
                </div>
            </ul>

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
                            <a href="/">
                                <img src="/_site/assets/logo.png" class="img-fluid logo"  />
                            </a>
                        </div>
                        <div id="menus" class="col-12 col-lg-6 offset-lg-2 order-1 order-lg-3">
                            <nav>
                                <h2 id="title-redes-sociais" class="d-lg-none text-center">REDES SOCIAIS</h2>
                                <div id="social-buttons" class="container-fluid">
                                    <div class="row">
                                        <div class="col">
                                            <div ><a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/facebook.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                                            <div ><a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/twitter.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                                            <div ><a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/instagram.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                                            <div ><a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/whatsapp.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                                            <div ><a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/podcasts.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                                            <div ><a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/youtube.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="filters" class="row mx-md-n6">
                                    <div class="col-12 col-sm-6 order-2 order-sm-1">

                                        <div class="btn-group combo-box">
                                            <button type="button" id="btn-banco" class="btn btn-secondary dropdown-toggle btn-sm" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                                                Meu Banco
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                <button class="dropdown-item" type="button">Meu Banco</button>
                                                <button class="dropdown-item" type="button">Itaú</button>
                                                <button class="dropdown-item" type="button">Bradesco</button>
                                                <button class="dropdown-item" type="button">Santander</button>
                                                <button class="dropdown-item" type="button">Banco do Brasil</button>
                                            </div>
                                        </div>
                                    

                                        <!-- <div class="form-group">
                                            <select class="form-control form-control-sm" id="exampleFormControlSelect1">
                                                <option>Meu Banco</option>    
                                                <option>Itaú</option>
                                                <option>Bradesco</option>
                                                <option>Santander</option>
                                                <option>Banco do Brasil</option>
                                            </select>
                                        </div> -->
                                    </div>

                                    <div class="col-12 col-sm-6 order-1 order-sm-2">
                                        <div class="input-group input-group-sm input-busca">
                                            <input type="text" class="form-control" placeholder="Busca" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">BUSCAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                        <div class="col text-center brand-footer">
                            <img src="/_site/assets/logo.png" class="img-fluid logo" width="150" />
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col text-center brand-alternativa-digital">
                        <img src="/_site/assets/SVGs/Footer/alternativa-digital.svg" class="img-fluid logo" width="200" />
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
