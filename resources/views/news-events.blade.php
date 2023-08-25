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

        .anoucement {
            background-color: black;
            color: white;
            padding: 20px 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .anoucement p {
            margin-bottom: 0;
            text-align: center;
        }

        .news .news-image {
            position: relative;
            height: 100%;
        }

        .news .news-image img {
            height: 100%;
            object-fit: cover;
        }

        .news .news-image p.date {
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgba(149, 149, 149, 0.65);
            width: 100%;
            margin: 0;
            padding-left: 5px;
            padding-top: 5px;
        }

        .news>div.row+div.row {
            margin-top: 2rem;
        }

        .news .news-image {
            position: relative;
            transition: transform 100ms ease;
        }

        .news .news-image:hover {
            transition: transform 200ms linear;
            transform: scale(1.02);
        }

        .news a.new-image-overlay {
            position: absolute;
            inset: 0;
            cursor: pointer;
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
        <section class="news-container">
            <h2 class="mb-3 text-center">News & Events</h2>

            @if ($announcementString)
                <div class="anoucement mb-5">
                    <p> {{ $announcementString }} </p>
                </div>
            @endif

            <div class="news">
                @foreach ($news as $new)
                    <div class="row gx-3">
                        <div class="col-12 col-md-3 col-lg-2">
                            <div class="news-image">
                                <img class="w-100" src="/storage/images/{{ $new->cover }}" alt="News Image">
                                <p class="date">{{ $new->date->format('F d, Y') }}</p>

                                <a href="/news/{{ $new->id }}" class="new-image-overlay"></a>
                            </div>
                        </div>
                        <div class="col-12 col-md-9 col-lg-10">
                            <div class="card h-100">
                                <p class="text-center p-3">{{ $new->title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

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
