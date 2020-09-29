@extends('layouts.layout')


@section('metatags')

@endsection


@section('css')
<link href="{{asset('/_site/css/pages/editais.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection


@section('content')
<section id="editais" class="container">

<div class="title-page">
    Editais
</div>

@forelse($editais as $item)

    @if($loop->iteration % 2 == 1)
    <div class="row __news--editais">
    @endif
        <div class="col-12 col-md-6 __news--box">
            <div class="__news--content">
                <div class="__text--1">{{ $item->cartola }} | {{ \Carbon\Carbon::parse($item->dataInclusao)->format('d/m/Y') }} <!--span>#{{$item->tags}}</span--></div>
                <div class="__text--2">{{ $item->titulo }}</div>
                <div class="__text--3">{{ $item->linhaDeApoio }}</div>

                <div class="__icons--editais">
                    <div class="SHARED__download"> <a href='{{ url("/editais/download/{$item->id}") }}'><img src="{{asset('/_site/assets/SVGs/baixar-edital.svg')}}" class="img-fluid" onload="SVGInject(this)" title="{{ $item->file_namefile }}" /></a> </div>
                </div>

                <div class="titulo-btns">Compartilhar</div>
                <div class="SHARED__icons__socials--midia">
                    <div> <a href="{{url('editais#')}}" title="Facebook" class="btSocialNetwork"><img src="{{asset('/_site/assets/SVGs/Facebook-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                    <div> <a href="{{url('editais#')}}" title="Twitter" class="btSocialNetwork"><img src="{{asset('/_site/assets/SVGs/Twitter-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                    <!-- <div> <a href="#"><img src="{{asset('/_site/assets/SVGs/Instagram-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div> -->
                    <div> <a href='{{ "whatsapp://send?text=$item->titulo - " . url("noticia") }}' title="Whatsapp" class="btSocialNetwork"><img src="{{asset('/_site/assets/SVGs/Whatsapp-Vertical.svg')}}" class="img-fluid" onload="SVGInject(this)" /></a> </div>
                </div>

                <div class="clear-fix"></div>
            </div>
        </div>
    @if($loop->iteration % 2 == 0 || $loop->last)
    </div>
    @endif

@empty
    <p class="emptyRegisters">Não há editais no momento</p>
    <hr>
@endforelse

</section>
@endsection
