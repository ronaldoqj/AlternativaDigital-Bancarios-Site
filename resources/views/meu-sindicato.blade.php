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
        $arrayAnos = ['REGIÃO SUL', 'REGIÃO NORTE', 'REGIÃO LESTE'];
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


                <!-- Sub-Collapse -->
                <?php
                   $arrayMarcacao = [1, 2, 3];
                ?>

                @foreach($arrayMarcacao as $item)
                

                <div class="row __card--acordion">
                    <div class="col-12 col-md-6 __card--box">
                        <a href="/sindicato">
                        <h2>
                            Sindicato da Cidade Linda
                        </h2>
                        <div class="__card--content">
                            <div class="__text--2">EDITAL DE CONVOCAÇÃO DE TRABALHADORES(AS) EM INSTITUIÇÕES FINANCEIRAS</div>
                            <div class="__text--3">
                                Rua Cel. Fernando Machado nº 820 <br />
                                CEP 90010-320 - Bairro Centro Histórico <br />
                                Porto Alegre, RS <br />
                                Fone: (51) 3224-2000 | Fax (51) 3224-6706
                            </div>
                            <div class="__text--1">cidadelinda.bancariosrs.com.br</div>

                            <div class="clear-fix"></div>
                        </div>
                        </a>
                    </div>

                    <div class="col-12 col-md-6 __card--box">
                        <a href="/sindicato">
                        <h2>
                            Sindicato da Cidade Linda
                        </h2>
                        <div class="__card--content">
                            <div class="__text--2">EDITAL DE CONVOCAÇÃO DE TRABALHADORES(AS) EM INSTITUIÇÕES FINANCEIRAS</div>
                            <div class="__text--3">
                                Rua Cel. Fernando Machado nº 820 <br />
                                CEP 90010-320 - Bairro Centro Histórico <br />
                                Porto Alegre, RS <br />
                                Fone: (51) 3224-2000 | Fax (51) 3224-6706
                            </div>
                            <div class="__text--1">cidadelinda.bancariosrs.com.br</div>

                            <div class="clear-fix"></div>
                        </div>
                        </a>
                    </div>
                    
                    
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
