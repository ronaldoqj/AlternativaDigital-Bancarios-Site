@extends('layouts.layout-adm')

    @section('title') /Cadastrar/ @endsection
    @section('subtitle') /Entidades Parceiras/ @endsection

@section('content')

<div class="container-fluid">
    <entidades-parceiras-cadastro-page form-action="{{url('adm/entidades-parceiras/cadastro')}}" method="post" csrf="{{ csrf_token() }}" />
</div>

@endsection
