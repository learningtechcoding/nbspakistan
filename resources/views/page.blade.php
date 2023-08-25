@extends('layouts.app')

@section('content')
@if(str_contains($data, "font-family: Nastaleeq;"))
<style>
    @font-face {
        font-family: Nastaleeq;
        src: url("/fonts/JameelNooriNastaleeqKasheeda.woff2") format("woff2"),
            url("/fonts/JameelNooriNastaleeqKasheeda.woff") format("woff");
    }
</style>
@endif
<style>
    span[style*="font-family: Nastaleeq;"] {
        direction: rtl;
        display: block;
        text-align: start;
        font-size: 1.2rem;
        word-spacing: 1px;
    }
    .page-data p {
        font-size: 1rem;
    }
    .page-data img{
        max-width: 100%;
        height: auto;
    }

    @media(max-width: 767px) {
        .page-data img {
            padding: 2rem;
        }
    }
</style>
<div class="container page-data">
    <h1 class="text-center text-capitalize mb-4">{{$name}}</h1>
    {!! $data !!}
</div>
@endsection
