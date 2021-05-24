@extends('layouts.layout-adm')

    @section('subtitle') /home @endsection

@section('js')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <home-page
            csrf="{{ csrf_token() }}"
            perfil="{{auth()->user()->perfil}}"
            list-syndicates="{{json_encode($syndicates)}}"
            list-portal="{{json_encode($portal)}}"
            permissions="{{ json_encode(session()->get('permissions')) }}"
            >
            </home-page>
        </div>
    </div>
</div>
@endsection
