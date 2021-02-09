@extends('layouts.layout-adm')

    @section('title') /Cadastrar/ @endsection
    @section('subtitle') /Sindicatos/ @endsection

@section('content')

<div class="container-fluid">
    <sindicatos-cadastro-page form-action="{{url('adm/sindicatos/cadastro')}}" method="post" csrf="{{ csrf_token() }}" estados="{{$estados}}" />
</div>

@endsection
