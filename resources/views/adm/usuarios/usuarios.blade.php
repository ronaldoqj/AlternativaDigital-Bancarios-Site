@extends('layouts.layout-adm')

    @section('title') /Usuários/ @endsection
    @section('subtitle') /Usuários/ @endsection

@section('content')
<div class="container-fluid">
    
    <div>
        <usuarios-page
            action-form="/adm/usuarios"
            page="usuarios"
            prop-list="{{ json_encode($return) }}"
            csrf="{{ csrf_token() }}"
        />
    </div>

</div>
@endsection
