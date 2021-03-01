@extends('layouts.layout-adm')
    
    @section('title') /Editar/ @endsection
    @section('subtitle') /Sindicatos/ @endsection

@section('content')

<div class="container-fluid">

    <portal-page
        form-action="{{Route('adm-portal')}}"
        method="post"
        form-edition="{{json_encode($data)}}"
        csrf="{{ csrf_token() }}"
    />

</div>
@endsection
