@extends('layouts.layout-adm')

    @section('title') /Cadastrar/ @endsection
    @section('subtitle') /Usuários/ @endsection

@section('content')

<div class="container-fluid">
    <usuarios-cadastro-page
    csrf="{{ csrf_token() }}"
    form-action="{{url('adm/usuarios/cadastro')}}"
    method="post"
    syndicates="{{ json_encode($syndicates) }}"
    permissions="{{ json_encode($permissions) }}"
    />
</div>

@endsection
