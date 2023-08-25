@extends('admin.app')

@php
$formAction = isset($child) ? '/admin/' . $name . '/' . $child->id : '/admin/' . $name;
@endphp

@section('content')
    <div class="admin-container">
        <form id="main-form" action="{{ $formAction }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($child) && $child)
                @method('PUT')
            @endif
            <div class="container mt-4">
                <div class="heading">
                    <p class="text-center text-capitalize h2">
                        {{ isset($child) ? 'Edit ' . $name . ' Info' : 'Add New ' . $name }}
                    </p>
                </div>
                <div class="edit-info">

                    <div class="info">
                        <p class="mr-3 text-bold text-capitalize"> Choose main type </p>
                    </div>
                    <div class="info">
                        <select name="leadership-main-select" id="leadership-main-select" @if (isset($child)) disabled @endif required>
                            <option value=""></option>
                            @foreach ($leadershipRoutes as $key => $leadershipRoute)
                                <option value="{{ $key }}" @if (isset($child) && $child['leadership_main_type'] === $key) selected @endif> {{ $key }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="info">
                        <p class="mr-3 text-bold text-capitalize"> Choose submain type </p>
                    </div>
                    <div class="info">
                        <select name="leadership-submain-select" id="leadership-submain-select" @if (isset($child)) disabled @endif
                            required>
                            @if (isset($child))
                                <option value="{{ $child['leadership_province_subtype'] }}" selected>
                                    {{ $child['leadership_province_subtype'] }} </option>
                            @endif
                        </select>
                    </div>


                    @if (isset($fields['strings']))
                        @foreach ($fields['strings'] as $attr => $input)
                            <div class="info">
                                <p class="mr-3 text-bold text-capitalize"> {{ $input }} </p>
                            </div>
                            <div class="info">
                                <input type="text" value="{{ isset($child) ? $child[$attr] : '' }}"
                                    name="{{ $attr }}" id="{{ $attr }}" required>
                            </div>
                        @endforeach
                    @endif

                    @if (isset($fields['passwords']))
                        @foreach ($fields['passwords'] as $attr => $input)
                            <div class="info">
                                <p class="mr-3 text-bold text-capitalize"> {{ $input }} </p>
                            </div>
                            <div class="info">
                                <input type="password" name="{{ $attr }}" id="{{ $attr }}"
                                    {{ isset($child) ? '' : 'required' }}>
                            </div>
                        @endforeach
                    @endif

                    @if (isset($fields['textareas']))
                        @foreach ($fields['textareas'] as $attr => $input)
                            <div class="info area-info">
                                <p class="mr-3 text-bold text-capitalize">{{ $input }} : </p>
                            </div>
                            <div class="info area-info">
                                <textarea id="{{ $attr }}" name="{{ $attr }}" rows="2" value=""
                                    class="form-control md-textarea" required
                                    style="margin-top: 0px; margin-bottom: 0px; width:350px; height: 150px;">
                                                                @if (isset($child)) {{ $child[$attr] }} @endif
                                                            </textarea>
                            </div>
                        @endforeach
                    @endif

                    @if (isset($fields['dates']))
                        @foreach ($fields['dates'] as $attr => $input)
                            <div class="info">
                                <p class="mr-3 text-bold text-capitalize"> {{ $input }} </p>
                            </div>
                            <div class="info">
                                <input type="date" value="{{ isset($child) ? $child[$attr] : '' }}"
                                    name="{{ $attr }}" id="{{ $attr }}" required>
                            </div>
                        @endforeach
                    @endif

                    @if (isset($fields['images']))
                        @foreach ($fields['images'] as $attr => $input)
                            <div class="info image-info">
                                <p class="mr-3 text-bold text-capitalize">{{ $input }}</p>
                                @if (isset($child) && $child)
                                    <img class="mr-4" width="70px" src="/storage/images/{{ $child[$attr] }}"
                                        alt="{{ $name }} Image">
                                @endif
                            </div>
                            <div class="info">
                                <input accept="image/*" type="file" id="{{ $attr }}" name="{{ $attr }}"
                                    {{ isset($child) ? null : 'required' }}>
                            </div>
                        @endforeach
                    @endif

                    @if (isset($fields['spinners']))
                        @foreach ($fields['spinners'] as $attr => $data)
                            <div class="info">
                                <p class="mr-3 text-bold text-capitalize"> {{ $data['input'] }} </p>
                            </div>
                            <div class="info">
                                <select name="{{ $attr }}" id="{{ $attr }}"
                                    {{ $data['required'] ? 'required' : '' }}>
                                    @foreach ($data as $value => $choice)
                                        @if ($loop->iteration > 2)
                                            <option value="{{ $value }}"
                                                {{ isset($child) && $child[$attr] == $value ? 'selected' : '' }}>
                                                {{ $choice }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="d-flex justify-content-center gap-4 mt-3 mb-5">
                    <a href="/admin/{{ $name }}" style="margin-right: 20px;"
                        class="btn btn-lg btn-secondary">Cancel</a>
                    <button id="save-form-btn" class="btn btn-lg btn-success">Save</button>
                </div>
            </div>
        </form>

    </div>


@endsection
@if (!isset($child))
    @push('scripts')
        <script>
            const leadershipRoutes = JSON.parse(`{!! json_encode($leadershipRoutes, true) !!}`);
            const submainSelect = document.getElementById("leadership-submain-select");

            document.getElementById("leadership-main-select").addEventListener("change", e => {
                let subRoutes = leadershipRoutes[e.target.value];
                submainSelect.innerHTML = "<option value=''></option>";
                for (let i = 0; i < subRoutes.length; i++) {
                    submainSelect.innerHTML += `<option value="${subRoutes[i]}">${subRoutes[i]}</option>`;
                }
            });
        </script>
    @endpush
@endif
