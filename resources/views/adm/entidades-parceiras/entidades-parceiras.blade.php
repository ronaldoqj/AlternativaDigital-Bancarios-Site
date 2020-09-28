@extends('layouts.layout-adm')

    @section('title') /Entidades Parceiras/ @endsection
    @section('subtitle') /Entidades Parceiras/ @endsection

@section('content')
<div class="container-fluid">
    
    <div>
        <entidades-parceiras-page
            action-form="/adm/entidades-parceiras"
            page="entidade-parceira"
            prop-list="{{ json_encode($return) }}"
            csrf="{{ csrf_token() }}"
        />
    </div>

</div>
@endsection
