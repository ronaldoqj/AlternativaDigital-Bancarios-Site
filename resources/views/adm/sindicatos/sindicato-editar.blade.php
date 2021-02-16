@extends('layouts.layout-adm')
    
    @section('title') /Editar/ @endsection
    @section('subtitle') /Sindicatos/ @endsection

@section('content')

<div class="container-fluid">

    <sindicatos-cadastro-page
        form-action="{{url('adm/sindicatos/edicao')}}"
        method="post"
        form-edition="{{$list}}"
        estados="{{$estados}}"
        csrf="{{ csrf_token() }}"
    />

</div>
@endsection
