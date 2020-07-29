@extends('layouts.layout-adm')
    
    @section('title') /Editar/ @endsection
    @section('subtitle') /Editais/ @endsection

@section('content')

<div class="container-fluid">
    
    @csrf
    <editais-cadastro-page form-action="{{url('adm/editais/edicao')}}" method="post" csrf="{{ csrf_token() }}" form-edition="{{$list}}" />

</div>
@endsection
