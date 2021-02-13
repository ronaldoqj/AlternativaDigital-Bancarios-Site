@extends('layouts.layout-adm')

    @section('title') /Editar/ @endsection
    @section('subtitle') /Notícia/ @endsection

@section('js')
    <script type="text/javascript" src="/plugins/ckeditor/ckeditor.js"></script>
@endsection

@section('beforeDivApp')
<!-- ===================================================================================== -->
<!-- Como colocar o plugin ckeditor normal html jquery dentro do vue e manipular seu valor -->
<!-- ===================================================================================== -->
<!--
    Ganbiarra para fazer funcionar o ckeditor de html normal dentro do vue
    1) Primeiramente tem que se criar uma variavel JS que conterá o ckeditor logo após os seguintes passos
    2) Então se cria o elemento html textarea fora da div que renderiza o vue
    3) Após isso no jquery, na função "ready" mover o elemento html para dentro de uma div intena do component vue
    4) Após a div ser movida é instanciado o ckedior e armazenado na variavel criada pelo primeiro passo
    5) Internamente no vue pode ser usada as funções get e set do ckeditor que são:
        variavelCkeditor.setData('Valor a ser inserido');
        variavelCkeditor.getData();
-->
<div id="ckEditorHtml" style="display: none;">
    <textarea id="ckeditorInputTexto" name="ckeditorInputTexto"></textarea>
</div>
<script>
    var textoCkeditor = '';
    $( document ).ready(function() {
        $("#ckeditorInputTexto").appendTo('#ckeditor')
        textoCkeditor = CKEDITOR.replace( 'ckeditorInputTexto' );
    });
</script>
@endsection

@section('content')
<div class="container-fluid">
    <noticias-cadastro-page ref="cadastro" form-action="{{url('adm/noticias/edicao')}}" banks="{{ $bancos }}" syndicates="{{ $sindicatos }}" method="post" csrf="{{ csrf_token() }}" noticia-edition="{{$noticia}}" registered-syndicates="{{$registeredSyndicates}}" registered-banks="{{$registeredBanks}}" />
</div>
@endsection