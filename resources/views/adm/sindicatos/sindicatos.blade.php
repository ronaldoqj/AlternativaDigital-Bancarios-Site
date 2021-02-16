@extends('layouts.layout-adm')

    @section('title') /Sindicatos/ @endsection
    @section('subtitle') /Sindicatos/ @endsection

@section('content')
<div class="container-fluid">
    <div>
        <sindicatos-page
            action-form="/adm/sindicatos"
            page="aviso"
            prop-list="{{ json_encode($return['list']) }}"
            csrf="{{ csrf_token() }}"
        />
    </div>
</div>
@endsection
