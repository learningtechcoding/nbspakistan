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

        .secretariat-map iframe {
            aspect-ratio: 16/7;
        }

        @media(max-width: 800px) {
            .secretariat-map iframe {
                aspect-ratio: 16/10;
            }
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
        <section class="secretariat">
            <h2 class="mb-3 text-center">Secretariat Location</h2>
            <p class="text-center">Track the Nazriyati Markaz Secretariat, State Youth Parliament! </p>
        </section>
    </div>
    <div class="d-flex mt-5 secretariat-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3326.563262799735!2d73.14934079999999!3d33.5127382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dff3f51c0073e7%3A0xaa6a74337392e45f!2sNazriyati%20Markaz%2C%20Secretariat!5e0!3m2!1sen!2s!4v1641314488486!5m2!1sen!2s"
            width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
