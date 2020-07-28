@extends('layouts.layout-adm')
    
    @section('title') /Editar/ @endsection
    @section('subtitle') /Acordos e Convenções/ @endsection

@section('content')

<div class="container-fluid">
    
    @csrf
    <acordos-e-convencoes-cadastro-page form-action="{{url('adm/acordos-e-convencoes/edicao')}}" method="post" csrf="{{ csrf_token() }}" form-edition="{{$list}}" entidades="{{ $entidades }}" />

</div>
@endsection
