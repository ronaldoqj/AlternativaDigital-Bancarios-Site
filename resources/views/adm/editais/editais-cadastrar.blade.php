@extends('layouts.layout-adm')

    @section('title') /Cadastrar/ @endsection
    @section('subtitle') /Editais/ @endsection

@section('content')

<div class="container-fluid">
    <editais-cadastro-page action-form="{{url('adm/editais')}}" method-url="/cadastro" method="post" csrf="{{ csrf_token() }}" entity="{{session()->get('configAdm')['entity']}}" />
</div>

@endsection
