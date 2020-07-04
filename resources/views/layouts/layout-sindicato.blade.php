@extends('layouts.layout')
    @section('css-syndicate')
        <link href="{{url(mix('/_site/css/pages/menu-sindicato.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    @endsection

    @section('top-syndicate')
        <!-- Banner TOP -->
        <a href="/sindicato">
        <section id="top-banner">
            <div id="box-top-sindicato" class="container-fluid" style="background-image: url(/_site/assets/_Sindicatos/top_sindicato.jpg); height: 250px;">
                <div class="container">
                <div class="row align-items-center">
                    <div class="col cols__texts--sindicato">

                        <table class="container-text-1--sindicato">

                            <tr>
                                <td>
                                    <div class="arrow__left--sindicato">
                                        <img src="{{asset('/_site/assets/SVGs/Sindicato/arrow-left-sindicato.svg')}}" class="img-fluid" onload="SVGInject(this)" />
                                    </div>
                                </td>
                                <td class="texts--sindicato">
                                    <div><span>CIDADE</span><br/></div>
                                    <div><span>RS</span></div>
                                </td>
                            </tr>

                        </table>

                        <div class="col-12 col-lg-9 col__text--sindicato">
                            <!-- <div class="flex-texts container-text-1--sindicato">
                                <div class="arrow__left--sindicato">
                                    <img src="{{asset('/_site/assets/SVGs/Sindicato/arrow-left-sindicato.svg')}}" class="img-fluid" onload="SVGInject(this)" />
                                </div>
                                <div class="text1--sindicato">
                                    <div><span>CIDADE</span></div>
                                    <div><span>RS</span></div>
                                </div>
                            </div> -->
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
                            <div><a href="{{url('sindicato')}}">HOME</a></div>
                            <div class="separador">&nbsp;</div>
                            <div><a href="{{url('o-sindicato')}}">O SINDICATO</a></div>
                            <div class="separador">&nbsp;</div>
                            <div><a href="{{url('servicos')}}">SERVIÇOS</a></div>
                            <div class="separador">&nbsp;</div>
                            <div><a href="{{url('sindicato/editais')}}">EDITAIS</a></div>
                            <div class="separador">&nbsp;</div>
                            <div><a href="{{url('sindicato/sindicalize-se')}}">SINDICALIZE-SE</a></div>
                            <div class="separador">&nbsp;</div>
                            <div><a href="{{url('sindicato/contato')}}">CONTATO</a></div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-lg-5">
                        <div class="legendas">REDES SOCIAIS DO SINDICATO</div>
                        <div class="flex-icons">
                            <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/facebook.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
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
