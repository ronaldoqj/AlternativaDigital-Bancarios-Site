@extends('layouts.layout-adm')
    
    @section('title') /Editar/ @endsection
    @section('subtitle') /Editais/ @endsection

@section('content')

<div class="container-fluid">
    <editais-cadastro-page
        action-form="{{url('adm/editais')}}"
        method-url="/edicao"
        form-edition="{{$list}}"
        entity="{{session()->get('configAdm')['entity']}}"
        sindicatos="{{ json_encode($sindicatos) }}"
        csrf="{{ csrf_token() }}"
    />
</div>

@endsection
