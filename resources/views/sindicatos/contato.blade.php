@extends('layouts.layout-sindicato')
@section('css')
    <link href="{{url(mix('/_site/css/pages/sindicatos/contato.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content-syndicate')

<section id="contato">
    <div class="container">
        <div class="title-page">
            Contato
        </div>

        <div class="description-of-page">
            <p class="mt-4 mb-4">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="dados-contato">
                    @if(session()->get('sindicato')['fone'])
                    <div class="d-flex flex-nowrap align-items-center">
                        <div class="icons">
                            <img src="{{asset('/_site/assets/SVGs/icon-telefone.svg')}}" onload="SVGInject(this)" />
                        </div>
                        <div class="text">{{session()->get('sindicato')['fone']}}</div>
                    </div>
                    @endif
                    @if(session()->get('sindicato')['fone2'])
                    <div class="d-flex flex-nowrap align-items-center">
                        <div class="icons">
                            <img src="{{asset('/_site/assets/SVGs/icon-telefone.svg')}}" onload="SVGInject(this)" />
                        </div>
                        <div class="text">{{session()->get('sindicato')['fone2']}}</div>
                    </div>
                    @endif
                    @if(session()->get('sindicato')['email'])
                    <div class="d-flex flex-nowrap align-items-center">
                        <div class="icons">
                            <img src="{{asset('/_site/assets/SVGs/icon-caracter-arroba.svg')}}" onload="SVGInject(this)" />
                        </div>
                        <div class="text">{{session()->get('sindicato')['email']}}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        @if(
            session()->get('sindicato')['facebook'] ||
            session()->get('sindicato')['twitter'] ||
            session()->get('sindicato')['instagram'] ||
            session()->get('sindicato')['whatsapp'] ||
            session()->get('sindicato')['podcast'] ||
            session()->get('sindicato')['youtube']
        )
        <div class="col-md-12 col-lg-8 offset-lg-2">
            <div class="legendas">REDES SOCIAIS DO SINDICATO</div>
            <div class="flex-icons">
                @if(session()->get('sindicato')['facebook'])
                <div><a target="blank" href="{{ url(session()->get('sindicato')['facebook']) }}"><img src="{{asset('/_site/assets/SVGs/Brancos/facebook.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                @endif
                @if(session()->get('sindicato')['twitter'])
                <div><a target="blank" href="{{ url(session()->get('sindicato')['twitter']) }}"><img src="{{asset('/_site/assets/SVGs/Brancos/twitter.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                @endif
                @if(session()->get('sindicato')['instagram'])
                <div><a target="blank" href="{{ url(session()->get('sindicato')['instagram']) }}"><img src="{{asset('/_site/assets/SVGs/Brancos/instagram.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                @endif
                @if(session()->get('sindicato')['whatsapp'])
                <div><a target="blank" href="{{ url(session()->get('sindicato')['whatsapp']) }}"><img src="{{asset('/_site/assets/SVGs/Brancos/whatsapp.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                @endif
                @if(session()->get('sindicato')['podcast'])
                <div><a target="blank" href="{{ url(session()->get('sindicato')['podcast']) }}"><img src="{{asset('/_site/assets/SVGs/Brancos/podcasts.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                @endif
                @if(session()->get('sindicato')['youtube'])
                <div><a target="blank" href="{{ url(session()->get('sindicato')['youtube']) }}"><img src="{{asset('/_site/assets/SVGs/Brancos/youtube.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                @endif
            </div>
        </div>
        @endif
        
        <form>
            <div class="row mb-3">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="assunto">Assunto</label>
                        <input type="text" class="form-control" id="assunto">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="mensagem">Mensagem</label>
                        <textarea class="form-control" id="mensagem" rows="8"></textarea>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">
                <div>Enviar</div>
            </button>
        </form>
    </div>
</section>
@endsection
