@extends('layouts.layout-adm')

    @section('title') /Home @endsection
    @section('subtitle') /home @endsection

@section('js')
@endsection

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col">
            <home-page csrf="{{ csrf_token() }}"></home-page>
        </div>
    </div>
</div>
@endsection
