@extends('layouts.backend')

@section('title', 'Crear proyecto')

@section('stylesheets')
    <!-- Include external CSS. -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

        <!-- Include Editor style. -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <!-- Include external JS libs. -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

        <!-- Include Editor JS files. -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1//js/froala_editor.pkgd.min.js"></script>

        <!-- Initialize the editor. -->
        <script>
            $(function() {
                $('textarea').froalaEditor({
                    toolbarButtons: ['undo', 'redo' , '|', 'bold', 'italic', 'underline', 'strikeThrough', 'outdent', 'indent', 'clearFormatting', 'insertTable', 'html', 'fullscreen'],
                    fontFamilySelection: true,
                    fontSizeSelection: true,
                    paragraphFormatSelection: true
                })
            });
        </script>
@endsection

@section('content')
    <form action="/admin/projects/store" method="POST" autocomplete="off">
        {{ csrf_field() }}

        <div class="field">
            <label for="name">Nombre</label>

            <p class="control">
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="input">
            </p>
        </div>

        <div class="field">
            <label for="description">Descripcion</label>

            <p class="control">
                <input type="text" name="description" id="description" value="{{ old('description') }}" class="input">
            </p>
        </div>

        <div class="field">
            <label for="url">URL</label>

            <p class="control">
                <input type="text" name="url" id="url" value="{{ old('url') }}" class="input" placeholder="http://">
            </p>
        </div>

        <div class="field">
            <label for="body">Contenido</label>

            <p class="control">
                <textarea name="body" id="body" class="textarea">{{ old('body') }}</textarea>
            </p>
        </div>

        <div class="field">
            <p class="control">
                <button type="submit" class="button is-primary is-outlined">Agregar</button>
            </p>
        </div>

        @include('partials.errors')
    </form>

    @include('partials.message')
@endsection
