@extends('layouts.layout-fetrafi-rs')
@section('css')
    <link href="{{url(mix('/_site/css/pages/fetrafi-rs/contato.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content-syndicate')


<section id="contato">

    <div class="container">
        <div class="title-page fetrafi-rs">
            Contato
        </div>

        <div class="description-of-page">
            <p class="mt-4 mb-4"><h1>Federação dos Trabalhadores e Trabalhadoras em Instituições Financeiras RS</h1> 
			
			Rua Cel. Fernando Machado nº 820 <br>CEP 90010-320 - Bairro Centro Histórico - Porto Alegre, RS
			
			</p>
        </div>

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
                <div> <a target="blank" href="https://www.facebook.com/FetrafiRS"><img src="{{asset('/_site/assets/SVGs/Brancos/facebook.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                <div> <a target="blank" href="https://twitter.com/fetrafi_rs"><img src="{{asset('/_site/assets/SVGs/Brancos/twitter.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                <div> <a target="blank" href="https://www.instagram.com/fetrafirs/"><img src="{{asset('/_site/assets/SVGs/Brancos/instagram.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                <div class="d-block d-lg-none"> <a target="blank" href="#"><img src="{{asset('/_site/assets/SVGs/Brancos/whatsapp.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                <div> <a target="blank" href="https://open.spotify.com/show/6gm0A7W6h2kUhZ4Cg5uGF6?si=7ldUyy_ZS2a4Rsnf6wwnhQ"><img src="{{asset('/_site/assets/SVGs/Brancos/podcasts.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                <div> <a target="blank" href="https://www.youtube.com/channel/UCh5dGGhvFO-TlfZVsJ8TM5w"><img src="{{asset('/_site/assets/SVGs/Brancos/youtube.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
            </div>
        </div>

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
