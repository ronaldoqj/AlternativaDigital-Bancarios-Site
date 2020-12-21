<?php
    $noticiaDestaqueFirst = $return['noticiaDestaqueFirst'];
    $campanha = $return['campanha'];
    $layout = $sindicato ? 'layouts.layout-sindicato' : 'layouts.layout';
    $linkComplemento = $sindicato ? 'sindicato/' : '';
?>

@extends($layout)
@section('css')
    <link href="{{url(mix('/_site/css/pages/home.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('metatags')
<meta property="og:url"           content="{{url('/')}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Portal Bancários RS" />
<meta property="og:description"   content="A FEDERAÇÃO DOS TRABALHADORES E TRABALHADORAS EM INSTITUIÇÕES FINANCEIRAS DO RIO GRANDE DO SUL utiliza a sigla FETRAFI-RS e foi fundada em 1º de Maio de 1943. Trata-se de uma entidade que representa 38 sindicatos filiados, integrantes da categoria profissional dos Trabalhadores e Trabalhadoras em Instituições Financeiras, sem fins lucrativos, com abrangência em todo o território do Rio Grande do Sul, com sede e foro em Porto Alegre/RS." />
<meta property="og:image"         content="{{url('/bancariosrs.png')}}"/>
@endsection

@section('js')
@if ($campanha)
    <script>
        $('#campanhaModal').modal('show')
    </script>
@endif
@endsection

@section('content')

@if ($campanha)
<!-- Modal -->
<div class="modal fade" id="campanhaModal" tabindex="-1" aria-labelledby="campanhaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <a href="{{$campanha->link}}">
      <div class="modal-body">
        <img class="img-fluid" src='{{asset("/{$campanha->file_pathfile}/{$campanha->file_namefile}")}}' />
      </div>
      </a>
    </div>
  </div>
</div>
@endif

@if ( $noticiaDestaqueFirst )
<!-- Banner TOP -->
<?php
    $link = "/{$linkComplemento}noticia/{$noticiaDestaqueFirst->id}/" . Str::slug($noticiaDestaqueFirst->titulo, '-');
?>
<a href="{{url($link)}}">
<section id="top-banner">
    <div class="container" style='background-image: url({{asset("/{$noticiaDestaqueFirst->fileImagemDestaque_pathfile}/{$noticiaDestaqueFirst->fileImagemDestaque_namefile}")}}); height: 350px;'>
        <div class="row align-items-end">
            <div class="col cols__texts">

                <!-- <div class="col-12 col-lg-9 container-text-1">#{{ $noticiaDestaqueFirst->tags }}</div> -->
                <div class="container-text-2">{{ $noticiaDestaqueFirst->cartola }} | {{ \Carbon\Carbon::parse($noticiaDestaqueFirst->dataInclusao)->format('d/m/Y') }} </div>
                <div class="col-12 col-lg-9 container-text-3">{{ $noticiaDestaqueFirst->titulo }}</div>

            </div>
        </div>
    </div>
</section>
</a>
<!-- Fim Banner TOP -->
@endif

<section id="news" class="container">

@forelse ($return['noticias'] as $noticia)

    @switch($noticia->tipoDaNoticia)

        @case('noticia-destaque')
        <!-- BLOCO NOTICIA IMAGEM -->

        <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>

        <?php
            $link = "/{$linkComplemento}noticia/{$noticia->id}/" . Str::slug($noticia->titulo, '-');
        ?>
        <a href="{{url($link)}}">
        <div class="row COMPONENTE__news--with--image">
            <div class="col-12 col-lg-5 __news--left">
                <div style='background-image: url({{asset("/{$noticia->fileImagemDestaque_pathfile}/{$noticia->fileImagemDestaque_namefile}")}}); height: 250px'></div>
            </div>
            <div class="col-12 col-lg-7 __news--right">
                <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>{{-- '#' --}}{{-- $noticia->tags --}}</span></div>
                <div class="__text--2">{{ $noticia->titulo }}</div>
                <div class="__text--3">{{ $noticia->linhaDeApoio }}</div>
            </div>
        </div>
        </a>

        <!-- FIM - BLOCO NOTICIA IMAGEM -->
        @break

        @case('noticia-video')
            <!-- BLOCO NOTICIA VÍDEO -->

            <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>
            <?php
                $link = "/{$linkComplemento}noticia/{$noticia->id}/" . Str::slug($noticia->titulo, '-');
            ?>
            <a href="{{url($link)}}">
            <div class="row COMPONENTE__news--with--video">
                <div class="col-12 col-lg-5 __news--left">
                    <!-- <iframe width="100%" height="252" src="https://www.youtube.com/embed/LcTqbMFVars" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                    <iframe width="100%" height="252" src="https://www.youtube.com/embed/{{$noticia->videoYoutube}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                    <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>{{-- '#' --}}{{-- $noticia->tags --}}</span></div>
                    <div class="__text--2">{{ $noticia->titulo }}</div>
                    <div class="__text--3">{{ $noticia->linhaDeApoio }}</div>
                </div>
            </div>
            </a>

            <!--FIM -  BLOCO NOTICIA VÍDEO -->
        @break

        @case('noticia-imagem')
            <!-- BLOCO NOTICIA IMAGEM -->
                
            <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>
            <?php
                $link = "/{$linkComplemento}noticia/{$noticia->id}/" . Str::slug($noticia->titulo, '-');
            ?>
            <!-- <a href="/{{$linkComplemento}}noticia/{{$noticia->id}}/{{str_replace(' ', '-', $noticia->titulo)}}"> -->
            <a href="{{url($link)}}">
            <div class="row COMPONENTE__news--with--image">
                <div class="col-12 col-lg-5 __news--left">
                    <div style='background-image: url({{asset("/{$noticia->fileImagemDestaque_pathfile}/{$noticia->fileImagemDestaque_namefile}")}}); height: 250px'></div>
                </div>
                <div class="col-12 col-lg-7 __news--right">
                    <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>{{-- '#' --}}{{-- $noticia->tags --}}</span></div>
                    <div class="__text--2">{{ $noticia->titulo }}</div>
                    <div class="__text--3">{{ $noticia->linhaDeApoio }}</div>
                </div>
            </div>
            </a>

            <!-- FIM - BLOCO NOTICIA IMAGEM -->
        @break


        @case('noticia-podcast')
            <!-- BLOCO NOTICIA AUDIO -->

            <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>
            
            <div class="row COMPONENTE__news--with--audio">
                <div class="col-12 __news--right">
                    <?php
                        $link = "/{$linkComplemento}noticia/{$noticia->id}/" . Str::slug($noticia->titulo, '-');
                    ?>
                    <a href="{{url($link)}}">
                        <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>{{-- '#' --}}{{-- $noticia->tags --}}</span></div>
                        <div class="__text--2">{{ $noticia->titulo }}</div>
                    </a>
                    <div class="player__audio">
                        <div class="__espectro--audio d-flex align-items-center" rel="stop">
                            <div class="control__play-Pause"></div>
                        </div>
                        <audio controls >
                            <source src="{{url($noticia->filePodcast_pathfile. '/' .$noticia->filePodcast_namefile)}}" type="{{ $noticia->filePodcast_mimetype }}">
                            Seu navegador de internet não suporta o elemento do tipo audio.
                        </audio>
                    </div>
                    <a href="/{{$linkComplemento}}noticia/{{$noticia->id}}/{{str_replace(' ', '-', $noticia->titulo)}}">
                        <div class="__text--3">{{ $noticia->linhaDeApoio }}</div>
                    </a>
                </div>
            </div>

            <!-- FIM - BLOCO NOTICIA AUDIO -->
        @break


        @case('noticia-simples')
            <!-- BLOCO NOTICIA NORMAL -->

            <div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>
            <?php
                $link = "/{$linkComplemento}noticia/{$noticia->id}/" . Str::slug($noticia->titulo, '-');
            ?>
            <a href="{{url($link)}}">  
            <div class="row COMPONENTE__news--with--only-text">
                <div class="col-12 __news--right">
                    <div class="__text--1">{{ $noticia->cartola }} | {{ \Carbon\Carbon::parse($noticia->dataInclusao)->format('d/m/Y') }} <span>{{-- '#' --}}{{-- $noticia->tags --}}</span></div>
                    <div class="__text--2">{{ $noticia->titulo }}</div>
                    <div class="__text--3">{{ $noticia->linhaDeApoio }}</div>
                </div>
            </div>
            </a>

            <!-- FIM - BLOCO NOTICIA NORMAL -->	
        @break

    @endswitch

@empty
    <p>Não foram encontradas notícias cadastradas</p>
@endforelse

	
</section>

@endsection
