@extends('layouts.layout-adm')

    @section('title') /Cadastrar/ @endsection
    @section('subtitle') /Campanhas/ @endsection

@section('content')

<div class="container-fluid">
    <campanhas-cadastro-page form-action="{{url('adm/campanhas/cadastro')}}" method="post" csrf="{{ csrf_token() }}" />
</div>

@endsection
