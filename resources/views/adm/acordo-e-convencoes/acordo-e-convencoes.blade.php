@extends('layouts.layout-adm')

    @section('title') /Acordos e Convenções/ @endsection
    @section('subtitle') /Acordos e Convenções/ @endsection

@section('content')
<div class="container-fluid">
    
    <div>
        <acordos-e-convencoes-page
            action-form="/adm/acordos-e-convencoes"
            page="acordo e convencao"
            prop-list="{{ json_encode($return) }}"
            csrf="{{ csrf_token() }}"
        />
    </div>

</div>
@endsection
