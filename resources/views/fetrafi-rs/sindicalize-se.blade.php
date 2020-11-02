@extends('layouts.layout-fetrafi-rs')
@section('css')
    <link href="{{url(mix('/_site/css/pages/fetrafi-rs/contato.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content-syndicate')


<section id="sindicalize-se">

    <div class="container">
        <div class="title-page">
            Sindicalize-se
        </div>

        <div class="description-of-page">
            <p class="mt-4 mb-4">As perguntas marcadas com asterisco (*) são obrigatórias. Após o preenchimento, confira seus dados e clique em “enviar”.</p>
        </div>      
        
        <!-- <div class="dados-bancarios">

        </div> -->

        <form class="fieldsRounded">
            <div class="row mb-3">
                <div class="col-12 col-md-12">
                    
                    <div class="form-group">
                        <label for="nome">Esta ficha é de*</label><br />
                        
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" value="1">
                            <label class="form-check-label" for="inlineRadio1">Sindicalização</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" value="2">
                            <label class="form-check-label" for="inlineRadio2">Recadastramento</label>
                        </div>
                    </div>
                    
                    <div class="form-group mt-5">
                        <label for="nome"><strong>Dados comerciais</strong></label>
                        <hr>
                    </div>

                    <div class="form-group">
                        <label for="nome">Banco*</label>
                        <input type="text" class="form-control" id="nome">
                    </div>
                    
                    <div class="form-group">
                        <label for="nome">Código do Banco*</label>
                        <input type="text" class="form-control" id="codigo-do-banco" name="codigo-do-banco">
                    </div>
                    
                    <div class="form-group">
                        <label for="nome">Agência / Número</label>
                        <input type="text" class="form-control" id="agencia-numero" name="agencia-numero">
                    </div>
                    
                    <div class="form-group">
                        <label for="nome">Telefone*</label>
                        <input type="text" class="form-control" id="telefone" name="telefone">
                    </div>
                    
                    <div class="form-group">
                        <label for="nome">Função / Cargo</label>
                        <input type="text" class="form-control" id="funcao-cargo" name="funcao-cargo">
                    </div>
                    
                    <div class="form-group">
                        <label for="nome">Admissão na empresa*</label>
                        <input type="text" class="form-control" id="admissao-na-empresa" name="admissao-na-empresa">
                    </div>
                    
                    <div class="form-group">
                        <label for="nome">Matrícula Funcional</label>
                        <input type="text" class="form-control" id="matricula-funcional" name="matricula-funcional">
                    </div>
                    
                    <div class="form-group">
                        <label for="nome">E-mail comercial</label>
                        <input type="text" class="form-control" id="email-comercial" name="email-comercial">
                    </div>
                </div>



                <div class="col-12 col-md-12 mt-5">
                    <div class="form-group">
                        <label for="nome"><strong>Dados Pessoais</strong></label>
                        <hr>
                    </div>

                    <div class="form-group">
                        <label for="nome">Nome Completo</label>
                        <input type="text" class="form-control" id="nome-completo" name="nome-completo">
                    </div>
                    
                    <div class="form-group">
                        <label for="nome">Data de Nascimento</label>
                        <input type="text" class="form-control" id="data-nascimento" name="data-nascimento">
                    </div>
                    
                    <!-- sexo -->
                    <div class="form-group">
                        <label for="nome">Sexo*</label><br />
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="radio-sexo" value="1">
                            <label class="form-check-label" for="inlineRadio1">Masculino</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="radio-sexo" value="2">
                            <label class="form-check-label" for="inlineRadio2">Feminino</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="nome">Estado Civil*</label>
                        <input type="text" class="form-control" id="nome">
                    </div>
                    
                    <div class="form-group">
                        <label for="nome">Naturalidade</label>
                        <input type="text" class="form-control" id="nome">
                    </div>
                    
                    <div class="form-group">
                        <label for="nome">Carteira de identidade</label>
                        <input type="text" class="form-control" id="nome">
                    </div>
                    



                    <div class="form-group">
                        <label for="nome">CPF</label>
                        <input type="text" class="form-control" id="cpf">
                    </div>
                    <div class="form-group">
                        <label for="nome">E-mail</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="nome">Telefone Residenci</label>
                        <input type="text" class="form-control" id="nome">
                    </div>
                    <div class="form-group">
                        <label for="nome">Celular</label>
                        <input type="text" class="form-control" name="celular">
                    </div>
                    <div class="form-group">
                        <label for="nome">Endereço Residencial (Logradouro)*</label>
                        <input type="text" class="form-control" id="nome">
                    </div>
                    <div class="form-group">
                        <label for="nome">No*</label>
                        <input type="text" class="form-control" id="nome">
                    </div>
                    <div class="form-group">
                        <label for="nome">Complemento (Bloco, Apartamento)</label>
                        <input type="text" class="form-control" id="bloco-apartamento" name="bloco-apartamento">
                    </div>
                    <div class="form-group">
                        <label for="nome">Bairro*</label>
                        <input type="text" class="form-control" id="bairro" name="bairro">
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="nome">CEP*</label>
                        <input type="text" class="form-control" id="cep" name="cep">
                    </div>
                    <div class="form-group">
                        <label for="nome">Cidade*</label>
                        <input type="text" class="form-control" id="cidade" name="cidade">
                    </div>
                    <div class="form-group">
                        <label for="nome">Estado*</label>
                        <input type="text" class="form-control" id="estado" name="estado">
                    </div>

                </div>






                <div class="col-12 col-md-12 mt-5">
                    <div class="form-group">
                        <label for="nome"><strong>Comunicação</strong></label>
                        <hr>
                    </div>

                    <div class="form-group">
                        <label for="nome">Em qual destas redes sociais você tem perfil?</label>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Facebook
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                Instagram
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                Twitter
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                Nenhuma das opções
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="nome">Como você prefere receber os comunicados oficiais do Sindicato?</label>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                E-mail
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                WhatsApp
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                Telegram
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                SMS
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                Outro meio
                            </label>
                            <label for="nome">Qual? Informe</label>
                            <input type="text" class="form-control" id="outro" name="outru">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                Não quero receber os comunicados do Sindicato.
                            </label>
                        </div>
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
