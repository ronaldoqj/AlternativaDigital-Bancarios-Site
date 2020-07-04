@extends('layouts.layout')
@section('css')
    <link href="{{url(mix('/_site/css/pages/news.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('content')

<!-- Banner TOP -->
<section id="top-banner">
</section>
<!-- Fim Banner TOP -->


<section id="noticias">
    <div class="container">

        <div class="row controls-of-news">

            <div class="col col-md-10 offset-md-1 box__social--midia">

                <div class="d-flex bd-highlight SHARED__icons__socials--midia">
                    
                    <div> <div class="titulo-btns">Compartilhar</div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Facebook-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                    <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Twitter-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                    <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Instagram-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                    <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Whatsapp-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                    
                    <div class="ml-auto"> <div class="titulo-btns">Ampliar fonte</div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Diminuir.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                    <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Aumentar.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                </div>
             
            </div>

        </div>

        <div class="row COMPONENTE__news--with--only-text">
            <div class="col-12 __news--right">
                <div class="__text--1">Podcast Contraf-CUT | 07/06/2020 <span>#Contraf-CUT #Podcast</span></div>
                <div class="__text--2">"Vamos conversar": bate-papo sobre a luta dos bancários durante a pandemia nas regiões brasileiras</div>
            </div>
        </div>

        <div class="container mt-4 mb-4">
            <div class="row COMPONENTE__news--with--audio">
                <div class="col-12 __news--right" style="padding: 0;">
                    <div class="__espectro--audio d-flex align-items-center">
                        <div></div>
                    </div>
                </div>
            </div>
        </div>

        <p>
            No bate papo desta semana, Juvândia Moreira, presidenta da Contraf-CUT e uma das coordenadoras do Comando Nacional dos Bancários, conversa com lideranças sindicais de regiões do Brasil sobre a luta travadas pelos sindicatos de bancários para proteger trabalhadores e sobre a pandemia do Coronavírus. 

        </p>
        <p>
            Fala também sobre as negociações da campanha salarial 2020. Convidados: Cleiton dos Santos Silva, presidente da Fetec/Centro-Norte: Aline Molina, presidenta da Fetec/São Paulo; e Jacir Zimmer, presidente da Fetrafi-Santa Catarina
        </p>
   
</section>

<div class="h-5"></div>

<section id="news" class="container">

    <div class="title-page">
        <span>OUTRAS MATÉRIAS DO</span> <span>CONTRAF-CUT</span>
    </div>


    <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

    <a href="/noticia">
    <div class="row COMPONENTE__news--with--image">
        <div class="col-12 col-lg-5 __news--left">
            <div style="background-image: url({{asset('/_site/assets/Home/corona-virus.jpg')}}); height: 250px"></div>
        </div>
        <div class="col-12 col-lg-7 __news--right">
            <div class="__text--1">Direito do Trabalhador | 15/10/2020 <span>#bancos</span></div>
            <div class="__text--2">Covid-19: Comando faz balanço das medidas negociadas e apresenta novas reivindicações aos bancos</div>
            <div class="__text--3">Em um mês, houve diversas conquistas, mas movimento cobra solução pra aglomerações nas agências.</div>
        </div>
    </div>
    </a>

    <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

    <a href="/noticia-video">
    <div class="row COMPONENTE__news--with--video">
        <div class="col-12 col-lg-5 __news--left">
            <div style="background-image: url({{asset('/_site/assets/Home/bancarios-denunciam.png')}}); height: 250px">

                <div class="container">
                    <div class="row align-items-center text-center">
                        <div class="col">
                            <img src="{{asset('/_site/assets/player.png')}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-7 __news--right">
            <div class="__text--1">Direito do Trabalhador | 15/10/2020 <span>#bancos</span></div>
            <div class="__text--2">Covid-19: Comando faz balanço das medidas negociadas e apresenta novas reivindicações aos bancos</div>
            <div class="__text--3">Em um mês, houve diversas conquistas, mas movimento cobra solução pra aglomerações nas agências.</div>
        </div>
    </div>
    </a>

    <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

    <a href="/noticia-audio">
    <div class="row COMPONENTE__news--with--audio">
        <div class="col-12 __news--right">
            <div class="__text--1">Saúde do Trabalhador | 17/09/2019 <span>#bancos</span></div>
            <div class="__text--2">Trabalhadores saem frustrados do GT de Saúde do Itaú</div>
            <div class="__espectro--audio d-flex align-items-center">
                <div></div>
            </div>
            <div class="__text--3">Os representantes dos trabalhadores do Itaú saíram frustrados da reunião do Grupo de Trabalho (GT) de Saúde, realizada na sede da Confederação Nacional dos Trabalhadores do Ramo Financeiro (Contraf-CUT), em São Paulo, nesta quinta-feira (12). O encontro foi marcado para a direção do banco trazer os retornos das reivindicações apresentadas em julho. Porém, o banco não trouxe retorno algum.</div>
        </div>
    </div>
    </a>

    <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

    <a href="/noticia-texto">
    <div class="row COMPONENTE__news--with--only-text">
        <div class="col-12 __news--right">
            <div class="__text--1">Saúde do Trabalhador | 17/09/2019 <span>#bancos</span></div>
            <div class="__text--2">Itaú vai antecipar o pagamento da 13ª cesta alimentação para 25 de outubro</div>
            <div class="__text--3">A diretoria executiva da Fetrafi-RS decidiu orientar seus associados a dizerem sim para a proposta elaborada pela Anabb, AAFBB, Contraf-CUT e FAABB para manutenção da Caixa de Assistência dos Funcionários do Banco do Brasil (Cassi), que já foi enviada para análise do banco.</div>
        </div>
    </div>
    </a>


    <!-- play.png -->


</section>

@endsection
