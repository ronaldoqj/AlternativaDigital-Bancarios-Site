@extends('layouts.layout-adm')

    @section('title') /Editar/ @endsection
    @section('subtitle') /Usuário/ @endsection

@section('content')

<div class="container-fluid">
    <usuarios-cadastro-page
    csrf="{{ csrf_token() }}"
    form-action="{{url('adm/usuario/edicao')}}"
    method="post"
    form-edition="{{ json_encode($user) }}"
    syndicates="{{ json_encode($syndicates) }}"
    permissions="{{ json_encode($permissions) }}"
    permissions-assigned="{{ json_encode($permissionsAssigned) }}"
    />
</div>

@endsection
