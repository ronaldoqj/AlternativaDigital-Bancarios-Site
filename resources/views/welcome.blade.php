@extends('layouts.layout')
@section('css')
    <link href="{{url(mix('/_site/css/pages/home.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content')

<!-- Banner TOP -->
<a href="/noticia-destaque">
<section id="top-banner">
    <div class="container" style="background-image: url(/_site/assets/Home/fetrafi-rs.png); height: 350px;">
        <div class="row align-items-end">
            <div class="col cols__texts">

                <div class="col-12 col-lg-9 container-text-1">#FETRAFI #coronavirus #bancos</div>
                <div class="container-text-2">Fetrafi-RS | 21/05/2020 </div>
                <div class="col-12 col-lg-9 container-text-3">Fetrafi-RS alerta: bancos estão descumprindo protocolos de combate ao coronavírus</div>

            </div>
        </div>
    </div>
</section>
</a>
<!-- Fim Banner TOP -->



<section id="news" class="container">

<!-- BLOCO NOTICIA IMAGEM -->
	
	
    <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

    <a href="/noticia">
    <div class="row COMPONENTE__news--with--image">
        <div class="col-12 col-lg-5 __news--left">
            <div style="background-image: url({{asset('/_site/assets/Home/corona-virus.jpg')}}); height: 250px"></div>
        </div>
        <div class="col-12 col-lg-7 __news--right">
            <div class="__text--1">Direito do Trabalhador | 21/05/2020 <span>#direitotrabalhador #governofederal #direitos</span></div>
            <div class="__text--2">Veja as principais medidas do governo federal contra os trabalhadores</div>
            <div class="__text--3">MPs permitem que bancos suspendam contratos de trabalho, antecipem férias e reduzam salários, entre outros absurdos</div>
        </div>
    </div>
    </a>

<!-- FIM - BLOCO NOTICIA IMAGEM -->

	
<!-- BLOCO NOTICIA VÍDEO -->

    <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

    <a href="/noticia-video">
    <div class="row COMPONENTE__news--with--video">
        <div class="col-12 col-lg-5 __news--left">
            
			
			
			<iframe width="100%" height="252" src="https://www.youtube.com/embed/LcTqbMFVars" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			
			
			<!-- ONDE ERA O VÍDEO
			
			<div style="background-image: url({{asset('/_site/assets/Home/video_corona.jpg')}}); height: 250px">

                <div class="container">
                    <div class="row align-items-center text-center">
                        <div class="col">
                            <img src="{{asset('/_site/assets/player.png')}}" />
                        </div>
                    </div>
                </div>
            </div>
			 -->
			
			
			
			
			
			
			
        </div>
        <div class="col-12 col-lg-7 __news--right">
            <div class="__text--1">Direito do Trabalhador | 15/10/2020 <span>#Contraf/CUT</span></div>
            <div class="__text--2">“É preciso descentralizar o pagamento do Auxílio Emergencial”, afirma Juvandia</div>
            <div class="__text--3">Em entrevista, a presidente da Contraf-CUT fala sobre descentralizar o pagamento do auxílio emergencial e sobre as negociações entre bancários e banqueiros nessa pandemia</div>
        </div>
    </div>
    </a>
	
<!--FIM -  BLOCO NOTICIA VÍDEO -->

	
	
<!-- BLOCO NOTICIA AUDIO -->
	
    <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

    <a href="/noticia-audio">
    <div class="row COMPONENTE__news--with--audio">
        <div class="col-12 __news--right">
            <div class="__text--1">Podcast Contraf-CUT | 07/06/2020 <span>#Contraf-CUT #Podcast</span></div>
            <div class="__text--2">"Vamos conversar": bate-papo sobre a luta dos bancários durante a pandemia nas regiões brasileiras</div>
            <div class="__espectro--audio d-flex align-items-center">
            <div></div>
            </div>
            <div class="__text--3">No bate papo desta semana, Juvândia Moreira, presidenta da Contraf-CUT e uma das coordenadoras do Comando Nacional dos Bancários</div>
        </div>
    </div>
    </a>
	
<!-- FIM - BLOCO NOTICIA AUDIO -->

	
	
	<!-- BLOCO NOTICIA NORMAL -->

    <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>
	
    <a href="/noticia-texto">
    <div class="row COMPONENTE__news--with--only-text">
        <div class="col-12 __news--right">
            <div class="__text--1">Bancos | 28/05/2020 <span>#Bancos </span></div>
            <div class="__text--2">Fetrafi-RS e sindicalistas se reunem com Banrisul e apresentam reivindicações dos banrisulenses</div>
            <div class="__text--3">Representantes dos empregados do Banco estão preocupados com o cumprimento de protocolos de saúde e cobrança de meta</div>
        </div>
    </div>
    </a>
<!-- FIM - BLOCO NOTICIA NORMAL -->	

<!-- BLOCO NOTICIA IMAGEM -->
	
	
    <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

    <a href="/noticia">
    <div class="row COMPONENTE__news--with--image">
        <div class="col-12 col-lg-5 __news--left">
            <div style="background-image: url({{asset('/_site/assets/Home/fake_news.jpg')}}); height: 250px"></div>
        </div>
        <div class="col-12 col-lg-7 __news--right">
            <div class="__text--1">Bancos  | 22/05/2020 <span>#Bancos</span></div>
            <div class="__text--2">Banco do Brasil volta atrás e banca publicidade em site de fake news</div>
            <div class="__text--3">Fetrafi-RS alerta para os danos à instituição a a importância de buscar fontes confiáveis.</div>
        </div>
    </div>
    </a>

<!-- FIM - BLOCO NOTICIA IMAGEM -->	
	
	
<!-- BLOCO NOTICIA NORMAL -->
	<div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

		
    <a href="/noticia-texto">
    <div class="row COMPONENTE__news--with--only-text">
        <div class="col-12 __news--right">
            <div class="__text--1">Bancos | 28/05/2020 <span>#Bancos </span></div>
            <div class="__text--2">Fetrafi-RS e sindicalistas se reunem com Banrisul e apresentam reivindicações dos banrisulenses</div>
            <div class="__text--3">Representantes dos empregados do Banco estão preocupados com o cumprimento de protocolos de saúde e cobrança de meta</div>
        </div>
    </div>
    </a>
<!-- FIM - BLOCO NOTICIA NORMAL -->	
	
	
<!-- BLOCO NOTICIA VÍDEO -->	
<div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

    <a href="/noticia-video">
    <div class="row COMPONENTE__news--with--video">
        <div class="col-12 col-lg-5 __news--left">
            <div style="background-image: url({{asset('/_site/assets/Home/video_querosim.jpg')}}); height: 250px">

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
            <div class="__text--1">Direito do Trabalhador | 15/10/2020 <span>#Contraf/CUT</span></div>
            <div class="__text--2">Contraf-CUT lança campanha #QueroSin</div>
            <div class="__text--3">Confira o teaser da campanha</div>
        </div>
    </div>
    </a>

	<!-- FIM - BLOCO NOTICIA VÍDEO -->
	
	
</section>

@endsection
