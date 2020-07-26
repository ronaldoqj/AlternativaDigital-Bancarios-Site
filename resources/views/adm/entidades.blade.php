@extends('layouts.layout-adm')
    <!-- Title e Subtitle da página -->
    @section('title') /Entidades/ @endsection
    @section('subtitle') /Listagem das entidades/ @endsection

@section('content')
<div class="container-fluid">
    <div>
        <form-default-combobox
            action-form="/adm/entidades/actions"
            prop-get-params="{{ json_encode($return->toArray()) }}"
            csrf="{{ csrf_token() }}"
            page="entidades"
        />
    </div>
</div>
@endsection
