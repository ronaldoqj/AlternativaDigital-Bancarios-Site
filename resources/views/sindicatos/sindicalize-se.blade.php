@extends('layouts.layout-sindicato')
@section('css')
    <link href="{{url(mix('/_site/css/pages/sindicatos/sindicalize-se.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('js')
    <script src="{{ url(mix('/_site/js/app.js')) }}"></script>
    <script src="{{ url(mix('/_site/js/pages/sindicalize-se.js')) }}"></script>
@endsection
@section('content-syndicate')

<section id="sindicalize-se">
    <div id="app" class="container">
        <div class="title-page">
            Sindicalize-se
        </div>

        @if ($msgEnvio !== '')
        <div class="alert alert-success alert-sucess-comum" role="alert">
            <button type="button" class="close close-alert-sucess-comum">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-heading">Inscrição enviada!</h4>
            <p>Iremos realizar as checagens dos dados, para isso, pode ser que precisaremos entrar em contato para validação de algumas informações.</p>
            <hr>
            <p class="mb-0">Obrigado pela sua candidatura.</p>
        </div>
        @endif

        <div class="description-of-page">
            <p class="mt-4">Realize sua sindicalização digital preenchendo o formulário abaixo com seus dados.</p>
        </div>      
        
        <form id="form-sindicalize-se" class="fieldsRounded" method="POST">
            @csrf
            <!--
              -- Dados Pessoais
             -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="form-group titles-of-section">
                        <label>Dados Pessoais</label>
                    </div>
                </div>    
            </div>

            <div class="row">
                <div class="col-6 col-md-4">
                    <div class="form-group">
                        <label for="inputCpf">CPF</label>
                        <input type="text" class="form-control" id="inputCpf" name="inputCpf">
                    </div>
                </div>    
                <div class="col-6 col-md-4">
                    <div class="form-group">
                        <label for="inputRg">RG</label>
                        <input type="text" class="form-control" id="inputRg" name="inputRg">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label for="inputNome">Nome Completo</label>
                        <input type="text" class="form-control" id="inputNome" name="inputNome">
                    </div>
                </div>
            </div>
            <div class="row">    
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="inputDataNascimento">Data de Nascimento</label>
                        <input type="text" class="form-control" id="inputDataNascimento" name="inputDataNascimento" placeholder="dd/mm/YYYY">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="inputSexo">Sexo*</label>
                        <select class="form-control" id="inputSexo" name="inputSexo" required>
                            <option></option>
                            <option value="F">Feminino</option>
                            <option value="M">Masculino</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="inputEstadoCivil">Estado Civil*</label>
                        <select class="form-control" id="inputEstadoCivil" name="inputEstadoCivil" required>
                            <option></option>
                            <option value="solteiro">Solteiro</option>
                            <option value="casado">Casado</option>
                            <option value="viuvo">Viúvo</option>
                            <option value="separado">Separado</option>
                            <option value="divorciado">Divorciado</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="inputCelular">Celular</label>
                        <input type="text" class="form-control" id="inputCelular" name="inputCelular">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="inputTelefoneResidencial">Telefone Residencial</label>
                        <input type="text" class="form-control" id="inputTelefoneResidencial" name="inputTelefoneResidencial">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label for="inputEmail">E-mail</label>
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="inputCep">CEP</label>
                        <input type="text" class="form-control" id="inputCep" name="inputCep">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="inputEnderecoResidencial">Endereço Residencial</label>
                        <input type="text" class="form-control" id="inputEnderecoResidencial" name="inputEnderecoResidencial">
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="form-group">
                        <label for="inputNumero">Número</label>
                        <input type="text" class="form-control" id="inputNumero" name="inputNumero">
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="form-group">
                        <label for="inputComplemento">Complemento</label>
                        <input type="text" class="form-control" id="inputComplemento" name="inputComplemento">
                    </div>
                </div>
            </div>
            <div class="row">    
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="inputBairro">Bairro*</label>
                        <input type="text" class="form-control" id="inputBairro" name="inputBairro" required>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="form-group">
                        <label for="inputCidade">Cidade*</label>
                        <input type="text" class="form-control" id="inputCidade" name="inputCidade" required>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="form-group">
                        <label for="inputEstado">Estado*</label>
                        <select class="form-control" id="inputEstado" name="inputEstado" required>
                            <option></option>
                            @foreach($estados as $estado)
                            <option value="{{ $estado->sigla }}">{{ $estado->estado }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!--
              -- Dados Comerciais
             -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="form-group titles-of-section">
                        <label>Dados comerciais</label>
                    </div>
                </div>    
            </div>
            <div class="row">
                <div class="col-6 col-md-2">
                    <div class="form-group">
                        <label for="inputCodigoBanco">Código do banco*</label>
                        <input type="text" class="form-control" id="inputCodigoBanco" name="inputCodigoBanco" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-8">
                    <div class="form-group">
                        <label for="inputBanco">Banco*</label>
                        <input type="text" class="form-control" id="inputBanco" name="inputBanco" required>
                    </div>
                </div>    
                <div class="col-6 col-md-4">
                    <div class="form-group">
                        <label for="inputAgencia">Agência / Número</label>
                        <input type="text" class="form-control" id="inputAgencia" name="inputAgencia">
                    </div>
                </div>
            </div>
            <div class="row">    
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="inputFuncaoCargo">Função / Cargo</label>
                        <input type="text" class="form-control" id="inputFuncaoCargo" name="inputFuncaoCargo">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="form-group">
                        <label for="inputDataAdmissaoEmpresa">Data de admissão na empresa*</label>
                        <input type="text" class="form-control" id="inputDataAdmissaoEmpresa" name="inputDataAdmissaoEmpresa" required>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="form-group">
                        <label for="inputMatriculaFuncional">Matricula Funcional</label>
                        <input type="text" class="form-control" id="inputMatriculaFuncional" name="inputMatriculaFuncional">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label for="inputEmailComercial">E-mail comercial</label>
                        <input type="email" class="form-control" id="inputEmailComercial" name="inputEmailComercial">
                    </div>
                </div>
            </div>

            <!--
              -- Comunicação
             -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="form-group titles-of-section">
                        <label>Comunicação</label>
                    </div>
                    <div class="form-group subtitles-of-section">
                        <label>Em qual destas redes sociais você tem perfil?</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="inputFacebook">Link ou nome do perfil do Facebook</label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <img src="{{asset('/_site/assets/SVGs/IconsOnlyLetters/facebook.svg')}}" class="img-fluid" onload="SVGInject(this)" />
                                </span>
                            </div>
                            <input type="text" class="form-control" id="inputFacebook" name="inputFacebook">
                        </div>
                    </div>
                </div>    
                <div class="col-12 col-md-6">
                    <label for="inputTweeter">Link ou nome do perfil do Twitter</label>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{asset('/_site/assets/SVGs/IconsOnlyLetters/twitter.svg')}}" class="img-fluid" onload="SVGInject(this)" />
                            </span>
                        </div>
                        <input type="text" class="form-control" id="inputFacebook" name="inputFacebook">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="inputinstagram">Link ou nome do perfil do Instagram</label>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{asset('/_site/assets/SVGs/IconsOnlyLetters/instagram.svg')}}" class="img-fluid" onload="SVGInject(this)" />
                            </span>
                        </div>
                        <input type="text" class="form-control" id="inputFacebook" name="inputFacebook">
                    </div>
                </div>    
                <div class="col-12 col-md-6">
                    <label for="inputinstagram">Link ou nome do perfil do LinkedIn</label>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{asset('/_site/assets/SVGs/IconsOnlyLetters/linkedin.svg')}}" class="img-fluid" onload="SVGInject(this)" />
                            </span>
                        </div>
                        <input type="text" class="form-control" id="inputFacebook" name="inputFacebook">
                    </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-12">
                    <div class="form-group subtitles-of-section">
                        <label>Como você prefere receber os comunicados oficiais do Sindicato?</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <div class="checkboxes-sindicalize-se options-of-comunication">
                            <div class="container-checkbox">
                                <div class="box-title">E-mail
                                <label class="box-checkbox">
                                    <input type="checkbox" checked="checked" id="inputComunicadoEmail" name="inputComunicadoEmail">
                                    <span class="checkmark"></span>
                                </label>
                                </div>
                            </div>
                            <div class="container-checkbox">
                                <div class="title">WhatsApp</div>
                                <label class="box-checkbox">
                                    <input type="checkbox" id="inputComunicadoWhatsapp" name="inputComunicadoWhatsapp">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="container-checkbox">
                                <div class="title">Telegram</div>
                                <label class="box-checkbox">
                                    <input type="checkbox" id="inputComunicadoTelegram" name="inputComunicadoTelegram">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="container-checkbox">
                                <div class="title">SMS</div>
                                <label class="box-checkbox">
                                    <input type="checkbox" id="inputComunicadoSms" name="inputComunicadoSms">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>    
                <div class="col-12 col-md-8">
                    <div class="form-group">
                        <label for="input-comunicado-outro">Outro meio. Qual?</label>
                        <input type="text" class="form-control" id="inputComunicadoOutro" name="inputComunicadoOutro">
                    </div>
                </div>
            </div>

            <!--
              -- Termos e condições
             -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="form-group subtitles-of-section">
                        <label>Política de Privacidade</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">                        
                        <div class="terms-of-condictions">
                            O Portal dos Bancários RS respeita sua privacidade, por isso entendemos a importância da sua segurança quando se trata da utilização dos seus dados pessoais e um diálogo sobre isso com você é fundamental.
                            <br />
                            Esclarecemos nesta Política de Privacidade quais dados pessoais podemos obter e como podemos utilizá-los.
                            <br />
                            Ela se aplica a todos os serviços disponibilizados pelo Portal e/ou Sindicato por meio de sites e portal.
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5">
                    <div class="form-group">
                        <div class="checkboxes-sindicalize-se privacity-and-terms">
                            <label class="box-checkbox green">
                                <p>Concordo com os termos</p>
                                <!-- <input type="checkbox" checked="checked" id="inputAceitar" name="inputAceitar"> -->
                                <input type="checkbox" id="inputAceitar" name="inputAceitar">
                                <span class="checkmark"></span>
                            </label>
                            <label class="box-checkbox red">
                                <p>Não concordo com os termos</p>
                                <input type="checkbox" id="inputRejeitar" name="inputRejeitar">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div id="alert-privacity" class="alert alert-danger alert-dismissible fade false" role="alert">
                    Por favor <strong>selecione</strong> o consentimento ou não dos termos de Privacidade
                    <button id="close-alert-privacity" type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>    
            </div>

            <!--
              -- Enviar
             -->
            <div class="row mt-4">
                <div class="col-12">
                    <button type="submit" id="btnSubmit" class="btn btn-primary btn-block">
                        <div>Enviar</div>
                    </button>
                </div>
            </div>
        </form>
    </div>
    
</section>

@endsection
