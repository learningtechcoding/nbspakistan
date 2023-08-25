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

        .gallery div.row img {
            transition: transform 100ms linear;
        }

        .gallery div.row img:hover {
            transition: transform 200ms linear;
            transform: scale(1.2);
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
        <section class="gallery">
            <h2 class="mb-3 text-center">Gallery</h2>

            <div class="mt-5">
                <div class="row gx-0">
                    @foreach ($galleries as $gallery)
                        <div class="col-12 col-md-6 col-xl-4" style="height: 200px;">
                            <img src="storage/images/{{ $gallery->image }}" alt="{{ $gallery->title }}"
                                style="object-fit: cover" class="w-100 h-100">
                        </div>
                    @endforeach
                </div>
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
