@extends('layouts.app')

@section('content')

    @if (str_contains($news->text, 'font-family: Nastaleeq;'))
        @push('styles')
            <style>
                @font-face {
                    font-family: Nastaleeq;
                    src: url("/fonts/JameelNooriNastaleeqKasheeda.woff2") format("woff2"),
                        url("/fonts/JameelNooriNastaleeqKasheeda.woff") format("woff");
                }

            </style>
        @endpush
    @endif

    <style>
        .blog-content {
            max-width: 70ch;
            margin: auto;
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
        }

        .blog-cover img {
            width: min(100%, 1000px);
            aspect-ratio: 16 / 6;
            object-fit: cover;
        }

        .blog-content p {
            font-size: 1rem;
        }

        span[style*="font-family: Nastaleeq;"] {
            direction: rtl;
            display: block;
            text-align: start;
            color: black;
            font-size: 1.2rem;
            word-spacing: 1px;
        }

        @media(min-width: 1500px) {
            .blog-content {
                max-width: 100ch;
            }

            span[style*="font-family: Nastaleeq;"] {
                font-size: 1.4rem;
            }

            .blog-content p,
            .blog-content ul,
            .blog-content ol,
            .blog-content dl {
                font-size: 1.2rem;
            }
        }

        @media(min-width: 1200px) {
            .blog-content {
                max-width: 85ch;
            }
        }

        @media(max-width: 430px) {
            .blog-content {
                padding: 2px;
            }
        }

    </style>

    <div class="container pb-5" style="padding-top: 4rem;">
        {{-- <h1 class="text-center mt-4 mb-5">{{ $news->title }}</h1> --}}
        <div class="blog-cover d-flex justify-content-center">
            <img src="/storage/images/{{ $news->cover }}" alt="blog cover">
        </div>
        <div class="mt-5 blog-content">
            {!! $news->text !!}
        </div>
    </div>

    <script>
        const spans = document.querySelectorAll(".blog-content p span[style*='font-size']");
        const mediaQuery1 = window.matchMedia('(min-width: 1500px)');
        const mediaQuery2 = window.matchMedia('(min-width: 1200px)');
        const mediaQuery3 = window.matchMedia('(min-width: 900px)');
        const mediaQuery4 = window.matchMedia('(min-width: 701px)');

        spans.forEach(s => {
            if (s.style.fontSize) {
                if (mediaQuery1.matches) {
                    s.style.fontSize = ((parseInt(s.style.fontSize) / 16) + 0.4) + "rem";
                } else if (mediaQuery2.matches) {
                    s.style.fontSize = ((parseInt(s.style.fontSize) / 16) + 0.3) + "rem";
                } else if (mediaQuery3.matches) {
                    s.style.fontSize = ((parseInt(s.style.fontSize) / 16) + 0.2) + "rem";
                } else if (mediaQuery4.matches) {} else {
                    s.style.fontSize = ((parseInt(s.style.fontSize) / 16)) + "rem";
                }
            }

        });
    </script>
@endsection
