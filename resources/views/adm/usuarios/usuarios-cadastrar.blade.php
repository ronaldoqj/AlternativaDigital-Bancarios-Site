@extends('layouts.layout-adm')

    @section('title') /Cadastrar/ @endsection
    @section('subtitle') /Usuários/ @endsection

@section('content')

<div class="container-fluid">
    <usuarios-cadastro-page form-action="{{url('adm/usuarios/cadastro')}}" method="post" csrf="{{ csrf_token() }}" />
</div>

@endsection
