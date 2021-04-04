
/**
 * Input Fields
 */

// Dados Pessoais
var inputCpf;
var inputRg;
var inputNome;
var inputDataNascimento;
var inputSexo;
var inputEstadoCivil;
var inputCelular;
var inputTelefoneResidencial;
var inputEmail;
var inputCep;
var inputEnderecoResidencial;
var inputNumero;
var inputComplemento;
var inputBairro;
var inputCidade;
var inputEstado;

// Dados Comerciais
var inputCodigoBanco;
var inputBanco;
var inputAgencia;
var inputFuncaoCargo;
var inputDataAdmissaoEmpresa;
var inputMatriculaFuncional;
var inputEmailComercial;

// Comunicação
var inputFacebook;
var inputTweeter;
var inputInstagram;
var inputLinkedin;
var inputComunicadoEmail;
var inputComunicadoWhatsapp;
var inputComunicadoTelegram;
var inputComunicadoSms;
var inputComunicadoOutro;

// Termos e condições
var inputAceitar;
var inputRejeitar;


/**
 * Inputs Obrigatórios
 * @type Array arrayInputsRequired
 */

var arrayInputs = {
    inputCpf:                 { nameVar: 'inputCpf',                 id: 'inputCpf',                 title: 'CPF' },
    inputRg:                  { nameVar: 'inputRg',                  id: 'inputRg',                  title: 'RG' },
    inputNome:                { nameVar: 'inputNome',                id: 'inputNome',                title: 'Nome Completo' },
    inputDataNascimento:      { nameVar: 'inputDataNascimento',      id: 'inputDataNascimento',      title: 'Data de Nascimento' },
    inputSexo:                { nameVar: 'inputSexo',                id: 'inputSexo',                title: 'Sexo' },
    inputEstadoCivil:         { nameVar: 'inputEstadoCivil',         id: 'inputEstadoCivil',         title: 'Estado Cívil' },
    inputCelular:             { nameVar: 'inputCelular',             id: 'inputCelular',             title: 'Celular' },
    inputTelefoneResidencial: { nameVar: 'inputTelefoneResidencial', id: 'inputTelefoneResidencial', title: 'Telefone Residencial' },
    inputEmail:               { nameVar: 'inputEmail',               id: 'inputEmail',               title: 'E-mail' },
    inputCep:                 { nameVar: 'inputCep',                 id: 'inputCep',                 title: 'CEP' },
    inputEnderecoResidencial: { nameVar: 'inputEnderecoResidencial', id: 'inputEnderecoResidencial', title: 'Endereco Residencial' },
    inputNumero:              { nameVar: 'inputNumero',              id: 'inputNumero',              title: 'Número' },
    inputComplemento:         { nameVar: 'inputComplemento',         id: 'inputComplemento',         title: 'Complemento' },
    inputBairro:              { nameVar: 'inputBairro',              id: 'inputBairro',              title: 'Bairro' },
    inputCidade:              { nameVar: 'inputCidade',              id: 'inputCidade',              title: 'Cidade' },
    inputEstado:              { nameVar: 'inputEstado',              id: 'inputEstado',              title: 'Estado' },

    // Dados Comerciais
    inputCodigoBanco:         { nameVar: 'inputCodigoBanco',         id: 'inputCodigoBanco',         title: 'Código do Banco' },
    inputBanco:               { nameVar: 'inputBanco',               id: 'inputBanco',               title: 'Banco' },
    inputAgencia:             { nameVar: 'inputAgencia',             id: 'inputAgencia',             title: 'Agência / Número' },
    inputFuncaoCargo:         { nameVar: 'inputFuncaoCargo',         id: 'inputFuncaoCargo',         title: 'Função / Cargo' },
    inputDataAdmissaoEmpresa: { nameVar: 'inputDataAdmissaoEmpresa', id: 'inputDataAdmissaoEmpresa', title: 'Data de admissao na empresa' },
    inputMatriculaFuncional:  { nameVar: 'inputMatriculaFuncional',  id: 'inputMatriculaFuncional',  title: 'Matricula Funcional' },
    inputEmailComercial:      { nameVar: 'inputEmailComercial',      id: 'inputEmailComercial',      title: 'E-mail Comercial' },

    // Comunicação
    inputFacebook:            { nameVar: 'inputFacebook',            id: 'inputFacebook',            title: 'Link Facebook' },
    inputTweeter:             { nameVar: 'inputTweeter',             id: 'inputTweeter',             title: 'Link Tweeter' },
    inputInstagram:           { nameVar: 'inputInstagram',           id: 'inputInstagram',           title: 'Link Instagram' },
    inputLinkedin:            { nameVar: 'inputLinkedin',            id: 'inputLinkedin',            title: 'Link Linkedin' },
    inputComunicadoEmail:     { nameVar: 'inputComunicadoEmail',     id: 'inputComunicadoEmail',     title: 'Comunicado via Email' },
    inputComunicadoWhatsapp:  { nameVar: 'inputComunicadoWhatsapp',  id: 'inputComunicadoWhatsapp',  title: 'Comunicado via Whatsapp' },
    inputComunicadoTelegram:  { nameVar: 'inputComunicadoTelegram',  id: 'inputComunicadoTelegram',  title: 'Comunicado via Telegram' },
    inputComunicadoSms:       { nameVar: 'inputComunicadoSms',       id: 'inputComunicadoSms',       title: 'Comunicado via Sms' },
    inputComunicadoOutro:     { nameVar: 'inputComunicadoOutro',     id: 'inputComunicadoOutro',     title: 'Comunicado via Outro' },

    // Termos e condições
    inputAceitar:             { nameVar: 'inputAceitar',             id: 'inputAceitar',             title: 'Aceitar' },
    inputRejeitar:            { nameVar: 'inputRejeitar',            id: 'inputRejeitar',            title: 'Rejeitar' }
}

var arrayInputsRequired = [
    'inputSexo',
    'inputEstadoCivil',
    'inputBairro',
    'inputCidade',
    'inputEstado',

    'inputCodigoBanco',
    'inputBanco',
    'inputDataAdmissaoEmpresa'
];

var arrayInputsRequiredOneOrAnother = [
    'inputAceitar',
    'inputRejeitar'
];

function init()
{
    $('#inputCpf').mask('000.000.000-00', {reverse: true});
    $('#inputCelular').mask('(00) 00000-0000', {placeholder: "(00) 00000-0000"});
    $('#inputTelefoneResidencial').mask('(00) 00000-0000', {placeholder: "(00) 00000-0000"});
    $('#inputDataNascimento').mask("00/00/0000", {placeholder: "__/__/____"});
    $('#inputCep').mask('00000-000', {placeholder: "____-__"});
    $('#inputDataAdmissaoEmpresa').mask("00/00/0000", {placeholder: "__/__/____"});
}


function setVariables()
{

    for ( input in arrayInputs )
    {
        window[arrayInputs[input]] = $(`#${arrayInputs[input]}`).val();
    }

    // inputCpf = $('#input-cpf').val();
    // inputRg = $('#input-rg').val();
    // inputNome = $('#input-nome').val();
    // inputDataNascimento = $('#input-data-nascimento').val();
    // inputSexo = $('#input-sexo').val();
    // inputEstadoCivil = $('#input-estado-civil').val();
    // inputCelular = $('#input-celular').val();
    // inputTelefoneResidencial = $('#input-telefone-residencial').val();
    // inputEmail = $('#input-email').val();
    // inputCep = $('#input-cep').val();
    // inputEnderecoResidencial = $('#input-endereco-residencial').val();
    // inputNumero = $('#input-numero').val();
    // inputComplemento = $('#input-complemento').val();
    // inputBairro = $('#input-bairro').val();
    // inputCidade = $('#input-cidade').val();
    // inputEstado = $('#input-estado').val();

    // // Dados Comerciais
    // inputCodigoBanco = $('#input-codigo-banco').val();
    // inputBanco = $('#input-banco').val();
    // inputAgencia = $('#input-agencia').val();
    // inputFuncaoCargo = $('#input-funcao-cargo').val();
    // inputDataAdmissaoEmpresa = $('#input-data-admissao-empresa').val();
    // inputMatriculaFuncional = $('#input-matricula-funcional').val();
    // inputEmailComercial = $('#input-email-comercial').val();

    // // Comunicação
    // inputFacebook = $('#input-facebook').val();
    // inputTweeter = $('#input-tweeter').val();
    // inputInstagram = $('#input-instagram').val();
    // inputLinkedin = $('#input-linkedin').val();
    // inputComunicadoEmail = $('#input-comunicado-email').val();
    // inputComunicadoWhatsapp = $('#input-comunicado-whatsapp').val();
    // inputComunicadoTelegram = $('#input-comunicado-telegram').val();
    // inputComunicadoSms = $('#input-comunicado-sms').val();
    // inputComunicadoOutro = $('#input-comunicado-outro').val();

    // // Termos e condições
    // inputAceitar = $('#input-aceitar').val();
    // inputRejeitar = $('#input-rejeitar').val();
}

function returnInputWithErrors() {

    for (item in arrayInputsRequired)
    {
        console.log(arrayInputsRequired[item], window[arrayInputsRequired[item]]);
    }

}

function validationForm()
{

    $( "#form-sindicalize-se" ).submit(function(event) {

        if ( !$('#inputAceitar').filter(":checked").val() && !$('#inputRejeitar').filter(":checked").val() )
        {
            $('#alert-privacity').removeClass('false').addClass('show');

            event.preventDefault();
        }
    });
    
    $('#close-alert-privacity').click(function(){
        $('#alert-privacity').removeClass('show').addClass('false');
    });


    /** Checkboxes of terms */
    $('#inputAceitar').click(function(){
        $( "#inputRejeitar" ).prop( "checked", false );
    });
    $('#inputRejeitar').click(function(){
        $( "#inputAceitar" ).prop( "checked", false );
    });
}

$(document).ready(function ()
{
    init();
    validationForm();
});
