@extends('layouts.layout-sindicato')
@section('css')
    <link href="{{url(mix('/_site/css/pages/sindicatos/servicos.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content-syndicate')


<section id="servicos">
    <div class="container">
        <div>
            <div class="title-page">
                Serviços
            </div>

            <p class="mt-5">
                {!! $data->texto ?? '' !!}
            </p>
        </div>

        @if($listConvenios->count())
        <!-- Convenios -->
        <div class="convenios">
            <div class="title-page mt-5 mb-5">
                Convênios
            </div>

            @foreach($listConvenios as $categoria)
            <div class="box-collapse">
                <div class="collapse-title" data-toggle="collapse" data-target="#collapseConvenio_{{$categoria->id}}" aria-expanded="false" aria-controls="collapseConvenio_{{$categoria->id}}">
                    <div class="thumb-title" style="background-image: url(/{{$categoria->file_pathfile}}/{{ $categoria->file_namefile }});"></div> {{ $categoria->name }}
                </div>

                <div class="collapse" id="collapseConvenio_{{$categoria->id}}">
                    <div class="row">

                        @foreach($categoria->convenios as $convenio)
                        <div class="col-12 col-md-6 col-lg-4">

                            <?php
                                $whatsappConvenio = $convenio->whatsapp;
                                $prefixoNumero = $convenio->numero ? ', nº' : '';
                                $ifenComplemento = $convenio->complemento ? '-' : '';
                                $ifenCidade = $convenio->cidade ? '-' : '';
                                $siglaCEP = $convenio->cep ? 'CEP:' : '';
                                $ifenUf = $convenio->uf ? '-' : '';

                                if ($whatsappConvenio) {
                                    $whatsappConvenio = 55 . preg_replace('/[^0-9]/', '', $whatsappConvenio);
                                    $whatsappConvenio = "https://api.whatsapp.com/send?phone={$whatsappConvenio}&text=Olá Bancários-RS, acessei seu contato no Portal dos Bancários RS.";
                                }
                            ?>
                    
                            <div class="card__convenio--list">
                                <div class="col__list col__list--first">
                                    <img src="/{{$categoria->file_pathfile}}/{{ $categoria->file_namefile }}" class="img-fluid" onload="SVGInject(this)"></img>
                                </div>
                                <div class="coll__list col__list--last">
                                    <h2>{{$convenio->name}}</h2>
                                    <p>{{$convenio->description}}</p>

                                    @if($convenio->facebook || $convenio->twitter || $convenio->instagram || $convenio->whatsapp)
                                    <h3>Redes Sociais</h3>
                                    <div class="icons__socialmedias">
                                        @if($convenio->facebook)
                                            <a target="_blank" href="{{$convenio->facebook}}"><img src="/_site/assets/SVGs/Brancos/facebook.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                                        @endif
                                        @if($convenio->twitter)
                                            <a target="_blank" href="{{$convenio->twitter}}"><img src="/_site/assets/SVGs/Brancos/twitter.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                                        @endif
                                        @if($convenio->instagram)
                                            <a target="_blank" href="{{$convenio->instagram}}"><img src="/_site/assets/SVGs/Brancos/instagram.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                                        @endif
                                        @if($convenio->whatsapp)
                                            <a target="_blank" href="{{$whatsappConvenio}}"><img src="/_site/assets/SVGs/Brancos/whatsapp.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                                        @endif
                                    </div>
                                    @endif
                                    <div class="informations">
                                        <ul>
                                            <li><img src="{{asset('/_site/assets/SVGs/Convenios/address-pin.svg')}}" class="icons img-fluid" onload="SVGInject(this)" /></li>
                                            <li>
                                                <div>{{$convenio->endereco}}{{$prefixoNumero}} {{$convenio->numero}} {{$ifenComplemento}} {{$convenio->complemento}}</div>
                                                <div>{{$convenio->bairro}}</div>
                                                <div>{{$siglaCEP}} {{$convenio->cep}} {{$ifenCidade}} {{$convenio->cidade}} {{$ifenUf}} {{$convenio->uf}}</div>
                                            </li>
                                        </ul> 
                                        @if($convenio->phone ?? null)
                                        <ul><li><img src="{{asset('/_site/assets/SVGs/Convenios/phone-ringing.svg')}}" class="icons img-fluid" onload="SVGInject(this)" /> {{$convenio->phone}} </li></ul>
                                        @endif
                                        @if($convenio->email ?? null)
                                        <ul><li> <img src="{{asset('/_site/assets/SVGs/Convenios/mail.svg')}}" class="icons img-fluid" onload="SVGInject(this)" /> {{$convenio->email}} </li></ul>
                                        @endif
                                        @if($convenio->site ?? null)
                                        <ul><li> <img src="{{asset('/_site/assets/SVGs/Convenios/monitor-celular.svg')}}" class="icons img-fluid" onload="SVGInject(this)" /> {{$convenio->site}} </li></ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
             
                        </div>
                        @endforeach
                    </div>
                   
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endsection
