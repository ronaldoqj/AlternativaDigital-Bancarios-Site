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
            {!! $data->texto ?? '' !!}
        </div>

        <div class="row">
            <div class="col-12">
                <div class="dados-contato">
                    @if(request()->syndicate['fone'])
                    <div class="d-flex flex-nowrap align-items-center">
                        <div class="icons">
                            <img src="{{asset('/_site/assets/SVGs/icon-telefone.svg')}}" onload="SVGInject(this)" />
                        </div>
                        <div class="text">{{request()->syndicate['fone']}}</div>
                    </div>
                    @endif
                    @if(request()->syndicate['fone2'])
                    <div class="d-flex flex-nowrap align-items-center">
                        <div class="icons">
                            <img src="{{asset('/_site/assets/SVGs/icon-telefone.svg')}}" onload="SVGInject(this)" />
                        </div>
                        <div class="text">{{request()->syndicate['fone2']}}</div>
                    </div>
                    @endif
                    @if(request()->syndicate['email'])
                    <div class="d-flex flex-nowrap align-items-center">
                        <div class="icons">
                            <img src="{{asset('/_site/assets/SVGs/icon-caracter-arroba.svg')}}" onload="SVGInject(this)" />
                        </div>
                        <div class="text">{{request()->syndicate['email']}}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        @if(
            request()->syndicate['facebook'] ||
            request()->syndicate['twitter'] ||
            request()->syndicate['instagram'] ||
            request()->syndicate['whatsapp'] ||
            request()->syndicate['podcast'] ||
            request()->syndicate['youtube']
        )
        <div class="col-md-12 col-lg-8 offset-lg-2">
            <div class="legendas">REDES SOCIAIS DO SINDICATO</div>
            <div class="flex-icons">
                @if(request()->syndicate['facebook'])
                <div><a target="blank" href="{{ url(request()->syndicate['facebook']) }}"><img src="{{asset('/_site/assets/SVGs/Brancos/facebook.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                @endif
                @if(request()->syndicate['twitter'])
                <div><a target="blank" href="{{ url(request()->syndicate['twitter']) }}"><img src="{{asset('/_site/assets/SVGs/Brancos/twitter.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                @endif
                @if(request()->syndicate['instagram'])
                <div><a target="blank" href="{{ url(request()->syndicate['instagram']) }}"><img src="{{asset('/_site/assets/SVGs/Brancos/instagram.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                @endif
                @if(request()->syndicate['whatsapp'])
                <div><a target="blank" href="{{ url(request()->syndicate['whatsapp']) }}"><img src="{{asset('/_site/assets/SVGs/Brancos/whatsapp.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                @endif
                @if(request()->syndicate['podcast'])
                <div><a target="blank" href="{{ url(request()->syndicate['podcast']) }}"><img src="{{asset('/_site/assets/SVGs/Brancos/podcasts.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                @endif
                @if(request()->syndicate['youtube'])
                <div><a target="blank" href="{{ url(request()->syndicate['youtube']) }}"><img src="{{asset('/_site/assets/SVGs/Brancos/youtube.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a></div>
                @endif
            </div>
        </div>
        @endif
        
        <form>
            <input type="hidden" name="emailDestini" value="{{ request()->syndicate['email'] }}" />
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
