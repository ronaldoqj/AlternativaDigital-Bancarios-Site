@extends('layouts.layout-adm')
    <!-- Title e Subtitle da página -->
    @section('title') /Bancos/ @endsection
    @section('subtitle') /Listagem dos bancos/ @endsection

@section('content')
<div class="container-fluid">
    <div>
        <form-default-combobox
            action-form="/adm/bancos/actions"
            prop-get-params="{{ json_encode($return->toArray()) }}"
            csrf="{{ csrf_token() }}"
            page="bancos"
        />
    </div>
</div>
@endsection
