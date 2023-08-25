@extends('admin.app')

@section('content')
<style>
    .detail {
        max-width: 70ch;
        margin: auto;
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
    }

    @media(max-width: 430px) {
        .detail {
            padding: 2px;
        }
    }
</style>
<div class="container  mt-3">
    <h1 class=" text-center text-capitalize">{{$name}} Detail Page</h1>
    <div class="detail mt-4 mb-5">
        @if(isset($fields['strings']))
        @foreach ($fields['strings'] as $attr => $input)
        <p><strong class=" text-capitalize">{{$attr}}: </strong> {{$data[$attr]}}</p>
        @endforeach
        @endif
        @if(isset($fields['textareas']))
        @foreach ($fields['textareas'] as $attr => $input)
        <p class="mt-3 mb-1"><strong class=" text-capitalize">{{$attr}} </strong></p>
        <p class="mt-1">{{$data[$attr]}}</p>
        @endforeach
        @endif
    </div>
</div>
@endsection
