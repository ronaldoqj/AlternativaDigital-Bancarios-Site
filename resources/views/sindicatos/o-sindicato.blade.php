@extends('layouts.layout-sindicato')
@section('css')
    <link href="{{url(mix('/_site/css/pages/sindicatos/sindicalize-se.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content-syndicate')




<section id="o-sindicato">

    <div class="container">
        <div class="title-page mt-5 mb-5">
            O Sindicato
        </div>

        <div class="mt-4"></div>

        <h1>Sindicato de Camaquã</h1>
        
        <div class="mt-3 mb-3"></div>
        <p>
            O Sindicato dos Trabalhadores em Instituições Financeiras de Camaquã (Sindbancários Camaquã) foi fundado em 06 de agosto de 1988 com a denominação de Sindicato dos Empregados em Estabelecimentos Bancários de Camaquã, abrangendo - inicialmente - os municípios de Camaquã, Dom Feliciano, São Lourenço do Sul e Tapes. Em 2017 foi feita anexação de base e incluído os municípios de Amaral Ferrador, Arambaré, Cerro Grande do Sul, Chuvisca, Cristal, Mariana Pimentel e Sentinela do Sul.
        </p>
    </div>

    <div class="container container-responsive-img">
        <div class="responsive-imgs" style="background-image: url({{ asset('/_site/assets/_Sindicatos/_Pages/O-Sindicato/imagem-1.jpg') }});">        
        </div>
    </div> 

    <div class="container">
        <p>
            O primeiro Presidente da entidade foi Joel Pacheco de Abreu, funcionário de Banco do Brasil.
        </p>

        <p>
            O Sindicato sempre prestou sua contribuição a eterna luta Trabalho x Capital. Do período de fundação até hoje, a entidade teve vários momentos históricos importantes, como as grandes greves da categoria bancária, a primeira eleição direta pós-ditadura, o Fora Collor, as greves gerais, Marchas dos Sem, os atos a favor da Democracia, Fora Cunha, Fora Temer, Contra a Reforma Trabalhista do Temer e Contra a Reforma da Previdência do Bolsonaro. 
        </p>

        <p>
            O Sindbancários Camaquã orgulha-se de ter ajudado a eleger e reeleger o primeiro Presidente Operário do País, e a primeira Mulher Presidenta, nunca deixando de fazer a crítica quando ela foi necessária, sem adesismos inconsequentes e disputando os espaços democráticos que estiveram ao seu alcance. A entidade também coloca acima de tudo a autonomia, característica do sindicalismo combativo.
        </p>
    </div>
    
</section>

@endsection
