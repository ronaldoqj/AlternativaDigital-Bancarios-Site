@extends('layouts.layout')
@section('css')
    <link href="{{asset('/_site/css/pages/meu-sindicato.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content')

<section id="meu-sindicato" class="container">

<div class="title-page mb-5">
    Meu Sindicato
</div>

<div class="destaques">
    @foreach($return['list'] as $item)
        @if ($item->subdomain !== '')
            <?php
                $urlImg = '/_site/assets/bancariosrs.svg';
                $pathFile = $item->logo_pathfile;
                $nameFile = $item->logo_namefile;
                if ($pathFile != '' && $nameFile != '') {
                    $urlImg = $item->logo_pathfile.'/'.$item->logo_namefile;
                }
                
                $link = explode('//', env('APP_URL'));
                if ( count($link) == 2) {
                    $link = $link[0] . '//' . $item->subdomain . '.' . $link[1]; 
                } else {
                    $link = env('APP_URL');
                }
            ?>
            @if($loop->iteration % 2 == 1)
            <div class="row">
            @endif
                <div class="col-12 col-md-6 __card--box">
                    <a href="{{ url($link) }}">
                        <div class="logo" style=" background-image: url(' {{ asset($urlImg) }} ') ">
                        </div>
                        <h2>
                            {{ $item->name }}
                        </h2>
                        <div class="__card--content">
                            <div class="__text--3">
                                {{ $item->email }}
                                <br /><br />
                            </div>
                        
                            <div class="clear-fix"></div>
                        </div>
                    </a>
                </div>
            @if($loop->iteration % 2 == 0 || $loop->last)
            </div>
            @endif
        @endif
    @endforeach
    </div>



<div class="accordionStandard" id="accordionStandard">

    <div class="mt-5"></div>

    <?php
        $arrayAnos = ['SINDICATOS FEDERADOS'];
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
                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Alegrete - Sindicato dos/as Trabalhadores em Instituições Financeiras de Alegrete
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 55-34222380<br />
                                    E-mail: sindicatodosbancariosalegrete@gmail.com<br />
                                    Endereço: Rua General Sampaio, 1040 Sala 06 <br />
                                    Alegrete/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>

                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Bagé-Sindicato dos Bancários de Bagé e Região
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 53-32422070<br />
                                    E-mail: secretaria@sindbanbage.com.br<br />
                                    Endereço: Rua Melanie Granier, 154 <br />
                                    Bagé/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
					</div>

                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Bento Gonçalves-Sindicato dos Empregados em Estabelecimentos Bancários de Bento Gonçalves
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 54-34521956<br />
                                    E-mail: bancarios.bg@gmail.com<br />
                                    Endereço: Rua Marechal Deodoro 101 Gal. Central - Sala 401 <br />
                                    Bento Gonçalves/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>

                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Cachoeira do Sul-Sindicato dos Empregados em Estabelecimentos Bancários de Cachoeira do Sul
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 51-37221261<br />
                                    E-mail: seebcachoeiradosul@gmail.com<br />
                                    Endereço: Rua Andrade Neves 1510 Salas 32 e 34 <br />
                                    Cachoeira do Sul/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>
					
                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                    Camaquã-Sindicato dos Empregados em Estabelecimentos Bancários de Camaquã
                                </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 51-36711974<br />
                                    E-mail: seebcq@terra.com.br<br />
                                    Endereço: Rua Bento Gonçalves 1207  <br />
                                    Centro - Camaquã/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>

                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Carazinho-Sindicato dos Empregados em Estabelecimentos Bancários de Carazinho
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 54-33301313 <br />
                                    E-mail: bancarios@bancarioscarazinho.com.br<br />
                                    Endereço: Rua Venâncio Aires 338 <br />
                                    Centro - Carazinho/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>
					
                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Caxias do Sul-Sindicato dos Empregados em Estabelecimentos Bancários de Caxias do Sul
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 54-32232166<br />
                                    E-mail: bancax@bancax.org.br<br />
                                    Endereço: Rua Borges de Medeiros 676 <br />
                                    Centro - Caxias do Sul/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>

                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Cruz Alta-Sindicato dos Empregados em Estabelecimentos Bancários de Cruz Alta
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 55-33228294<br />
                                    E-mail: seebca@gmail.com<br />
                                    Endereço: Rua Jango Vidal 175 Vila Schmidt <br />
                                    Cruz Alta/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>
					
                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Erechim-Sindicato dos Empregados em Estabelecimentos Bancários de Erechim e Região
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 54-33212788<br />
                                    E-mail: seeb@bancarioserechim.com.br<br />
                                    Endereço: Av. Maurício Cardoso 335 Sala 202 <br />
                                    Erechim/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                                            
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Frederico Westphalen - Sindicato dos Empregados em Estabelecimentos Bancários de Frederico Westphalen e Região
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 55-37444068<br />
                                    E-mail: seebfred@tcheturbo.com.br<br />
                                    Endereço: Rua do Comércio, 535 Sobreloja <br />
                                    Frederico Westphalen/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Guaporé-Sindicato dos Empregados em Estabelecimentos Bancários de Guaporé RS
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 54-34432636<br />
                                    E-mail: secretaria@seebguapore.org.br<br />
                                    Endereço: Rua Dr. Julio Campos, 509 Sala 204 <br />
                                    Guaporé/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>	
                                
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Horizontina-Sindicato dos Empregados em Estabelecimentos Bancários de Horizontina
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 55-35371274<br />
                                    E-mail: seebhzna.sra@terra.com.br<br />
                                    Endereço: Rua São Cristóvão 1331 Sala 02 <br />
                                    Horizontina/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>
						
                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Ijuí-Sindicato dos Empregados em Estabelecimentos Bancários de Ijuí
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 55-33328310<br />
                                    E-mail: seebijui@gmail.com<br />
                                    Endereço:  Rua Sete de Setembro 345 Sala 28 <br />
                                    Ijuí/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>	
                            
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Lajeado-Sindicato dos Empregados em Estabalecimentos Bancários de Lajeado
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 51-37142329<br />
                                    E-mail: sindbanc@bewnet.com.br<br />
                                    Endereço: Rua Mário Cattói 116<br />
                                    Centro - Lajeado/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>
						
                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Litoral Norte/RS-Sindicato dos Bancários do Litoral Norte RS
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 51-36632975<br />
                                    E-mail: seebosorio@terra.com.br<br />
                                    Endereço: Rua Barão do Rio Branco, 01<br />
                                    Osório/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>	
                            
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Nova Prata-Sindicato dos Empregados em Estabelecimentos Bancários de Nova Prata e Região
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 54-32421822<br />
                                    E-mail: sindinovaprata@seebnpr.com.br<br />
                                    Endereço: Rua Flores da Cunha 847 2º andar<br />
                                    Nova Prata/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>
						
					<div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Novo Hamburgo-Sindicato dos Bancários e Financiários de Novo Hamburgo e Região
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 51-35945418<br />
                                    E-mail: bancariosnh@terra.com.br<br />
                                    Endereço: Rua João Antônio da Silveira, 885<br />
                                    Novo Hamburgo/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>	
                                
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Passo Fundo-Sindicato dos Empregados em Estabelecimentos Bancários de Passo Fundo
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 54-36012785<br />
                                    E-mail: secretaria@bancariospassofundo.org.br<br />
                                    Endereço: Rua General Osório, 1411<br />
                                    Passo Fundo/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>
	
					<div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Pelotas-Sindicato dos Empregados em Estabelecimentos Bancários de Pelotas e Região
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 53-32254108<br />
                                    E-mail: sindbancariospel@uol.com.br<br />
                                    Endereço: Rua Tiradentes, 3087<br />
                                    Pelotas/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>		
                            
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                                Porto Alegre - Sindicato dos Bancários de Porto Alegre e Região
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 51-34331200<br />
                                    E-mail: seger@sindbancarios.org.br<br />
                                    Endereço: Rua General Câmara, 424<br />
                                    Porto Alegre/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            Rio Grande-Sindicato dos Empregados em Estabelecimentos Bancários de Rio Grande
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 53-32326009<br />
                                    E-mail: seebrg@vetorial.net<br />
                                    Endereço: Rua Marechal Floriano Peixoto, 467<br />
                                    Rio Grande/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>		

                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            Rio Pardo-Sindicato dos Empregados em Estabelecimentos Bancários de Rio Pardo
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 51-37313525<br />
                                    E-mail: seebrp@gmail.com<br />
                                    Endereço: Rua General Osório, 875 Sl. 402<br />
                                    Rio Pardo/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>
							
                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            Rosário do Sul-Sindicato dos Empregados em Estabelecimentos Bancários de Rosário do Sul
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 55-32311925<br />
                                    E-mail: seebrosul@gmail.com<br />
                                    Endereço: Rua Barão do Rio Branco, 2337 sala 11<br />
                                    Rosário do Sul/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>

                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            Santa Cruz do Sul-Sindicato dos Bancários de Santa Cruz do Sul e Região
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 51-30562351<br />
                                    E-mail: sindibancarios@sindibancarios.org.br<br />
                                    Endereço: Rua Sete de Setembro, 489<br />
                                    Santa Cruz do Sul/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            Santa Maria-Sindicato dos Empregados em Estabelecimentos Bancários de Santa Maria
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 55-32228051<br />
                                    E-mail: contato@bancariossm.org.br<br />
                                    Endereço: Rua Doutor Bozano, 1147 conj.301<br />
                                    Santa Maria/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
        
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            Santa Rosa-Sindicato dos Empregados em Estabelecimentos Bancários de Santa Rosa
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 55-35126575<br />
                                    E-mail: sindicato@seeb.com.br<br />
                                    Endereço: Av. América, 582<br />
                                    Santa Rosa/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>
	
                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            Santana do Livramento-Sindicato dos Empregados em Estabelecimentos Bancarios de Santana do Livramento
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 55-32422033<br />
                                    E-mail: sindbancarioslivramento@gmail.com<br />
                                    Endereço: Rua Silveira Martins, 672<br />
                                    Santana do Livramento/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>

                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            Santiago-Sindicato dos Empregados em Estabelecimentos Bancários de Santiago
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 55-32511564<br />
                                    E-mail: seebsantiago@gmail.com<br />
                                    Endereço: Rua Silveira Martins, 1837 Casa<br />
                                    Santiago/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            Santo Ângelo-Sindicato dos Empregados em Estabelecimentos Bancários de Santo Ângelo
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 55-33134949<br />
                                    E-mail: sseebsa@san.psi.br<br />
                                    Endereço: Rua Andradas, 1161<br />
                                    Santo Ângelo/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>

                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            São Borja-Sindicato dos Empregados em Estabelecimentos Bancários de São Borja
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 55-34313551<br />
                                    E-mail: seebsb@ps5.com.br<br />
                                    Endereço: Rua General Marques,728 Sala 102<br />
                                    São Borja/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            São Gabriel-Sindicato dos Empregados em Estabelecimentos Bancários de São Gabriel
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 55-32326323 <br />
                                    E-mail: seebsaogabriel@gmail.com<br />
                                    Endereço: Rua João Manoel, 261<br />
                                    São Gabriel/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>

                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            São Leopoldo - Sindicato dos Empregados em Estabelecimentos Bancários de São Leopoldo
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 51-35902332 <br />
                                    E-mail: sindbancsl@terra.com.br<br />
                                    Endereço: Rua Flores da Cunha, 229<br />
                                    São Leopoldo/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            São Luiz Gonzaga-Sindicato dos Empregados em Estabelecimentos Bancários de São Luiz Gonzaga
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 55-33522190 <br />
                                    E-mail: sindicatodosbancariosslgonzaga@gmail.com<br />
                                    Endereço: Rua Bento Boeira de Souza, 2780 - Casa<br />
                                    São Luiz Gonzaga/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>

                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            Sindicato dos Bancários e Trabalhadores do Ramo Financeiro de Chapecó e Região
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 49-33221159 <br />
                                    E-mail: seger@bancarioscco.com.br<br />
                                    Endereço: Rua Porto Alegre, 619 D<br />
                                    Chapecó/SC
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>
	
                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            Soledade-Sindicato dos Empregados em Estabelecimentos Bancários de Soledade
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 54-33812599 <br />
                                    E-mail: seebsol@terra.com.br<br />
                                    Endereço: Rua Quintino Bocaiúva, 623 cx. postal 12<br />
                                    Soledade/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>

                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            Uruguaiana-Sindicato dos Empregados em Estabelecimentos Bancários de Uruguaiana
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 55-34121709 <br />
                                    E-mail: seeburuguaiana@gmail.com<br />
                                    Endereço: Rua Domingos de Almeida 623 Cx. Postal 12<br />
                                    Uruguaiana/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            Vacaria-Sindicato dos Empregados em Estabelecimentos Bancários de Vacaria
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 54-32313667 <br />
                                    E-mail: seebvac@m2net.com.br<br />
                                    Endereço: Rua Dr. Flores, 352 sala 13<br />
                                    Vacaria/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>

                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            Vale do Caí-Sindicato dos Bancários e Financiários do Vale do Caí
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 51-36325055 <br />
                                    E-mail: sbfvaledocai@bol.com.br<br />
                                    Endereço: Rua Tristão Fagundes, 306<br />
                                    Bairro Ferroviário - Montenegro/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>
	
                    <div class="row">
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            Vale do Paranhana-Sindicato dos Empregados em Estabelecimentos Bancários do Vale do Paranhana
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                    
                                    Telefone: 51-35422356 <br />
                                    E-mail: seebtaq@tca.com.br<br />
                                    Endereço: Rua Tristão Monteiro, 1678<br />
                                    Centro - Taquara (Vale do Paranhana)/RS
                                    <br /><br />
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-6 __card--box">
                            <a href="#">
                            <h2>
                            </h2>
                            <div class="__card--content">
                                <div class="__text--3">
                                  
                                </div>
                            
                                <div class="clear-fix"></div>
                            </div>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    @endforeach
</div>

</section>
@endsection
