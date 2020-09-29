@extends('layouts.layout')

@section('css')
<link href="{{asset('/_site/css/pages/entidades-parceiras.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection


@section('content')
<section id="entidades-parceiras" class="container">

<div class="title-page">
    Entidades Parceiras
</div>


<div class="box-items">
    <div class="row">

        @forelse($return as $item)

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
            <div class="box-content mx-auto pa-3 transition-swing">
                
                <div class="content">
                    <div class="edit">
                        <a href="{{$item->link}}" target="_blank">
                            <div class="imagem-entidade-parceira" style="background-image: url({{url($item->file_pathfile . '/' . $item->file_namefile)}})"></div>
                        </a>
                    </div>
                </div>
                <div class="title">{{ $item->name }}</div>
                <div class="subtitle"> <a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a></div>
            </div>
        </div>

        @empty

        <div class="col-12 col-lg-3">
            <p class="emptyRegisters">Não há nenhuma entidade parceira no momento</p>
            <hr>
        </div>
        @endforelse
        
    </div>

</div>

</section>
@endsection
