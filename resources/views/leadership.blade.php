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

        .leadership>div.row>div>p {
            margin-bottom: 10px;
        }

        .leadership div.content-block-holder a {
            text-decoration: none;
            color: black;
            display: inline-block;
            padding-left: 1.5rem;
            padding-bottom: 10px;
        }

        .section-divider {
            display: flex;
            justify-content: center;
        }

        .section-divider p {
            width: min(1000px, 100%);
            height: 2px;
            background-color: rgba(128, 128, 128, 0.808);
            margin-top: 2rem;
        }

        section.leadership div.content-block-holder+div.content-block-holder {
            margin-top: 30px;
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
        <section class="leadership">
            <h2 class="mb-3">Leadership</h2>
            <div class="content-block-holder">
                <div class="row">
                    <div class="col-12 col-sm-6 d-flex flex-column">
                        <p>Advisory Board</p>
                        @foreach ($leadershipRoutes['Advisory Board'] as $leadershipRoute)
                            <a href="/leadership/Advisory Board/{{ $leadershipRoute }}">{{ $leadershipRoute }}</a>
                        @endforeach
                    </div>
                    <div class="col-12 col-sm-6 d-flex flex-column">
                        <p>Lawyer's Forum</p>
                        @foreach ($leadershipRoutes["Lawyer's Forum"] as $leadershipRoute)
                            <a href="/leadership/Lawyer's Forum/{{ $leadershipRoute }}">{{ $leadershipRoute }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="section-divider">
                    <p></p>
                </div>
            </div>
            <div class="content-block-holder">
                <div class="row">
                    <div class="col-12 col-sm-6 d-flex flex-column">
                        <p>General Body/Zone</p>
                        @foreach ($leadershipRoutes['General Body-Zone'] as $leadershipRoute)
                            <a href='/leadership/General Body-Zone/{{ $leadershipRoute }}'>{{ $leadershipRoute }}</a>
                        @endforeach
                    </div>
                    <div class="col-12 col-sm-6 d-flex flex-column">
                        <p>Universities Council</p>
                        @foreach ($leadershipRoutes['Universities Council'] as $leadershipRoute)
                            <a href="/leadership/Universities Council/{{ $leadershipRoute }}">{{ $leadershipRoute }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="section-divider">
                    <p></p>
                </div>
            </div>
            <div class="content-block-holder">
                <div class="row">
                    <div class="col-12 col-sm-6 d-flex flex-column">
                        <p>Literature Forum</p>
                        @foreach ($leadershipRoutes['Literature Forum'] as $leadershipRoute)
                            <a href="/leadership/Literature Forum/{{ $leadershipRoute }}">{{ $leadershipRoute }}</a>
                        @endforeach
                    </div>
                    <div class="col-12 col-sm-6 d-flex flex-column">
                        <p>Speaker Forum</p>
                        @foreach ($leadershipRoutes['Speaker Forum'] as $leadershipRoute)
                            <a href="/leadership/Speaker Forum/{{ $leadershipRoute }}">{{ $leadershipRoute }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="section-divider">
                    <p></p>
                </div>
            </div>
            <div class="content-block-holder">
                <div class="row">
                    <div class="col-12 col-sm-6 d-flex flex-column">
                        <p>Women Wing - UC</p>
                        @foreach ($leadershipRoutes['Women Wing - UC'] as $leadershipRoute)
                            <a href="/leadership/Women Wing - UC/{{ $leadershipRoute }}">{{ $leadershipRoute }}</a>
                        @endforeach
                    </div>
                    <div class="col-12 col-sm-6 d-flex flex-column">
                        <p>Women Wing</p>
                        @foreach ($leadershipRoutes['Women Wing'] as $leadershipRoute)
                            <a href="/leadership/Women Wing/{{ $leadershipRoute }}">{{ $leadershipRoute }}</a>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection

@push('scripts')
    <script>
        //Setting top-margin on main div
        let mainDivHeight = Math.ceil(document.getElementById("app-nav").clientHeight);
        //mainDivHeight += (5 - (mainDivHeight % 5));
        document.getElementById("app-main").style.marginTop = (mainDivHeight + 5) + "px";
    </script>
@endpush
