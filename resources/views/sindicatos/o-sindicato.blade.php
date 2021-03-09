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

        {!! $data->texto ?? '' !!}
    </div>
    
</section>

@endsection
