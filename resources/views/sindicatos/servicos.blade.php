@extends('layouts.layout-sindicato')
@section('css')
    <link href="{{url(mix('/_site/css/pages/sindicatos/servicos.css'))}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content-syndicate')




<section id="servicos">

    <div class="container">
        <div class="title-page">
            Serviços
        </div>

        <p class="mt-5">
        
        {!! $data->texto ?? '' !!}
    </div>
    
</section>

@endsection
