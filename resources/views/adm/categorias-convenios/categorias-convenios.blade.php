@extends('layouts.layout-adm')

    @section('title') /Categorias Convenios/ @endsection
    @section('subtitle') /Listagem/ @endsection

@section('content')
<div class="container-fluid">

    <div>
        <categorias-convenios-page
            action-form="/adm/categorias-convenios"
            prop-list="{{ $return }}"
            csrf="{{ csrf_token() }}"
        />
    </div>

</div>
@endsection
