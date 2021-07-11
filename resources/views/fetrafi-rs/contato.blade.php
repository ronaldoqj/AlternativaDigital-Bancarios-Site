<?php
$whatsappFetrafiRs = request()->fetrafirs['whatsapp'];

if ($whatsappFetrafiRs) {
    $whatsappFetrafiRs = 55 . preg_replace('/[^0-9]/', '', $whatsappFetrafiRs);
    $linkSocialMediaWhatsappFetrafiRs = "https://api.whatsapp.com/send?phone={$whatsappFetrafiRs}&text=Olá Bancários-RS, acessei seu contato no Portal dos Bancários RS.";
}
?>

@extends('layouts.layout-fetrafi-rs')
@section('css')
    <link href="{{url(mix('/_site/css/pages/fetrafi-rs/contato.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content-syndicate')

<section id="contato">
    <div class="container">
        <div class="title-page fetrafi-rs"> Contato </div>

        @if ($msgEnvio !== '')
        <div class="alert alert-success alert-sucess-comum" role="alert">
            <button type="button" class="close close-alert-sucess-comum">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-heading">Mensagem enviada!</h4>
            <p>Agredecemos seu contato, retornaremos assim que possível.</p>
            <hr>
            <p class="mb-0">Obrigado pela sua atenção.</p>
        </div>
        @endif

        <!-- <div class="description-of-page">
            <p class="mt-4 mb-4"><h1>Federação dos Trabalhadores e Trabalhadoras em Instituições Financeiras RS</h1> 
			Rua Cel. Fernando Machado nº 820 <br>CEP 90010-320 - Bairro Centro Histórico - Porto Alegre, RS
			</p>
        </div> -->
        @if( request()->fetrafirs->textContato )
        <div class="description-of-page">
            {!! request()->fetrafirs->textContato ?? '' !!}
        </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="dados-contato">
					<div class="d-flex flex-nowrap align-items-center">
                        <div class="icons">
                            <img src="{{asset('/_site/assets/SVGs/icon-telefone.svg')}}" onload="SVGInject(this)" />
                        </div>
                        <div class="text">(51) 3224-2000 | Fax (51) 3224-6706</div>
                    </div>
                    <div class="d-flex flex-nowrap align-items-center">
                        <div class="icons">
                            <img src="{{asset('/_site/assets/SVGs/icon-caracter-arroba.svg')}}" onload="SVGInject(this)" />
                        </div>
                        <div class="text">FETRAFI@FETRAFIRS.ORG.BR</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-12 col-lg-8 offset-lg-2">
            <div class="legendas">REDES SOCIAIS DA FETRAFI-RS</div>
            <div class="flex-icons">
                @if( request()->fetrafirs->facebook )
                    <div> <a target="_blank" href="{{url(request()->fetrafirs->facebook)}}"><img src="{{asset('/_site/assets/SVGs/Brancos/facebook.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                @endif
                @if( request()->fetrafirs->twitter )
                <div> <a target="_blank" href="{{url(request()->fetrafirs->twitter)}}"><img src="{{asset('/_site/assets/SVGs/Brancos/twitter.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                @endif
                @if( request()->fetrafirs->instagram )
                <div> <a target="_blank" href="{{url(request()->fetrafirs->instagram)}}"><img src="{{asset('/_site/assets/SVGs/Brancos/instagram.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                @endif
                @if ($whatsappFetrafiRs)
                <div> <a target="_blank" href="{{ $linkSocialMediaWhatsappFetrafiRs }}"><img src="{{asset('/_site/assets/SVGs/Brancos/whatsapp.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                @endif
                @if( request()->fetrafirs->podcast )
                <div> <a target="_blank" href="{{url(request()->fetrafirs->podcast)}}"><img src="{{asset('/_site/assets/SVGs/Brancos/podcasts.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                @endif
                @if( request()->fetrafirs->youtube )
                <div> <a target="_blank" href="{{url(request()->fetrafirs->youtube)}}"><img src="{{asset('/_site/assets/SVGs/Brancos/youtube.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                @endif
            </div>
        </div>

        <form action="" method="POST">
            @csrf
            <input type="hidden" name="emailDestini" value="{{ request()->fetrafirs->email }}" />
            <div class="row mb-3">
                <div class="col-12 col-md-6">
                <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" maxlength="120" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input type="email" class="form-control" name="email" maxlength="120" required>
                    </div>
                    <div class="form-group">
                        <label for="assunto">Assunto</label>
                        <input type="text" class="form-control" name="assunto" maxlength="100" required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="mensagem">Mensagem</label>
                        <textarea class="form-control" name="mensagem" rows="8" maxlength="900" required></textarea>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-primary btn-block" value="Enviar" />
        </form>
    </div>
</section>
@endsection
