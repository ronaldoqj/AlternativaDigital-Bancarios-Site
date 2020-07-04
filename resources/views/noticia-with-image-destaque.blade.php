@extends('layouts.layout')
@section('css')
    <link href="{{url(mix('/_site/css/pages/news.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('content')

<!-- Banner TOP -->
<section id="top-banner">
    <div class="container" style="background-image: url(/_site/assets/Home/fetrafi-rs.png); height: 350px;"></div> 
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
                <div class="__text--1">Fetrafi-RS | 21/05/2020 <span>#FETRAFI #coronavirus #bancos</span></div>
                <div class="__text--2">Fetrafi-RS alerta: bancos estão descumprindo protocolos de combate ao coronavírus</div>
            </div>
        </div>
        <p>
      Os bancos estão retrocedendo nas medidas para prevenção do coronavírus e não estão cumprindo com os protocolos estabelecidos em negociação com o Comando Nacional dos Bancários quando identificados casos de infectados nas agências. Segundo a diretora de Saúde do Trabalhador e da Trabalhadora da Federação, Denise Falkenberg Corrêa, nos últimos dias surgiram várias denúncias de que agências do Rio Grande do Sul estão burlando o que foi definido sobre fechamento de agências para sanitização e revezamento.
Os protocolos negociados definem o procedimento de sanitização no caso de funcionário ter o teste confirmado para a Covid-19: a agência deve ser imediatamente fechada; desinfectada; a pessoa com a doença deve ser afastada do trabalho, bem como aqueles que tiveram contato com ela e, após, o banco pode reabrir com outra equipe. 
<br><br>
"Infelizmente isso não está acontecendo. Estamos recebendo diversas denúncias. Por isso, orientamos os sindicatos que fiscalizem os bancos de suas regiões e que procurem a Secretaria de Saúde, o Ministério Público e até mesmo a polícia local, pois colocar a vida das pessoas em risco, é um ato criminoso”, alerta Denise.
<br><br> <br><b>
Avanços conquistados pela categoria
</b>
<br><br>
A categoria bancária é uma das mais ativas nas negociações com as entidades patronais para garantir a preservação da saúde dos trabalhadores e das trabalhadores. Desde o início do isolamento social no Brasil, o Comando Nacional dos Bancários vem se reunindo sistematicamente com os bancos e, por isso, conseguiu garantir algumas medidas importantes, como:
<br>
- trabalho remoto e afastamento para as pessoas dos grupos de risco;
- revezamento de equipes;
- equipamentos de proteção no local de trabalho;
- atendimento aos clientes por agendamento;
- cuidados com a limpeza e higienização dos locais de trabalho.
<br><br><br> <b>
Testes para minimizar os riscos
</b>
<br><br>
A reivindicação atual da categoria é para que os bancos testem todos os seus funcionários para o coronavírus, uma vez que eles estão diariamente expostos aos riscos de contaminação. "Nós estamos na linha de frente no atendimento à população, o que no deixa mais expostos. E como não há vacina, a única saída que temos no momento para minimizar os riscos é realizar os testes”, destaca Denise.
<br><br>
A diretora da Fetrafi-RS lembra, ainda, que a Covid-19 foi reconhecida como doença ocupacional pelo Supremo Tribunal Federal. Por isso, todos os bancários e bancárias que forem afastados do trabalho por conta da doença, devem guardar toda a documentação e laudos para emissão de Comunicação de Acidente de Trabalho (CAT).

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
