@extends('layouts.layout')
@section('css')
<link href="{{asset('/_site/css/pages/home.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content')

<section id="news" class="container">

    <div class="row news-with-image">
        <div class="col-12 col-lg-5">
            <div class="test" style="background-image: url({{asset('/_site/assets/Home/corona-virus.jpg')}}); height: 150px">magem</div>
        </div>
        <div class="col-12 col-lg-7">
            <div class="test">Text</div>
        </div>
    </div>

</section>

@endsection
