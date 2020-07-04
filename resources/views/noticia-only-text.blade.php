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
        

        <div class="row COMPONENTE__news--with--only-text mb-2">
            <div class="col-12 __news--right">
                <div class="__text--1">Bancos | 17/09/2019 <span>#Bancos </span></div>
                <div class="__text--2">Fetrafi-RS e sindicalistas se reunem com Banrisul e apresentam reivindicações dos banrisulenses</div>
            </div>
        </div>


        <p>
            Diretores da Fetrafi-RS e sindicalistas levaram uma série de reivindicações ao Banrisul nesta quinta-feira, 28 de maio. Uma das questões que tem preocupado os representantes dos banrisulenses é o relaxamento do Banco com os protocolos de saúde voltados para o combate à Covid-19. Surgiram denúncias de retrocessos. Algumas agências não estariam cumprindo com o revezamento, e estariam atendendo sem agendamento.
        </p>
        <p>
           Sobre essas questões, o superintendente de Recursos Humanos do Banco, Gaspar Saikoski, afirmou que os protocolos de saúde são unificados, mas que o revezamento está a cargo de cada administração, já que algumas agências têm poucos funcionários e não poderiam dividir equipes.


        </p>
        <p>
            Os representantes dos banrisulenses também reivindicaram que seja feita a testagem para o coronavírus em todos aqueles que estão trabalhando presencialmente. Segundo Saikoski, essa testagem está no radar do Banrisul, mas que o Banco se guia pelas determinações do Ministério da Saúde e OMS e que, portanto, essa questão ainda não é determinante para esses órgãos.


        </p>
		
		
		<p>
			<b> Metas</b><br>
            A cobrança das metas foi mais um tema que entrou em pauta. Os sindicalistas solicitaram readequação das exigências quanto às metas, considerando a forte retração do mercado econômico em diversas atividades e que não haja punições pelos próximos dois semestres, enquanto perdurar a pandemia do coronavirus.
			<br>
			A esse respeito, a representação do Banco afirmou que os dados serão monitorados para avaliação posterior. Como última reivindicação, foi pedido que as reuniões com o Banrisul aconteçam quinzenalmente.
			

        </p>
		
		
		
		<p>
			<b> Defesa do banco público
</b><br>
            Em reunião virtual do Comando Nacional dos Banrisulenses realizada na quarta-feira, 27 de maio, a defesa do caráter de banco público e o respeito aos protocolos de enfrentamento ao coronavírus foram os pontos principais abordados entre os banrisulenses.
<br>
Eles estão preocupados com a volta da ameaça de venda do Banrisul, uma vez que a tramitação de projetos foi retomada na Assembleia Legislativa e uma das propostas em tramitação na Comissão de Constituição e Justiça (CCJ) defende a retirada do plebiscito para venda do Banco.
<br>
Além disso, o governador Eduardo Leite voltou a falar sobre a possível venda do Banrisul em live realizada pela XP Investimentos no dia 26 de abril e, segundo informações publicadas na imprensa, a JPMOrgan Chase & Co estaria sendo contratada para avaliar estratégias de negócios das operações da Banrisul Administradora de Cartões. Sobre isso, a Fetrafi-RS já enviou carta ao Banco solicitando
			
			
        </p>
		
		
        <p>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
        </p>
    </div>
</section>

<div class="h-5"></div>

<section id="news" class="container">

    <div class="title-page">
        <span>OUTRAS MATÉRIAS DO</span> <span>BANCO</span>
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
