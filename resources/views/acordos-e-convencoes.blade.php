@extends('layouts.layout')
@section('css')
    <link href="{{asset('/_site/css/pages/acordos-e-convencoes.scss')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content')


<section id="acordos-e-convencoes" class="container">

<div class="title-page">
    Acordos e Convenções
</div>
 





<div class="accordionStandard" id="accordionStandard">

    <?php
        $arrayAnos = ['2020', '2019', '2018', '2017', '2016'];
    ?>
    @foreach($arrayAnos as $ano)
    <div class="card">
        <div class="card-header">
            <div class="box--header" data-toggle="collapse" data-target="#collapse-{{$loop->iteration}}" aria-expanded="{{$loop->first ? 'true' : 'false'}}" aria-controls="collapse-{{$loop->iteration}}">
                <div class="title--header">{{$ano}}</div>
            </div>
        </div>
        <div id="collapse-{{$loop->iteration}}" class="collapse {{$loop->first ? 'show' : ''}}" aria-labelledby="headingOne" data-parent="#accordionStandard">
            <div class="card-body">


                <!-- Sub-Collapse -->
                <?php
                    $arrayEntidades = ['Aditiva - RS', 'Fenaban', 'Banco do Brasil'];
                ?>

                @foreach($arrayEntidades as $item)
                <h2 data-toggle="collapse" data-target="#sub-collapse-{{$loop->parent->iteration}}-{{$loop->iteration}}" aria-expanded="{{$loop->first ? 'true' : 'false'}}" aria-controls="sub-collapse-{{$loop->iteration}}">
                    {{$item}}
                </h2>

                <div id="sub-collapse-{{$loop->parent->iteration}}-{{$loop->iteration}}" class="row __card--acordion  collapse {{$loop->first ? 'show' : ''}}">
                    <div class="col-12 col-md-6 __card--box">
                        <div class="__card--content">
                            <div class="__text--1">Edital FETRAFI-RS | 06/06/2018</div>
                            <div class="__text--2">EDITAL DE CONVOCAÇÃO DE TRABALHADORES(AS) EM INSTITUIÇÕES FINANCEIRAS</div>
                            <div class="__text--3">Os SINDICATOS DOS EMPREGADOS EM ESTABELECIMENTOS BANCÁRIOS: DE ALEGRETE E REGIÃO, com sede na rua Gal. Sampaio, 1040, 2° andar, Conj. 06, na cidade de... </div>

                            <div class="__icons--editais">
                                <div class="SHARED__download"> <a href="#"><img src="{{asset('/_site/assets/SVGs/baixar-edital.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            </div>

                            <div class="titulo-btns">Compartilhar</div>
                            <div class="SHARED__icons__socials--midia">
                                <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Facebook-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                                <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Twitter-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                                <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Instagram-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                                <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Whatsapp-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            </div>

                            <div class="clear-fix"></div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-6 __card--box">
                        <div class="__card--content">
                            <div class="__text--1">Edital FETRAFI-RS | 06/06/2018</div>
                            <div class="__text--2">EDITAL DE CONVOCAÇÃO DE TRABALHADORES(AS) EM INSTITUIÇÕES FINANCEIRAS</div>
                            <div class="__text--3">Os SINDICATOS DOS EMPREGADOS EM ESTABELECIMENTOS BANCÁRIOS: DE ALEGRETE E REGIÃO, com sede na rua Gal. Sampaio, 1040, 2° andar, Conj. 06, na cidade de... </div>

                            <div class="__icons--editais">
                                <div class="SHARED__download"> <a href="#"><img src="{{asset('/_site/assets/SVGs/baixar-edital.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            </div>

                            <div class="titulo-btns">Compartilhar</div>
                            <div class="SHARED__icons__socials--midia">
                                <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Facebook-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                                <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Twitter-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                                <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Instagram-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                                <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Whatsapp-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                            </div>

                            <div class="clear-fix"></div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Sub-Collapse Fim -->



            </div>
        </div>
    </div>
    @endforeach













    <div class="card">
        <div class="card-header">
            <div class="box--header" data-toggle="collapse" data-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                <div class="title--header">2019</div>
            </div>
        </div>
        <div id="collapse-2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionStandard">
            <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="box--header" data-toggle="collapse" data-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                <div class="title--header">2018</div>
            </div>
        </div>
        <div id="collapse-3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionStandard">
            <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="box--header" data-toggle="collapse" data-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                <div class="title--header">2017</div>
            </div>
        </div>
        <div id="collapse-4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionStandard">
            <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>

</div>






</section>

@endsection
