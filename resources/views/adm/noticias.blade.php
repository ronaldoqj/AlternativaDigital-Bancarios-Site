@extends('layouts.layout-adm')


@section('js')
@endsection

@section('content')

<div class="container-fluid">
    
    <div>
        <noticias-page prop-noticias="{{ json_encode($return) }}" />
    </div>

</div>
@endsection
