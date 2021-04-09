@extends('layouts.layout-adm')

    @section('subtitle') /home @endsection

@section('js')
@endsection

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col">
            <home-page perfil="{{auth()->user()->perfil}}" csrf="{{ csrf_token() }}" list-sindicates="{{json_encode($sindicates)}}" list-portal="{{json_encode($portal)}}"></home-page>
        </div>
    </div>
</div>
@endsection
