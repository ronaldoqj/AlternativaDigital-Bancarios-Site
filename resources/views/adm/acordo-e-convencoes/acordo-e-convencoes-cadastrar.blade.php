@extends('layouts.layout-adm')


@section('js')
    <!-- <script src="/plugins/ckeditor/ckeditor.js"></script> -->
@endsection

@section('content')


<div class="container-fluid">

    <!-- <div class="row">
        <div class="col-12">
            <textarea id="texto" name="texto"></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('texto');
            </script>
        </div>
    </div> -->
    
    <!-- <form action="{{url('adm/formularios/noticia')}}" method="post" > -->
    
        @csrf

        <noticias-cadastro-page form-action="{{url('adm/noticias/cadastro')}}" method="post" csrf="{{ csrf_token() }}" />
    <!-- </form> -->

</div>
@endsection
