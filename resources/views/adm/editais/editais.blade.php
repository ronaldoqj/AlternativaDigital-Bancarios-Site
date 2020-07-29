@extends('layouts.layout-adm')

    @section('title') /Editais/ @endsection
    @section('subtitle') /Editais/ @endsection

@section('content')
<div class="container-fluid">
    
    <div>
        <editais-page
            action-form="/adm/editais"
            page="edital"
            prop-list="{{ json_encode($return) }}"
            csrf="{{ csrf_token() }}"
        />
    </div>

</div>
@endsection
