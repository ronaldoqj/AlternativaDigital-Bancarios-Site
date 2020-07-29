@extends('layouts.layout-adm')

    @section('title') /Cadastrar/ @endsection
    @section('subtitle') /Editais/ @endsection

@section('content')

<div class="container-fluid">
    <editais-cadastro-page form-action="{{url('adm/editais/cadastro')}}" method="post" csrf="{{ csrf_token() }}" />
</div>

@endsection
