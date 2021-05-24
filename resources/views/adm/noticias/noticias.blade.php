@extends('layouts.layout-adm')

    @section('title') /Notícias/ @endsection
    @section('subtitle') /Notícia/ @endsection

@section('content')
<div class="container-fluid">

    <div>
        <noticias-page
            csrf="{{ csrf_token() }}"
            action-form="/adm/noticias/delete"
            url-current-page="{{ route(Route::currentRouteName()) }}"
        />
    </div>

</div>
@endsection
