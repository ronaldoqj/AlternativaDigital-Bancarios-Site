@extends('layouts.layout-adm')

    @section('title') /Usuários/ @endsection
    @section('subtitle') /Usuários/ @endsection

@section('content')
<div class="container-fluid">
    
    <div>
        <usuarios-page
            action-form="/adm/usuarios"
            page="usuarios"
            prop-list="{{ $return['list'] }}"
            permissions="{{ json_encode($return['permissions']) }}"
            csrf="{{ csrf_token() }}"
        />
    </div>

</div>
@endsection
