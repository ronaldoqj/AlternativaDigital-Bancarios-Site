@extends('layouts.layout-adm')

    @section('title') /Cadastrar/ @endsection
    @section('subtitle') /Acordos e Convenções/ @endsection

@section('content')

<div class="container-fluid">
    <acordos-e-convencoes-cadastro-page form-action="{{url('adm/acordos-e-convencoes/cadastro')}}" entidades="{{ $entidades }}" method="post" csrf="{{ csrf_token() }}" />
</div>

@endsection
