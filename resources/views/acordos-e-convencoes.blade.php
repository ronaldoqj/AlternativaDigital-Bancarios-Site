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

    
    @foreach($list as $key => $ano)
    <div class="card">
        <div class="card-header">
            <div class="box--header {{$loop->first ? '' : 'collapsed'}}" data-toggle="collapse" data-target="#collapse-{{$loop->iteration}}" aria-expanded="{{$loop->first ? 'true' : 'false'}}" aria-controls="collapse-{{$loop->iteration}}">
                <div class="title--header">{{$key}}</div>
            </div>
        </div>
        <div id="collapse-{{$loop->iteration}}" class="collapse {{$loop->first ? 'show' : ''}}" aria-labelledby="headingOne" data-parent="#accordionStandard">
            <div class="card-body">


                <!-- Sub-Collapse -->
                <?php
                    $arrayEntidades = ['Aditiva - RS', 'Fenaban', 'Banco do Brasil'];
                ?>

                @foreach($ano as $key2 => $entidade)
                <h2 data-toggle="collapse" data-target="#sub-collapse-{{$loop->parent->iteration}}-{{$loop->iteration}}" aria-expanded="{{$loop->first ? 'true' : 'false'}}" aria-controls="sub-collapse-{{$loop->iteration}}">
                    {{$key2}}
                </h2>

                <div id="sub-collapse-{{$loop->parent->iteration}}-{{$loop->iteration}}" class="row __card--acordion  collapse {{$loop->first ? 'show' : ''}}">

                    @foreach($entidade as $key3 => $edital)
                    <div class="col-12 col-md-6 __card--box">
                        <div class="__card--content">
                            <div class="__text--1">{{$edital->cartola}}</div>
                            <div class="__text--2">{{$edital->titulo}}</div>
                            <div class="__text--3">{{$edital->linhaDeApoio}}</div>

                            <div class="__icons--editais">
                                <div class="SHARED__download"> <a href='{{url("/acordos-e-convencoes/download/{$edital->id}")}}'><img src="{{asset('/_site/assets/SVGs/baixar-edital.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
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
                    @endforeach

                </div>
                @endforeach
                <!-- Sub-Collapse Fim -->

            </div>
        </div>
    </div>
    @endforeach

</div>

</section>

@endsection
