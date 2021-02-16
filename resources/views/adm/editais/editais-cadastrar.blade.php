@extends('layouts.layout-adm')

    @section('title') /Cadastrar/ @endsection
    @section('subtitle') /Editais/ @endsection

@section('content')

<div class="container-fluid">
    <editais-cadastro-page
        action-form="{{url('adm/editais')}}"
        method-url="/cadastro"
        entity="{{session()->get('configAdm')['entity']}}"
        sindicatos="{{ json_encode($sindicatos) }}"
        csrf="{{ csrf_token() }}"
    />
</div>

@endsection
