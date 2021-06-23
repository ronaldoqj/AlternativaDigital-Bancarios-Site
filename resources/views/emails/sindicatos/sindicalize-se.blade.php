<div style="min-width:320px; max-width:700px; Margin:0 auto; background-color:#FAFAFA; font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr style="background-size: cover; background-image: url({{ $parameters->input('bannerPathFull') }});">
                <td style="padding: 50px 25px;" valign="middle"><img style="background-color: rgba(0, 0, 0, 0.6); padding:4px 10px; border-radius:3px;" src="{{ $parameters->input('logoPathFull') }}" width="140" /></td>
            </tr>
        </tbody>
    </table>

    <div style="font-size:28px; line-height:1.2; color:#555555; padding:30px 10px 25px 25px;">
        Formulário Sindicalize-se
    </div>

    <div style="font-size:18px; line-height:1.5; color:#555555; padding:10px 10px 10px 25px;">
        Formulário de sindicalização eletrônica via Portal dos Bancários RS
    </div>

    <!-- Coluna 1 -->
    <div style="padding-bottom:30px;width: auto; min-width: 320px; max-width: 350px; float: left;">
        <div style="color:#232323; font-size:17px; line-height:1.2; padding:45px 10px 20px 25px;">
            Dados básicos:
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">CPF:</strong> {{ $parameters->input('inputCpf') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">RG:</strong> {{ $parameters->input('inputRg') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Nome Completo:</strong> {{ $parameters->input('inputNome') }}
        </div>

        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Data de Nascimento:</strong> {{ $parameters->input('inputDataNascimento') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Sexo:</strong> {{ $parameters->input('inputSexo') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Estado Civil:</strong> {{ $parameters->input('inputEstadoCivil') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Celular:</strong> {{ $parameters->input('inputCelular') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Telefone Residencial:</strong> {{ $parameters->input('inputTelefoneResidencial') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">E-mail:</strong> {{ $parameters->input('inputEmail') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">CEP:</strong> {{ $parameters->input('inputCep') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Endereço Residencial:</strong> {{ $parameters->input('inputEnderecoResidencial') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Número:</strong> {{ $parameters->input('inputNumero') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Complemento:</strong> {{ $parameters->input('inputComplemento') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Bairro:</strong> {{ $parameters->input('inputBairro') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Cidade:</strong> {{ $parameters->input('inputCidade') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Estado:</strong> {{ $parameters->input('inputEstado') }}
        </div>
    </div>

    <!-- Coluna 2 -->
    <div style="padding-bottom:30px; min-width: 320px; max-width: 350px; float: left;">
        <div style="color:#232323; font-size:17px; line-height:1.2; padding:45px 10px 20px 25px;">
            Dados comerciais:
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Código do banco:</strong> {{ $parameters->input('inputCodigoBanco') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Banco:</strong> {{ $parameters->input('inputBanco') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Agência / Número:</strong> {{ $parameters->input('inputAgencia') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Função / Cargo:</strong> {{ $parameters->input('inputFuncaoCargo') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Data de admissão na empresa:</strong> {{ $parameters->input('inputDataAdmissaoEmpresa') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Matricula funcional:</strong> {{ $parameters->input('inputMatriculaFuncional') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">E-mail comercial:</strong> {{ $parameters->input('inputEmailComercial') }}
        </div>
    </div>


    <div style="clear: both;"></div>
    <!-- Coluna 3 -->
    <div style="padding-bottom:30px; min-width: 200px; max-width: 349px; float: left;">
        <div style="color:#232323; font-size:17px; line-height:1.2; padding:45px 10px 20px 25px;">
           Comunicação:
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Link ou nome do perfil Facebook:</strong> {{ $parameters->input('inputFacebook') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Link ou nome do perfil Twitter:</strong> {{ $parameters->input('inputTweeter') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Link ou nome do perfil Instagram:</strong> {{ $parameters->input('inputinstagram') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Link ou nome do perfil Linkedin:</strong> {{ $parameters->input('inputLinkedin') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Preferência de contatos oficiais do sindicato:</strong>
            <ul>
                @if ( $parameters->input('inputComunicadoEmail') )
                    <li>E-mail</li>
                @endif
                @if ( $parameters->input('inputComunicadoWhatsapp') )
                    <li>Whatsapp</li>
                @endif
                @if ( $parameters->input('inputComunicadoTelegram') )
                    <li>Telegram</li>
                @endif
                @if ( $parameters->input('inputComunicadoSms') )
                    <li>Sms</li>
                @endif
                @if ( $parameters->input('inputComunicadoOutro') )
                    <li><u>Outro meio</u>: {{ $parameters->input('inputComunicadoOutro') }}</li>
                @endif
                
            </ul>
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Aceitação dos termos de privacidade:</strong> <span style="color: {{ $parameters->input('inputAceitar') ? 'green': 'red' }};">{{ $parameters->input('inputAceitar') ? 'Sim': 'Não' }}</span>
        </div>
    </div>
    
    <div style="clear: both;"></div>
    <div style="background-color:#ffffff; color:#848484; padding:20px; text-align:center; line-height:1.2; font-size:12px;">
        Direitos reservados ao Portal dos Bancários RS <strong>|</strong> FETRAFI-RS.
    </div>
</div>