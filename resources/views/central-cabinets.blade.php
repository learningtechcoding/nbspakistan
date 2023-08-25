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

        .central-cabinet .cabinet-member-cards p {
            margin: 0;
        }

        .central-cabinet .cabinet-member-cards .member-social-icons i {
            font-size: 1.2rem;
            color: #009247;
        }

        .central-cabinet .cabinet-member-cards .member-social-icons i+i {
            padding-left: 10px;
        }

        .central-cabinet .member-image-container {
            aspect-ratio: 11/10;
            border: 3px solid black;
            padding: 5px;
        }

        .central-cabinet .member-image-container img {
            object-fit: cover;
        }

        .cabinet-member-cards>div+div {
            margin-top: 2rem;
        }

        .section-divider {
            display: flex;
            justify-content: center;
        }

        .section-divider p {
            width: min(1000px, 100%);
            height: 2px;
            background-color: gray;
            margin-top: 2rem;
        }

        @media(max-width: 576px) {
            .central-cabinet .member-image-container {
                width: 200px;
                margin-bottom: 1.5rem;
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

    <div class="container pt-5">
        <section class="central-cabinet">
            <h2 class="mb-3">Central Cabinet</h2>
            <div class="cabinet-member-cards d-flex flex-column">
                @foreach ($cc as $member)
                    <div class="row">
                        <div class="col-12 col-sm-3">
                            <div class="member-image-container">
                                <img src="/storage/images/{{ $member->image }}" alt="{{ $member->name }}"
                                    class="w-100 h-100">
                            </div>
                        </div>
                        <div class="col-12 col-sm-8">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div class="d-flex flex-column">
                                    <p class="fw-bold">{{ $member->name }}</p>
                                    <p>{{ $member->position }}</p>
                                    <p>{{ $member->member_info }}</p>
                                </div>
                                <div class="d-flex flex-column">
                                    <p>{{ $member->email }}</p>
                                    <p>{{ $member->phone }}</p>
                                    <div class="member-social-icons">
                                        <i class="fab fa-facebook-square"></i>
                                        <i class="fab fa-twitter-square"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="section-divider">
                <p></p>
            </div>
        </section>
        <section class="central-cabinet mt-5">
            <h2 class="mb-3">Central Organizing Committee (COC)</h2>
            <div class="cabinet-member-cards d-flex flex-column">
                @foreach ($coc as $member)
                    <div class="row">
                        <div class="col-12 col-sm-3">
                            <div class="member-image-container">
                                <img src="/storage/images/{{ $member->image }}" alt="{{ $member->name }}"
                                    class="w-100 h-100">
                            </div>
                        </div>
                        <div class="col-12 col-sm-8">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div class="d-flex flex-column">
                                    <p class="fw-bold">{{ $member->name }}</p>
                                    <p>{{ $member->position }}</p>
                                    <p>{{ $member->member_info }}</p>
                                </div>
                                <div class="d-flex flex-column">
                                    <p>{{ $member->email }}</p>
                                    <p>{{ $member->phone }}</p>
                                    <div class="member-social-icons">
                                        <i class="fab fa-facebook-square"></i>
                                        <i class="fab fa-twitter-square"></i>
                                    </div>
                                </div>
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
