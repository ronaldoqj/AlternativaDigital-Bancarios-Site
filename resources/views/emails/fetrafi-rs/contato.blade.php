<div style="min-width:320px; max-width:700px; Margin:0 auto; background-color:#FAFAFA; font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr style="background-size: cover; background-image: url({{ $parameters->input('bannerPathFull') }});">
                <td style="padding: 50px 25px;" valign="middle"><img style="background-color: rgba(0, 0, 0, 0.6); padding:4px 10px; border-radius:3px;" src="{{ $parameters->input('logoPathFull') }}" width="140" /></td>
            </tr>
        </tbody>
    </table>

    <div style="font-size:28px; line-height:1.2; color:#555555; padding:30px 10px 25px 25px;">
        Formulário de Contato
    </div>

    <div style="font-size:18px; line-height:1.5; color:#555555; padding:10px 10px 10px 25px;">
        Formulário de contato via Portal dos Bancários RS.
    </div>

    <!-- Coluna 1 -->
    <div style="padding-bottom:30px;">
        <div style="color:#232323; font-size:17px; line-height:1.2; padding:45px 10px 20px 25px;">
            Dados Pessoais:
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Nome:</strong> {{ $parameters->input('nome') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">E-mail:</strong> {{ $parameters->input('email') }}
        </div>
    </div>

    <!-- Coluna 2 -->
    <div style="padding-bottom:30px;">
        <div style="color:#232323; font-size:17px; line-height:1.2; padding:45px 10px 20px 25px;">
            Mensagem:
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
            <strong style="color: #777;">Assunto:</strong> {{ $parameters->input('assunto') }}
        </div>
        <div style="color:#848484; font-size:15px; line-height:1.2; padding:15px 0 0 25px;">
        <strong style="color: #777;">Mensagem:</strong> {{ $parameters->input('mensagem') }}
        </div>
    </div>
    
    <div style="clear: both;"></div>
    <div style="background-color:#ffffff; color:#848484; padding:20px; text-align:center; line-height:1.2; font-size:12px;">
        Direitos reservados ao Portal dos Bancários RS <strong>|</strong> FETRAFI-RS.
    </div>
</div>
