@extends('layouts.master')

@section('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" />
    <style>
        .resp-sharing-button__link,
        .resp-sharing-button__icon {
            display: inline-block
        }

        .resp-sharing-button__link {
            text-decoration: none;
            color: #fff;
            margin: 0
        }

        .resp-sharing-button {
            border-radius: 5px;
            transition: 25ms ease-out;
            padding: 0.5em 0.75em;
            font-family: Helvetica Neue,Helvetica,Arial,sans-serif
        }

        .resp-sharing-button__icon svg {
            width: 1em;
            height: 1em;
            margin-right: 0.4em;
            vertical-align: top
        }

        .resp-sharing-button--small svg {
            margin: 0;
            vertical-align: middle
        }

        /* Non solid icons get a stroke */
        .resp-sharing-button__icon {
              stroke: #fff;
              fill: none
        }

        /* Solid icons get a fill */
        .resp-sharing-button__icon--solid,
        .resp-sharing-button__icon--solidcircle {
            fill: #fff;
            stroke: none
        }

        .resp-sharing-button--twitter {
            background-color: #55acee
        }

        .resp-sharing-button--twitter:hover {
            background-color: #2795e9
        }

        .resp-sharing-button--pinterest {
            background-color: #bd081c
        }

        .resp-sharing-button--pinterest:hover {
            background-color: #8c0615
        }

        .resp-sharing-button--facebook {
          background-color: #3b5998
        }

        .resp-sharing-button--facebook:hover {
            background-color: #2d4373
        }

        .resp-sharing-button--tumblr {
            background-color: #35465C
        }

        .resp-sharing-button--tumblr:hover {
            background-color: #222d3c
        }

        .resp-sharing-button--reddit {
            background-color: #5f99cf
        }

        .resp-sharing-button--reddit:hover {
            background-color: #3a80c1
        }

        .resp-sharing-button--google {
            background-color: #dd4b39
        }

        .resp-sharing-button--google:hover {
            background-color: #c23321
        }

        .resp-sharing-button--linkedin {
            background-color: #0077b5
        }

        .resp-sharing-button--linkedin:hover {
            background-color: #046293
        }

        .resp-sharing-button--email {
            background-color: #777
        }

        .resp-sharing-button--email:hover {
            background-color: #5e5e5e
        }

        .resp-sharing-button--xing {
            background-color: #1a7576
        }

        .resp-sharing-button--xing:hover {
            background-color: #114c4c
        }

        .resp-sharing-button--whatsapp {
            background-color: #25D366
        }

        .resp-sharing-button--whatsapp:hover {
            background-color: #1da851
        }

        .resp-sharing-button--hackernews {
            background-color: #FF6600
        }

        .resp-sharing-button--hackernews:hover, .resp-sharing-button--hackernews:focus {   background-color: #FB6200 }

        .resp-sharing-button--vk {
            background-color: #507299
        }

        .resp-sharing-button--vk:hover {
            background-color: #43648c
        }

        .resp-sharing-button--facebook {
            background-color: #3b5998;
            border-color: #3b5998;
        }

        .resp-sharing-button--facebook:hover,
        .resp-sharing-button--facebook:active {
            background-color: #2d4373;
            border-color: #2d4373;
        }
    </style>
@endsection

@section('content')
    <div class="columns">
        <div class="column is-three-quarters">
            <div class="content">
                <p class="title">{{ $project->name }}</p>
                <p class="subtitle">{{ $project->description }}</p>
                @if ($project->url)
                    <p>
                        Sitio del proyecto: <a href="{{ $project->url }}">{{ $project->url }}</a>
                    </p>
                @endif

                <div class="carousel">
                    @foreach($project->projectPhotos as $photo)
                        <figure class="image">
                            <img src="{{ $photo->url }}" alt="">
                        </figure>
                    @endforeach
                </div>

                <p>Acerca del proyecto</p>
                <p class="content">{{ $project->body }}</p>
            </div>
        </div>

        <div class="column">
            <div class="field">
                <a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u={{ request()->url() }}" target="_blank" aria-label="">
                    <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small">
                        <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg>
                        </div>
                    </div>
                </a>
            </div>

            @if (count($project->projectFaqs))
                <div class="content">
                    <p class="subtitle">Preguntas frecuentes</p>

                    @foreach ($project->projectFaqs as $faq)
                        <div class="content">
                            <p>{{ $faq->question }}</p>

                            <p>{{ $faq->answer }}</p>
                            <small>Ultima actualizacion: {{ $faq->updated_at->diffForHumans() }}</small>
                        </div>
                    @endforeach
                </div>

                @include('partials.faq')
            @else
                @include('partials.faq')
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.carousel').slick({
                dots: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 5000
            });
        });
    </script>
@endsection
