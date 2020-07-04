@extends('layouts.layout')
@section('css')
    <link href="{{url(mix('/_site/css/pages/news.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('content')

<!-- Banner TOP -->
<section id="top-banner">

    <div class="container">
        <div class="row COMPONENTE__news--with--video">
            <div class="col-12 __news--left" style="padding: 0;">
               
				<iframe width="100%" height="352" src="https://www.youtube.com/embed/LcTqbMFVars" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				
				
				<!-- DEVE SER O VÍDEO 

				<div style="background-image: url({{asset('/_site/assets/Noticias/img-para-video.jpg')}}); height: 350px">

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
        </div>
    </div>

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
                <div class="__text--1">Direito do Trabalhador | 15/10/2019 <span>#Contraf/CUT</span></div>
                <div class="__text--2">“É preciso descentralizar o pagamento do Auxílio Emergencial”, afirma Juvandia</div>
            </div>
        </div>
        <p>
           Em meio a intensas negociações do setor bancário em todo o Brasil, Juvandia Moreira, presidenta da Confederação Nacional dos Trabalhadores do Ramo Financeiro (Contraf-CUT), falou com o Reconta Aí sobre as mesas de negociação para proteger todos os trabalhadores do ramo financeiro e sobre o futuro do Brasil.
			<br><br>
			Na entrevista, podemos perceber que os equipamentos de proteção individual (EPI) dos trabalhadores são tão importantes quanto o planejamento do governo para uma saída da crise.
			<br><br>
			A principal mensagem deixada pela presidenta da Contraf-CUT é a necessidade de descentralizar o pagamento do auxílio emergencial. Segundo ela, essa proposta já está no Senado Federal e pode fazer com que o pagamento do benefício seja feito com mais eficiência, evitando aglomerações.
			<br><br>
			Além disso, Juvandia ressaltou o papel da Caixa e dos demais bancos públicos no Brasil. Do mesmo modo, prosseguiu dizendo que, para o Brasil conseguir sair da pandemia de coronavírus com menos danos econômicos, é preciso a intervenção do Estado.
			<br><br>
			Por fim, Juvandia ainda provocou: "Não queremos escolher quem vai viver e quem vai morrer. Queremos que todo mundo viva e essa é a obrigação do Estado”.
 		
        </p>
    </div>
</section>

<div class="h-5"></div>

<section id="news" class="container">

    <div class="title-page">
        <span>OUTRAS MATÉRIAS DA</span> <span>FETRAFI </span>
    </div>


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

    <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

    <a href="/noticia-video">
    <div class="row COMPONENTE__news--with--video">
        <div class="col-12 col-lg-5 __news--left">
            <div style="background-image: url({{asset('/_site/assets/Home/video_corona.jpg')}}); height: 250px">

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
            <div class="__text--2">“É preciso descentralizar o pagamento do Auxílio Emergencial”, afirma Juvandia</div>
            <div class="__text--3">Em entrevista, a presidente da Contraf-CUT fala sobre descentralizar o pagamento do auxílio emergencial e sobre as negociações entre bancários e banqueiros nessa pandemia</div>
        </div>
    </div>
    </a>

    <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

    <a href="/noticia-audio">
    <div class="row COMPONENTE__news--with--audio">
        <div class="col-12 __news--right">
            <div class="__text--1">Podcast Contraf-CUT | 07/06/2020 <span>#Contraf-CUT #Podcast</span></div>
            <div class="__text--2">Vamos conversar": bate-papo sobre a luta dos bancários durante a pandemia nas regiões brasileiras</div>
            <div class="__espectro--audio d-flex align-items-center">
                <div></div>
            </div>
            <div class="__text--3">No bate papo desta semana, Juvândia Moreira, presidenta da Contraf-CUT e uma das coordenadoras do Comando Nacional dos Bancários</div>
        </div>
    </div>
    </a>

  

    <!-- play.png -->


</section>

@endsection
