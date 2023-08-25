@extends('admin.app')
@section('content')
    <div class="container mt-5 mb-5 admin-container">
        @if (Auth::user()->type === 'admin')
            <div>
                <h2 class="text-capitalize mb-4">{{ $fields['spinners']['province'][Auth::user()->province] }} Province
                    Rejected
                    Applications</h2>
            </div>
        @elseif(Auth::user()->type === 'superAdmin')
            <div>
                <h2 class="text-capitalize mb-4">Rejected Applications</h2>
            </div>
            <div class="d-flex align-items-center gap-5 mt-3 mb-5">
                <p class="h4 mb-0">Choose Province</p>
                <select class="p-1 pt-2 pb-2" name="province-sort" id="province-sort">
                    <option value="all">All</option>
                    <option value="isl">Islamabad</option>
                    <option value="pb">Punjab</option>
                    <option value="sd">Sindh</option>
                    <option value="kpk">Khyber Pakhtunkhwa </option>
                    <option value="ba">Balochistan </option>
                    <option value="ajk">Azad Jammu & Kashmir</option>
                    <option value="gb">Gilgit-Baltistan </option>
                </select>
            </div>
        @endif
        <table class="table table-striped" id="data-table">
            <thead>
                <tr>
                    <th></th>
                    @if (isset($fields['strings']))
                        @foreach ($fields['strings'] as $attr => $input)
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
                    @if (Auth::user()->type != 'admin' && isset($fields['spinners']))
                        @if (isset($fields['spinners']))
                            @foreach ($fields['spinners'] as $attr => $input)
                                <th class="text-capitalize">{{ $attr }}</th>
                            @endforeach
                        @endif
                    @endif
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $child)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if (isset($fields['strings']))
                            @foreach ($fields['strings'] as $attr => $input)
                                <td>{{ $child[$attr] }}</td>
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
                                    @if (strpos($child[$attr], 'http') !== false)
                                        <td><img src="{{ $child[$attr] }}" width="50" alt="{{ $name }} image">
                                        </td>
                                    @else
                                        <td><img src="/storage/images/{{ $child[$attr] }}" width="50"
                                                alt="{{ $name }} image"></td>
                                    @endif
                                @else
                                    <td><img src="/storage/images/static/default_profile.png" width="50"
                                            alt="{{ $name }} image"></td>
                                @endif
                            @endforeach
                        @endif

                        @if (Auth::user()->type != 'admin' && isset($fields['spinners']))
                            @foreach ($fields['spinners'] as $attr => $input)
                                <td>{{ $child[$attr] ? $fields['spinners'][$attr][$child[$attr]] : 'None' }}</td>
                            @endforeach
                        @endif

                        <td>
                            <div class="d-flex flex-row align-items-center gap-2 flex-nowrap">
                                <a href="/admin/registrations/{{ $child->id }}" title="View detail"><i
                                        class="fa fa-eye"></i></a>
                                <button onclick="acceptBtnClickHandler(this)" data-id="{{ $child->id }}"
                                    data-name="{{ $child->name }}" class="btn btn-success accept-btn">Accept</button>
                                <form class="d-inline-block reg-delete-form"
                                    action="/admin/registrations/{{ $child->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="delete-btn"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>

        <form id="all-delete-form" action="/admin/{{ $name }}/delete" method="post" class="d-none" hidden>
            @csrf
            @method('delete')
        </form>

        <form class="d-none" id="accept-form" action="" method="post">
            @csrf
            @method('put')
            <input type="text" name="reg-role" id="reg-role">
            <input type="text" name="reg-template" id="reg-template">
        </form>
    </div>
    @if (Auth::user()->type === 'superAdmin')
        <script>
            const sortProvinceSelect = document.getElementById("province-sort");
            const table = document.getElementById("data-table");
            const data = {!! json_encode($data, JSON_HEX_TAG) !!};
            const csrf = `{!! csrf_field() !!}`;
            const deleteMethod = `<input type="hidden" name="_method" value="delete">`;

            const provinces = {!! json_encode($fields['spinners']['province'], JSON_HEX_TAG) !!};
            let provinceData = setProvinceData(data, sortProvinceSelect.value);
            setTableData(provinceData);

            sortProvinceSelect.addEventListener("change", e => {
                let value = e.target.value;
                let pData = setProvinceData(data, value);
                setTableData(pData);
            });

            function setProvinceData(data, province) {
                let pData = [];
                data.forEach(e => {
                    if (province === "all") {
                        pData.push(e);
                    } else if (e.province === province) {
                        pData.push(e);
                    }
                });
                return pData;
            }

            function setTableData(data) {
                table.querySelector('tbody').innerHTML = "";
                data.forEach((e, i) => {
                    let tr = document.createElement('tr');
                    tr.innerHTML = `
                <td>${i + 1}</td>
                <td>${e.name}</td>
                <td>${e.email}</td>
                <td>${e.cnic}</td>
                <td>${e.phone}</td>
                <td>${e.city}</td>
            `;
                    let imgTd = document.createElement('td');
                    let img = document.createElement("img");
                    let src;
                    if (e.image && e.image.includes('http')) {
                        src = e.image;
                    } else if (e.image) {
                        src = "/storage/images/" + e.image;
                    } else {
                        src = "/storage/images/static/default_profile.png";
                    }
                    img.setAttribute("src", src);
                    img.setAttribute("width", "50");
                    imgTd.appendChild(img);
                    tr.appendChild(imgTd);

                    tr.innerHTML += `
                <td>${provinces[e.province]}</td>
                <td>
                    <a href="/admin/registrations/${e.id}" title="View detail"><i
                            class="fa fa-eye"></i></a>
                    <button onclick="acceptBtnClickHandler(this)" data-id="${e.id}"
                        data-name="${e.name}" class="btn btn-success accept-btn">Accept</button>
                    <form class="d-inline-block reg-delete-form"
                        action="/admin/registrations/${e.id}" method="post">
                        @csrf
                        @method('delete')
                        <button class="delete-btn"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            `;
                    table.querySelector('tbody').appendChild(tr);
                });
            }
        </script>
    @endif
    <div id="model" class="model-holder d-none">
        <style>
            .confirm-model {
                display: flex;
                flex-direction: column;
                align-items: start;
                justify-content: center;
                height: 50%;
                width: 50%;
                background-color: white;
                margin-top: 25vh;
            }

            .confirm-model * {
                margin: 5px;
            }

            .confirm-model .confirm-model-button {
                display: flex;
                flex-direction: row;
                justify-content: space-evenly;
                width: 100%;
            }

            .confirm-model .role-input * {
                margin: 2px;
            }

            .confirm-model .role-input {
                margin: 0;
            }

            .model-holder {
                display: flex;
                justify-content: center;
                align-items: center;
                position: absolute;
                width: 98vw;
                height: 100%;
                top: 0;
                left: 0;
                background-color: rgb(148 147 147 / 32%);
            }

            .model-inner {
                height: 100vh;
                width: 100vw;
                align-self: flex-start;
            }

        </style>
        <div class="model-inner">
            <div class="confirm-model container">
                <h2 id="role-header">Designation</h2>
                <div class="d-flex flex-column role-input">
                    <input style="width: 300px; margin: 5px;" type="text" id="role">
                    <span id="role-input-error" class="invalid-feedback">Designation is required</span>
                </div>
                <h2 id="role-header2">Regards</h2>
                <div class="d-flex flex-column template-input">
                    <textarea rows="5" cols="40" name="template" id="template">

                </textarea>
                    <span id="template-input-error" class="invalid-feedback">Regards are required</span>
                </div>
                <div class="confirm-model-button">
                    <button class="btn btn-secondary confirm-model-cancel" id="model-cancel-btn">
                        Cancel
                    </button>
                    <button class="btn btn-primary confirm-model-continue" id="model-save-btn">
                        Continue
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const acceptBtns = document.querySelectorAll(".accept-btn");
        const model = document.getElementById("model");
        const ModelCancelBtn = document.getElementById("model-cancel-btn");
        const ModelSaveBtn = document.getElementById("model-save-btn");
        const roleModelInput = document.getElementById("role");
        const roleTemplateInput = document.getElementById("template");
        const acceptForm = document.getElementById("accept-form");
        const regFormRole = document.getElementById("reg-role");
        const regFormTemplate = document.getElementById("reg-template");
        const roleHeader = document.getElementById("role-header");
        const roleError = document.getElementById("role-input-error");
        const templateError = document.getElementById("template-input-error");
        var clickedBtn = null;

        function acceptBtnClickHandler(e) {
            clickedBtn = e;
            let name = clickedBtn.dataset.name;
            document.getElementById('model').style.top = window.pageYOffset + "px";
            model.classList.remove('d-none');
            ModelCancelBtn.addEventListener("click", cancelHandler);
            ModelSaveBtn.addEventListener("click", successHandler);
        }

        function cancelHandler(e) {
            model.classList.add("d-none");
            roleError.classList.remove("d-inline-block");
            roleModelInput.value = ""
            ModelCancelBtn.removeEventListener("click", cancelHandler);
            ModelSaveBtn.removeEventListener("click", successHandler);
        }

        function successHandler(e) {
            let id = clickedBtn.dataset.id;
            regFormRole.value = roleModelInput.value;

            regFormTemplate.value = roleTemplateInput.value.trim().split("\n").map(v => {
                return `<span>${v}</span>`;
            }).join('\n');

            acceptForm.setAttribute("action", `/admin/registrations/${id}/accept`);
            if (!roleModelInput.value) {
                roleError.classList.add("d-inline-block");
                return;
            }
            if (!roleTemplateInput.value.trim()) {
                templateError.classList.add("d-inline-block");
                return;
            }

            acceptForm.submit();
        }



        /* Scroll handling when model is on screen */
        let last_known_scroll_position = 0;
        let ticking = false;

        function doSomething(scroll_pos) {
            if (!document.getElementById('model').classList.contains("d-none")) {
                document.getElementById('model').style.top = window.pageYOffset + "px";
            }
        }

        document.addEventListener('scroll', function(e) {
            last_known_scroll_position = window.scrollY;

            if (!ticking) {
                window.requestAnimationFrame(function() {
                    doSomething(last_known_scroll_position);
                    ticking = false;
                });
                ticking = true;
            }
        });
    </script>

@endsection
