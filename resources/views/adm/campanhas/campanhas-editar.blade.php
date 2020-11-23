@extends('layouts.layout-adm')
    
    @section('title') /Editar/ @endsection
    @section('subtitle') /Campanhas/ @endsection

@section('content')

<div class="container-fluid">
    
    @csrf
    <campanhas-cadastro-page form-action="{{url('adm/campanhas/edicao')}}" method="post" csrf="{{ csrf_token() }}" form-edition="{{$list}}" />

</div>
@endsection
