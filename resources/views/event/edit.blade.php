@extends('layouts.backend')

@section('title', 'Editar evento')

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
    <form action="/admin/events/{{ $event->id }}/update" method="POST" autocomplete="off" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="hidden" name="latitude" id="latitude" value="{{ $event->latitude }}">
        <input type="hidden" name="longitude" id="longitude" value="{{ $event->longitude }}">

        <div class="field">
            <label for="name">Titulo del evento</label>

            <p class="control">
                <input type="text" name="name" id="name" value="{{ old('name', $event->name) }}" class="input">
            </p>
        </div>

        <div class="field">
            <label for="price">Precio</label>

            <p class="control">
                <input type="number" name="price" id="price" value="{{ old('price', $event->price) }}" class="input" placeholder="Colocar 0 para gratuito" min="0">
            </p>
        </div>

        <div class="field">
            <label for="address">Direccion</label>

            <p class="control">
                <input type="text" name="address" id="address" value="{{ old('address', $event->address) }}" class="input">
            </p>
        </div>

        <div class="field">
            <label for="image">Imagen</label>

            <div class="control">
                <input type="file" name="image" id="image">
            </div>
        </div>

        <div class="field">
            <label for="description">Descripcion</label>

            <p class="control">
                <textarea name="description" id="description" class="textarea">{{ old('description', $event->description) }}</textarea>
            </p>
        </div>

        <div class="field">
            <p class="control">
                <label for="is_published" class="checkbox">
                    <input type="checkbox" name="is_published" id="is_published" {{ $event->is_published ? 'checked' : '' }}>
                    Publicar
                </label>
            </p>
        </div>

        <div class="field">
            <button type="submit" class="button is-primary is-outlined">Actualizar</button>
        </div>

        @include('partials.errors')
    </form>

    @include('partials.message')
@endsection