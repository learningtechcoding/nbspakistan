@extends('layouts.app')

@push('styles')
    <style>
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

        .contact-container {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            background-color: white;
            overflow: hidden;
        }

        .contact-container .contact-bg-image {
            position: absolute;
            top: 0;
            left: 0;
            background-image: url('/storage/images/static/contact.png');
            height: 100%;
            background-position: top left;
            background-size: cover;
            width: min(1600px, 100%);
        }

        .contact-container .contact-content {
            position: absolute;
            top: 140px;
            right: 100px;
            width: 400px;
        }

        .contact-container .contact-content div.d-flex>* {
            margin-top: 2rem;
        }

        .contact-container div.message {
            position: absolute;
            width: 100%;
            top: 124px;
            text-align: center;
            padding: 5px;
        }

        .contact-container .contact-content input,
        .contact-container .contact-content textarea {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
            color: black;
            outline: none;
            background: none;
            font-weight: 500;
            resize: none;
        }

        .contact-container .contact-content textarea::-webkit-scrollbar {
            width: 6px;
        }

        .contact-container .contact-content textarea::-webkit-scrollbar-thumb {
            background: #8b8787;
        }

        .contact-container .contact-content textarea::-webkit-scrollbar-thumb:hover {
            background: #4caf50;
        }

        .contact-container .contact-content input::placeholder,
        .contact-container .contact-content textarea::placeholder {
            color: black;
            font-weight: 400;
        }


        @media(max-width: 1280px) {
            .contact-container {
                aspect-ratio: unset;
                height: 800px;
            }

            .contact-container .contact-content {
                background-color: #ffffffd1;
                padding-inline: 25px;
                border-radius: 10px;
            }

            .contact-container .contact-content div.contact-form {
                margin-top: 10px !important;
                margin-bottom: 0 !important;
            }
        }

        @media(max-width: 767px) {
            .contact-container {
                height: 700px;
            }

            .contact-container .contact-content {
                right: 50%;
                transform: translateX(50%);
            }
        }

        @media(max-width: 450px) {
            .contact-container .contact-content {
                width: 95%;
                padding-inline: 5px;
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
    <section class="contact-container">
        <div class="contact-bg-image"></div>
        <div class="pt-5 contact-content pb-5">
            <h2 class="text-center">Get In Touch</h2>
            <form action="/contact" method="post">
                @csrf
                <div class="d-flex contact-form flex-column mt-5 mb-5">
                    <input type="text" name="name" id="name" placeholder="Name">
                    <input type="email" name="email" id="email" placeholder="Email">
                    <textarea name="message" id="message" placeholder="Message"></textarea>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>

            <div class="contact-info pt-5">
                <p class="text-center">
                    Office#1, LG Floor, Emaan Heights, Zaraj Housing Society Islamabad, 44000, Pakistan
                </p>
                <p class="text-center">
                    +92 304 6001087
                </p>
            </div>
        </div>
        @if (session('success'))
            <div class="message alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </section>
@endsection
