@extends('admin.app')
@section('content')
    <div class="container mt-5 mb-5 admin-container">
        <div class="d-flex mb-4 gap-4">
            @if ($name === 'contacts' && isset($toView) && $toView)
                <h2 class=" text-capitalize">{{ $name }} Records</h2>
            @else
                <button id="all-delete" class="btn font-1-2 btn-danger mr-5">Delete <i class="fa fa-trash"></i> </button>
                <a href="/admin/{{ $name }}/create" class="btn ml-5 font-1-2 btn-success">Add <i
                        class="fas ml-2 fa-plus-square"></i></a>
            @endif
        </div>

        <div class="mb-4 d-flex">
            <div class="d-flex flex-column" style="margin-right: 20px;">
                <label>Choose main</label>
                <select id="leadership-main-select">
                    <option value=""></option>
                    @foreach ($leadershipRoutes as $key => $leadershipRoute)
                        <option value="{{ $key }}"> {{ $key }} </option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex flex-column">
                <label>Choose submain</label>
                <select id="leadership-submain-select">
                </select>
            </div>
        </div>

        <table class="table table-striped" id="leadership-table">
            <thead>
                <tr>
                    <th></th>
                    @if (isset($fields['strings']))
                        @foreach ($fields['strings'] as $attr => $input)
                            <th class="text-capitalize">{{ $attr }}</th>
                        @endforeach
                    @endif
                    @if (isset($fields['textareas']))
                        @foreach ($fields['textareas'] as $attr => $input)
                            <th class="text-capitalize">{{ $attr }}</th>
                        @endforeach
                    @endif
                    @if (isset($fields['passwords']))
                        @foreach ($fields['passwords'] as $attr => $input)
                            <th class="text-capitalize">{{ $attr }}</th>
                        @endforeach
                    @endif
                    @if (isset($fields['images']))
                        @foreach ($fields['images'] as $attr => $input)
                            <th class="text-capitalize">{{ $attr }}</th>
                        @endforeach
                    @endif
                    @if (isset($fields['spinners']))
                        @foreach ($fields['spinners'] as $attr => $input)
                            <th class="text-capitalize">{{ $attr }}</th>
                        @endforeach
                    @endif
                    <th></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        <form id="all-delete-form" action="/admin/{{ $name }}/delete" method="post" class="d-none" hidden>
            @csrf
            @method('delete')
        </form>

        <x-confirm-model message="Want to continue" delFormClass="delete-form" />
    </div>


@endsection

@push('scripts')
    <script>
        const leadershipRoutes = JSON.parse(`{!! json_encode($leadershipRoutes, true) !!}`);
        const submainSelect = document.getElementById("leadership-submain-select");

        const data = JSON.parse(`{!! $data !!}`);
        const csrfInput = `@csrf`;
        const deleteMethodInput = `@method('delete')`;

        document.getElementById("leadership-main-select").addEventListener("change", e => {
            if (e.target.value) {
                let subRoutes = leadershipRoutes[e.target.value];
                submainSelect.innerHTML = "<option value=''></option>";
                for (let i = 0; i < subRoutes.length; i++) {
                    submainSelect.innerHTML += `<option value="${subRoutes[i]}">${subRoutes[i]}</option>`;
                }
            }
        });

        const dataTable = document.querySelector("table#leadership-table>tbody");
        document.getElementById("leadership-submain-select").addEventListener("change", e => {
            dataTable.innerHTML = "";
            if (e.target.value) {
                for (let i = 0; i < data.length; i++) {
                    if (data[i]['leadership_province_subtype'] === e.target.value) {
                        dataTable.innerHTML += `
                        <tr>
                            <td><input type="checkbox" value="1" name="childdelete[]"></td>
                            <td style="max-width: 150px; word-break:break-all;"> ${data[i]['name']} </td>
                            <td style="max-width: 150px; word-break:break-all;"> ${data[i]['position']} </td>
                            <td style="max-width: 150px; word-break:break-all;"> ${data[i]['member_since']} </td>
                            <td style="max-width: 150px; word-break:break-all;"> ${data[i]['phone']} </td>
                            <td style="max-width: 150px; word-break:break-all;"> ${data[i]['email']} </td>
                            <td style="max-width: 150px; word-break:break-all;"> ${data[i]['facebook_link']} </td>
                            <td style="max-width: 150px; word-break:break-all;"> ${data[i]['twitter_link']} </td>
                            <td><img src="/storage/images/${data[i]['image']}" width="50" alt="leadership image"></td>
                            <td>
                                <a class="update-btn" href="/admin/leadership/${data[i]['id']}/edit"><i class="fas fa-2x fa-pen-square" aria-hidden="true"></i></a>
                                <form class="d-inline-block delete-form" action="/admin/leadership/${data[i]['id']}" method="post">
                                    ${csrfInput}
                                    ${deleteMethodInput}
                                    <button class="delete-btn"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        `;
                    }
                }
            }
        });
    </script>
@endpush
