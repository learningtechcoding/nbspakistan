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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    @if (isset($fields['strings']))
                        @foreach ($fields['strings'] as $attr => $input)
                            <th class="text-capitalize">{{ $attr }}</th>
                        @endforeach
                    @endif
                    @if (isset($fields['textareas']) && Route::currentRouteName() != 'adminNotificationTemplate')
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
                @foreach ($data as $child)
                    <tr>
                        <td><input type="checkbox" value="{{ $child->id }}" name="childdelete[]" /></td>
                        @if (isset($fields['strings']))
                            @foreach ($fields['strings'] as $attr => $input)
                                <td style="max-width: 150px; word-break:break-all;">{{ $child[$attr] }}</td>
                            @endforeach
                        @endif
                        @if (isset($fields['textareas']) && Route::currentRouteName() != 'adminNotificationTemplate')
                            @foreach ($fields['textareas'] as $attr => $input)
                                <td style="max-width: 250px">{{ substr($child[$attr], 0, 100) . '...' }}</td>
                            @endforeach
                        @endif
                        @if (isset($fields['passwords']))
                            @foreach ($fields['passwords'] as $attr => $input)
                                <td>{{ 'Hashed(Encrypted)' }}</td>
                            @endforeach
                        @endif

                        @if (isset($fields['images']))
                            @foreach ($fields['images'] as $attr => $input)
                                @if ($child[$attr])
                                    <td><img src="/storage/images/{{ $child[$attr] }}" width="50"
                                            alt="{{ $name }} image"></td>
                                @else
                                    <td><img src="/storage/images/static/default_profile.png" width="50"
                                            alt="{{ $name }} image"></td>
                                @endif
                            @endforeach
                        @endif

                        @if (isset($fields['spinners']))
                            @foreach ($fields['spinners'] as $attr => $data)
                                <td>{{ $child[$attr] ? $fields['spinners'][$attr][$child[$attr]] : 'None' }}</td>
                            @endforeach
                        @endif
                        <td>
                            @if (isset($toView) && $toView)
                                <a class="update-btn" target="_blank"
                                    href="/admin/{{ $name }}/{{ $child->id }}"><i class="fa fa-2x fa-eye"
                                        aria-hidden="true"></i></a>
                            @else
                                <a class="update-btn" href="/admin/{{ $name }}/{{ $child->id }}/edit"><i
                                        class="fas fa-2x fa-pen-square" aria-hidden="true"></i></a>
                            @endif
                            <form class="d-inline-block delete-form"
                                action="/admin/{{ $name }}/{{ $child->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="delete-btn"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <form id="all-delete-form" action="/admin/{{ $name }}/delete" method="post" class="d-none" hidden>
            @csrf
            @method('delete')
        </form>

        <x-confirm-model message="Want to continue" delFormClass="delete-form" />
    </div>


@endsection
