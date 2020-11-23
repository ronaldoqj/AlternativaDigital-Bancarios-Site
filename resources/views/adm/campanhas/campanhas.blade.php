@extends('layouts.layout-adm')

    @section('title') /Campanhas/ @endsection
    @section('subtitle') /Campanhas/ @endsection

@section('content')
<div class="container-fluid">
    
    <div>
        <campanhas-page action-form="/adm/campanhas" page="aviso" prop-list="{{ json_encode($return) }}" csrf="{{ csrf_token() }}"/>
    </div>

</div>
@endsection
