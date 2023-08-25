@extends('admin.app')
@section('content')

    <div class="container mt-5 mb-5 admin-container">
        @if (Auth::user()->type === 'admin')
            <div>
                <h2 class="text-capitalize mb-4">{{ $fields['spinners']['province'][Auth::user()->province] }} Province
                    Accepted
                    Applications</h2>
            </div>
        @elseif(Auth::user()->type === 'superAdmin')
            <div>
                <h2 class="text-capitalize mb-4">Accepted Applications</h2>
            </div>
            <div class="d-flex align-items-center gap-5 mt-3 mb-5">
                <p class="h4 mb-0">Choose Province</p>
                <select class="p-1 pt-2 pb-2" name="province-sort" id="province-sort">
                    <option value="all">All</option>
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

                        @if (Auth::user()->type === 'superAdmin')
                            <td>
                                <div class="d-flex flex-row align-items-center gap-2 flex-nowrap">
                                    <a href="/admin/registrations/{{ $child->id }}" title="View detail"><i
                                            class="fa fa-eye"></i></a>
                                    <button onclick="printPdf(this);" class="delete-btn" data-id="{{ $child->id }}"
                                        title="Print as pdf">
                                        <i class="fas fa-print"></i>
                                    </button>
                                    <form class="d-inline-block reg-delete-form"
                                        action="/admin/registrations/{{ $child->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="delete-btn"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        @elseif(Auth::user()->type === 'admin')
                            <td>
                                <div class="d-flex flex-row align-items-center gap-3 flex-nowrap">
                                    <a href="/admin/registrations/{{ $child->id }}" title="View detail"> <i
                                            class="fa fa-eye"></i> </a>
                                    <button onclick="printPdf(this);" data-id="{{ $child->id }}" class="delete-btn"
                                        title="Print as pdf"><i class="fas fa-print"></i></button>
                                    <form class="d-inline-block reg-delete-form" onsubmit="return handleScriptForm(this)"
                                        action="/admin/registrations/{{ $child->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="delete-btn"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        @endif
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
        </form>
    </div>

    <x-confirm-model message="Want to continue" delFormClass="reg-delete-form" />

    <script>
        function handleScriptForm(form) {
            document.getElementById('model').style.top = window.pageYOffset + "px";
            document.getElementById('model').classList.remove('d-none');
            ModelCancelBtn.addEventListener("click", cancelHandler);
            ModelSaveBtn.addEventListener("click", e2 => {
                form.submit();
            });
            return false;
        }
    </script>

    <script src="/js/admin/html2pdf.bundle.min.js"></script>
    <script>
        const sortProvinceSelect = document.getElementById("province-sort");
        const table = document.getElementById("data-table");
        const data = {!! json_encode($data, JSON_HEX_TAG) !!};
        const csrf = `{!! csrf_field() !!}`;
        const deleteMethod = `<input type="hidden" name="_method" value="delete">`;

        const templatesData = {!! $templates->toJson(JSON_HEX_TAG) !!};
        const templates = [];
        templatesData.forEach(template => {
            templates[template.id] = template;
        });


        const provinces = {!! json_encode($fields['spinners']['province'], JSON_HEX_TAG) !!};
        if (sortProvinceSelect) {
            let provinceData = setProvinceData(data, sortProvinceSelect.value);
            setTableData(provinceData);
            sortProvinceSelect.addEventListener("change", e => {
                let value = e.target.value;
                let pData = setProvinceData(data, value);
                setTableData(pData);
            });
        }

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
                    <div class="d-flex flex-row align-items-center gap-3 flex-nowrap">
                        <a href="/admin/registrations/${e.id}" title="View detail"> <i class="fa fa-eye"></i> </a>
                        <button onclick="printPdf(this);" data-id="${e.id}" class="delete-btn" title="Print as pdf"><i class="fas fa-print"></i></button>
                        <form class="d-inline-block reg-delete-form" onsubmit="return handleScriptForm(this)" action="/admin/registrations/${e.id}" method="post">
                            ${csrf}
                            ${deleteMethod}
                            <button class="delete-btn"><i class="fa fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            `;
                table.querySelector('tbody').appendChild(tr);
            });
        }
    </script>

    <script>
        function createSingleView(data) {

            let holderDiv = document.createElement('div');
            holderDiv.classList.add("page-pdf-break");
            holderDiv.innerHTML = `
                    <style>
                        @font-face {
                            font-family: Heuristica;
                            src: url(/fonts/Heuristica-Regular.woff2) format('woff2'),
                                url(/fonts/Heuristica-Regular.woff) format('woff');
                        }

                        @font-face {
                            font-family: Heuristica;
                            src: url(/fonts/Heuristica-Bold.woff2) format('woff2'),
                                url(/fonts/Heuristica-Bold.woff) format('woff');
                            font-weight: bold;
                        }

                        .main-con {
                            font-family: 'Heuristica', 'Tinos', serif;
                            color: black;
                        }

                        .row-1>div:nth-child(1) {
                            display: flex;
                            flex-direction: column;
                            justify-content: flex-end;
                        }

                        .row-1>div:nth-child(3) {
                            display: flex;
                            flex-direction: column;
                            align-items: flex-end;
                            justify-content: flex-end;
                            font-size: 0.8rem;
                        }

                        .row-1 p {
                            margin-bottom: 2px;
                            letter-spacing: 2px;
                        }

                        .cnic {
                            letter-spacing: 2px;
                            margin-left: 33px;
                        }

                        .row-2 {
                            margin-inline: 33px;
                        }

                        .row-2 strong {
                            font-size: 20px;
                        }

                        .row-info {
                            margin-inline: 33px;
                        }

                        .spacer {
                            height: 4px;
                            background-color: rgb(107, 173, 68);
                            margin: 0 10px;
                        }

                        .main-con {
                            width: 208mm;
                            margin: 1mm;
                            position: relative;
                        }

                        .row-info p {
                            letter-spacing: 2px;
                            text-align: justify;
                        }

                        .row-img {
                            height: 150px;
                            display: flex;
                            margin-inline: 33px;
                            justify-content: center;
                            margin-top: 80px;
                            margin-bottom: 40px;
                            position: relative;
                        }

                        .row-img img {
                            height: 100%;
                            aspect-ratio: 1/1;
                            object-fit: cover;
                            border-radius: 50%;
                        }

                        .row-img img.img-bg-notify {
                            position: absolute;
                            border-radius: initial;
                            height: 285px;
                            object-fit: contain;
                            aspect-ratio: initial;
                            transform: translateY(-50px);
                            z-index: 0;
                            opacity: 0.5;
                        }

                        .main-con>div.stamp {
                            position: absolute;
                            right: 8.5rem;
                            bottom: 6rem;
                        }

                        div.stamp>img {
                            width: 130px;
                            aspect-ratio: 1/1;
                            object-fit: contain;
                        }

                    </style>
                    <div class="mt-5 main-con" id="print-pdf-card">
                        <div class="cnic"> <strong>CNIC:</strong> ${data.cnic}  </div>
                        <div class="row mt-2 row-1 justify-content-center">
                            <div class="col-4">
                                <p> ${data.president_name} </p>
                                <p>SATE YOUTH PARLIAMENT</p>
                            </div>
                            <div class="col-3 d-flex justify-content-center">
                                <img src="/logo/logo_reg.png" style="transform: translateX(-15px);" height="150px"
                                    alt="Sate Yout Parliament">
                            </div>
                            <div class="col-4">
                                <p>${data.website_url}</p>
                                <p>${data.contact_email}</p>
                                <p>${data.contact_phone}</p>
                            </div>
                        </div>
                        <div class="spacer mt-3 mb-2"></div>
                        <div class="row-2 d-flex justify-content-between align-items-center">
                            <div class="">Date: ${(new Date(data.updated_at)).getDate().toString().padStart(2,"0")} ${(new Date(data.updated_at)).toString().split(' ')[1]} - ${(new Date(data.updated_at)).getFullYear()}</div>
                            <div style="transform: translateX(16px);"><strong>Notification</strong></div>
                            <div>Ref: SYP/${(new Date()).getFullYear()}/PAK/W${(12130 + data.id).toString().padStart(6, "0")} </div>
                        </div>
                        <div class="mt-3 row-info mb-2">
                            <p style="line-height: 1.8; letter-spacing: 1px; word-spacing: 5px;"> ${data.pg1} </p>
                        </div>
                        <div class="row-img">
                            <img style="z-index: 1;" src="/storage/images/${data.image}" alt="${data.name}">
                            <img src="/logo/logo2.png" alt="" class="img-bg-notify">
                        </div>

                        <div class="mt-3 row-info mb-4" style="line-height: 1.8;">
                            <p class="text-center mb-0">It is to notify that </p>
                            <p>Central President ${data.central_president} has appointed <u style="text-underline-offset: 2px;">
                                 <strong style="text-underline-offset: 2px; text-decoration: underline;">${data.name} (${data.phone}) as  ${data.role} </strong> at State Youth Parliament</u> in
                                recognition of his extraordinary work for Pakistan.</p>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-5 d-flex flex-column">
                                <span><strong>Copy To:</strong></span>
                                ${data.copy_to}

                            </div>
                            <div class="col-6 d-flex flex-column">
                                <span><strong>Regards:</strong></span>
                                ${data.regards}

                            </div>
                            <div class="col-2 d-flex flex-column">

                            </div>
                        </div>
                        <div class="spacer mt-3"></div>
                        <div class="d-flex align-items-center row-1 mt-3 flex-column" style="font-size: 0.9rem;">
                            <p style="letter-spacing: initial;"> ${data.address} </p>
                            <p style="letter-spacing: initial;"> ${data.contact_numbers} </p>
                            <p style="letter-spacing: initial;">E-mail: <a
                                    href="mailto:${data.bottom_contact_email}">${data.bottom_contact_email}</a></p>
                        </div>
                            
                            <div class="stamp">
                                <img src="/logo/stamp.png">
                            </div>
                        </div>
                    </div>
                `;

            return holderDiv;
        }


        function printPdf(e) {
            let id = e.dataset.id;

            let child = null;
            data.forEach(d => {
                if (d.id == id) {
                    child = d
                }
            });

            if (child) {

                let template = templates[child.template_id] ? templates[child.template_id] : templatesData[0];
                template.copy_to = template.copy_to.trim().split("\n").map(v => {
                    return `<span>${v}</span>`;
                }).join('\n');

                let allData = {
                    ...template,
                    ...child,
                };

                console.log(allData);

                let singleView = createSingleView(allData);
                singleView.style.backgroundColor = "white";
                let opt = {
                    filename: child.name.trim().toLowerCase().split(' ').join('') + " " + child.city.toLowerCase()
                        .trim() + "registration.pdf",
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'a4',
                        orientation: 'portrait'
                    },
                };
                html2pdf(singleView, opt);
            }
        }
    </script>

@endsection
