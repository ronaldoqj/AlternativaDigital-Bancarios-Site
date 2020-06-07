@extends('layouts.layout')
@section('css')
    <link href="{{url(mix('/_site/css/pages/home.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content')

<!-- Banner TOP -->
<section id="top-banner">
    <div class="container" style="background-image: url(/_site/assets/Home/fetrafi-rs.png); height: 350px;">
        <div class="row align-items-end">
            <div class="col cols__texts">

                <div class="col-12 col-lg-9 container-text-1">#bancos</div>
                <div class="container-text-2">Fórum Social das Resistências | 17/09/2019 </div>
                <div class="col-12 col-lg-9 container-text-3">Fetrafi-RS sedia evento do Fórum Social das Resistências</div>

            </div>
        </div>
    </div>
</section>
<!-- Fim Banner TOP -->

<section id="news" class="container">

    <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

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

    <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

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

    <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

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

    <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

    <div class="row COMPONENTE__news--with--only-text">
        <div class="col-12 __news--right">
            <div class="__text--1">Saúde do Trabalhador | 17/09/2019 <span>#bancos</span></div>
            <div class="__text--2">Itaú vai antecipar o pagamento da 13ª cesta alimentação para 25 de outubro</div>
            <div class="__text--3">A diretoria executiva da Fetrafi-RS decidiu orientar seus associados a dizerem sim para a proposta elaborada pela Anabb, AAFBB, Contraf-CUT e FAABB para manutenção da Caixa de Assistência dos Funcionários do Banco do Brasil (Cassi), que já foi enviada para análise do banco.</div>
        </div>
    </div>

</section>

@endsection
