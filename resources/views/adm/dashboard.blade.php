@extends('layouts.layout-adm')

    @section('title') /Dashboard @endsection
    @section('subtitle') /dashboard @endsection

@section('js')
@endsection

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col">
            <dashboard-page perfil="{{auth()->user()->perfil}}" csrf="{{ csrf_token() }}" list-sindicates="{{json_encode($sindicates)}}"></home-page>
        </div>
    </div>
</div>
@endsection
