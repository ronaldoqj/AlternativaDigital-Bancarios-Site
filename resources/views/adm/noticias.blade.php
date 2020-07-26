@extends('layouts.layout-adm')

    @section('title') /Notícias/ @endsection
    @section('subtitle') /Notícia/ @endsection

@section('content')
<div class="container-fluid">
    
    <div>
        <noticias-page
            action-form="/adm/noticias/delete"
            prop-noticias="{{ json_encode($return) }}"
            csrf="{{ csrf_token() }}"
        />
    </div>

</div>
@endsection
