@extends('layouts.layout-adm')
    
    @section('title') /Editar/ @endsection
    @section('subtitle') /Sindicatos/ @endsection

@section('content')

<div class="container-fluid">

    <sindicatos-cadastro-page form-action="{{url('adm/sindicatos/edicao')}}" method="post" csrf="{{ csrf_token() }}" form-edition="{{$list}}" estados="{{$estados}}" />

</div>
@endsection
