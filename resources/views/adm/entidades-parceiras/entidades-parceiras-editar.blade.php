@extends('layouts.layout-adm')
    
    @section('title') /Editar/ @endsection
    @section('subtitle') /Entidades Parceiras/ @endsection

@section('content')

<div class="container-fluid">
    
    @csrf
    <entidades-parceiras-cadastro-page form-action="{{url('adm/entidades-parceiras/edicao')}}" method="post" csrf="{{ csrf_token() }}" form-edition="{{$list}}" />

</div>
@endsection
