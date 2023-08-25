@extends('layouts.app')

@push('styles')
    <style>
        main {
            padding-bottom: 50px;
        }

        section.latest-news {
            width: 100%;
        }

        nav.navbar {
            padding-bottom: 0;
        }

        nav.navbar>div.container-fluid {
            padding-bottom: 0.3rem;
        }

        .latest-news>#latest-news {
            width: 100%;
            background-color: #009247;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .latest-news>#latest-news>p {
            margin: 0;
            padding: 0;
            white-space: nowrap;
            overflow-x: scroll;
        }

        .latest-news>#latest-news>p::-webkit-scrollbar {
            width: 0;
            height: 0;
        }

        .latest-news>#latest-news>p::-webkit-scrollbar-thumb {
            width: 0;
            height: 0;
            background: transparent;
        }

        .latest-news>#latest-news>p::-webkit-scrollbar-thumb:hover {
            width: 0;
            height: 0;
            background: transparent;
        }

    </style>
@endpush

@section('bottom-content')
    @if ($latestNews)
        <section class="latest-news">
            <div id="latest-news">
                <p class="text-center px-2">Latest News: {{ $latestNews }}</p>
            </div>
        </section>
    @endif
@endsection

@section('content')

    <div class="pt-5 container">
        <section class="associated">
            <h2 class="mb-3">{{ $title }}</h2>

            <div class="row">
                <p>
                    {!! $data !!}
                </p>
            </div>
        </section>
    </div>

@endsection

@push('scripts')
    <script>
        //Setting top-margin on main div
        let mainDivHeight = Math.ceil(document.getElementById("app-nav").getBoundingClientRect().height);
        //mainDivHeight += (5 - (mainDivHeight % 5));
        document.getElementById("app-main").style.marginTop = (mainDivHeight + 5) + "px";
    </script>
@endpush
