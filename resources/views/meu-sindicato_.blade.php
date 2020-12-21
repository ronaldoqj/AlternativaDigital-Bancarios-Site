@extends('layouts.layout')
@section('css')
    <link href="{{asset('/_site/css/pages/meu-sindicato.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content')


<section id="meu-sindicato" class="container">

<div class="title-page">
    Meu Sindicato
</div>
 





<div class="accordionStandard" id="accordionStandard">

    <?php
        $arrayAnos = ['REGIÃO SUL'];
    ?>
    @foreach($arrayAnos as $ano)
    <div class="card">
        <div class="card-header">
            <div class="box--header {{$loop->first ? '' : 'collapsed'}}" data-toggle="collapse" data-target="#collapse-{{$loop->iteration}}" aria-expanded="{{$loop->first ? 'true' : 'false'}}" aria-controls="collapse-{{$loop->iteration}}">
                <div class="title--header">{{$ano}}</div>
            </div>
        </div>
        <div id="collapse-{{$loop->iteration}}" class="collapse {{$loop->first ? 'show' : ''}}" aria-labelledby="headingOne" data-parent="#accordionStandard">
            <div class="card-body">



                <div class="row __card--acordion">
                    <div class="col-12 col-md-6 __card--box">
                        <a href="/sindicato">
                        <h2>
                            Sindbancários Camaquã
                        </h2>
                        <div class="__card--content">
                            <div class="__text--2">EDITAL DE CONVOCAÇÃO DE TRABALHADORES(AS) EM INSTITUIÇÕES FINANCEIRAS</div>
                            <div class="__text--3">
                                Rua Bento Gonçalves, 932-1028 <br />
                                Centro, Camaquã - RS <br />
                                Porto Alegre, RS <br />
                                CEP: 96180-000 <br />
                            </div>

                            <div class="clear-fix"></div>
                        </div>
                        </a>
                    </div>

                </div>
                <!-- Sub-Collapse Fim -->


            </div>
        </div>
    </div>
    @endforeach



</div>






</section>

@endsection
