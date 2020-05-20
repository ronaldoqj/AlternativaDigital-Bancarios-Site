@extends('layouts.layout')
@section('css')
<link href="{{asset('/_site/css/pages/editais.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content')


<section id="editais" class="container">

<div class="title-page">
    Editais
</div>

 <?php for($i=0; $i<5; $i++) { ?>

    <div class="row __news--editais">
        <div class="col-12 col-md-6 __news--box">
            <div class="__news--content">
                <div class="__text--1">Edital FETRAFI-RS | 06/06/2018</div>
                <div class="__text--2">EDITAL DE CONVOCAÇÃO DE TRABALHADORES(AS) EM INSTITUIÇÕES FINANCEIRAS</div>
                <div class="__text--3">Os SINDICATOS DOS EMPREGADOS EM ESTABELECIMENTOS BANCÁRIOS: DE ALEGRETE E REGIÃO, com sede na rua Gal. Sampaio, 1040, 2° andar, Conj. 06, na cidade de... </div>
                
                <div class="d-flex __icons--editais">
                    <div class="icon-file mr-auto">
                        <h6>&nbsp;</h6>
                        <div class="icon-pdf"></div>
                    </div>
                    <div class="icons-socials">
                        <h6>Compartilhar</h6>
                        <div class="icon-whatapp"></div>
                        <div class="icon-instagram"></div>
                        <div class="icon-twitter"></div>
                        <div class="icon-facebook"></div>
                    </div>
                </div>

                <div class="clear-fix"></div>
            </div>
        </div>
        
        <div class="col-12 col-md-6 __news--box">
            <div class="__news--content">
                <div class="__text--1">Edital FETRAFI-RS | 06/06/2018</div>
                <div class="__text--2">EDITAL DE CONVOCAÇÃO DE TRABALHADORES(AS) EM INSTITUIÇÕES FINANCEIRAS</div>
                <div class="__text--3">Os SINDICATOS DOS EMPREGADOS EM ESTABELECIMENTOS BANCÁRIOS: DE ALEGRETE E REGIÃO, com sede na rua Gal. Sampaio, 1040, 2° andar, Conj. 06, na cidade de... </div>
                
                <div class="d-flex __icons--editais">
                    <div class="icon-file mr-auto">
                        <h6>&nbsp;</h6>
                        <div class="icon-pdf"></div>
                    </div>
                    <div class="icons-socials">
                        <h6>Compartilhar</h6>
                        <div class="icon-whatapp"></div>
                        <div class="icon-instagram"></div>
                        <div class="icon-twitter"></div>
                        <div class="icon-facebook"></div>
                    </div>
                </div>

                <div class="clear-fix"></div>
            </div>
        </div>
    </div>

 <?php } ?>




    
    

    <!-- play.png -->


</section>

@endsection
