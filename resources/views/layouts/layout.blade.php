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

        @yield('css')

    </head>
    <body>
        <nav id="sidebar" class="">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
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
                                            <div class="col-4 col-sm-2"><img src="/_site/assets/SVGs/Header/Facebook.svg" class="img-fluid" /></div>
                                            <div class="col-4 col-sm-2"><img src="/_site/assets/SVGs/Header/Twitter.svg" class="img-fluid" /></div>
                                            <div class="col-4 col-sm-2"><img src="/_site/assets/SVGs/Header/Instagram.svg" class="img-fluid" /></div>
                                            <div class="col-4 col-sm-2"><img src="/_site/assets/SVGs/Header/Whatsapp.svg" class="img-fluid" /></div>
                                            <div class="col-4 col-sm-2"><img src="/_site/assets/SVGs/Header/Podcasts.svg" class="img-fluid" /></div>
                                            <div class="col-4 col-sm-2"><img src="/_site/assets/SVGs/Header/Youtube.svg" class="img-fluid" /></div>
                                        </div>
                                    </div>
                                    <div id="filters" class="row mx-md-n6">
                                        <div class="col-12 col-sm-6 order-2 order-sm-1">
                                            <div class="form-group">
                                                <select class="form-control form-control-sm" id="exampleFormControlSelect1">
                                                    <option>Itaú</option>
                                                    <option>Bradesco</option>
                                                    <option>Santander</option>
                                                    <option>Banco do Brasil</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 order-1 order-sm-2">
                                            <div class="input-group input-group-sm">
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

            <section id="top-banner" style="">
                <div class="container" style="background-image: url(/_site/assets/Home/obito-uchiha-madra.jpg); height: 350px;">
                    <div class="row align-items-end">
                        <div class="col cols__texts">

                            <div class="col-12 col-lg-9 container-text-1">#bancos</div>
                            <div class="container-text-2">Fórum Social das Resistências | 17/09/2019 </div>
                            <div class="col-12 col-lg-9 container-text-3">Fetrafi-RS sedia evento do Fórum Social das Resistências</div>

                        </div>
                    </div>
                </div>

                <div class="container __separador">
                    <div class="row">
                        <div class="col">
                            <div></div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="content">


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

        <!-- Plugins -->
        <script src="{{ url(mix('/_site/js/plugins.js')) }}"></script>

        <!-- Scripts -->
        <script src="{{ url(mix('/_site/js/template.js')) }}"></script>

        @yield('js')

    </body>
</html>
