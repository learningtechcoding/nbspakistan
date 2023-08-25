@extends('admin.app')


@section('content')
    <div class="admin-container">

        <div class="container mt-4">
            <div class="heading">
                <p class="text-center text-capitalize h2">
                    Generate Notification
                </p>
            </div>
            <div class="edit-info">

                @if (isset($fields['strings']))
                    @foreach ($fields['strings'] as $attr => $input)
                        <div class="info">
                            <p class="mr-3 text-bold text-capitalize"> {{ $input }} </p>
                        </div>
                        <div class="info">
                            <input type="text" value="" name="{{ $attr }}" id="{{ $attr }}" required>
                        </div>
                    @endforeach
                @endif

                @if (isset($fields['dates']))
                    @foreach ($fields['dates'] as $attr => $input)
                        <div class="info">
                            <p class="mr-3 text-bold text-capitalize"> {{ $input }} </p>
                        </div>
                        <div class="info">
                            <input type="date" value="" name="{{ $attr }}" id="{{ $attr }}"
                                required>
                        </div>
                    @endforeach
                @endif

                @if (isset($fields['images']))
                    @foreach ($fields['images'] as $attr => $input)
                        <div class="info image-info">
                            <p class="mr-3 text-bold text-capitalize">{{ $input }}</p>
                        </div>
                        <div class="info">
                            <input accept="image/*" type="file" id="{{ $attr }}" name="{{ $attr }}"
                                required>
                        </div>
                    @endforeach
                @endif

                <div class="info">
                    <p class="mr-3 text-bold text-capitalize"> Choose notification template </p>
                </div>
                <div class="info">
                    <select name="notification-template" id="notification-template" required>
                        @foreach ($templates as $template)
                            <option value="{{ $template->id }}"> {{ $template->template_name }} </option>
                        @endforeach
                    </select>
                </div>


            </div>

            <div class="d-flex justify-content-center gap-4 mt-3 mb-5">
                <button id="generate-notification-btn" class="btn btn-lg btn-success">Generate</button>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script src="/js/admin/html2pdf.bundle.min.js"></script>
    <script>
        const notifyGenButton = document.getElementById("generate-notification-btn");
        const name = document.getElementById("name");
        const number = document.getElementById("number");
        const role = document.getElementById("role");
        const cnic = document.getElementById("cnic");
        const ref_no = document.getElementById("ref_no");
        const date = document.getElementById("date");
        const image = document.getElementById("image");

        const templateSelect = document.getElementById("notification-template");
        const templatesData = {!! $templates->toJson(JSON_HEX_TAG) !!};
        const templates = [];
        templatesData.forEach(template => {
            templates[template.id] = template;
        });

        notifyGenButton.addEventListener("click", e => {
            if (!name.value || !number.value || !role.value || !cnic.value || !ref_no.value || !date.value || !image
                .value || !templateSelect.value) {
                return;
            }
            console.log(image.value);

            var reader = new FileReader();

            reader.onload = function(e) {

                const data = {
                    name: name.value,
                    phone: number.value,
                    role: role.value,
                    cnic: cnic.value,
                    ref_no: ref_no.value,
                    date: date.valueAsDate
                };
                data["image"] = e.target.result;

                const selectedTemplate = templates[parseInt(templateSelect.value)];

                const allData = {
                    ...data,
                    ...selectedTemplate
                };

                printPdf(allData);

            }

            reader.readAsDataURL(image.files[0]);

        });

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
                        height: 6px;
                        background-color: red;
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
                        height: 600px;
                        object-fit: contain;
                        aspect-ratio: initial;
                        transform: translateY(-50px);
                        z-index: 0;
                        opacity: 0.2;
                    }

                    .stamp {
                        position: absolute;
                        left: 8.5rem;
                        bottom: 6rem;
                    }

                    .stamp>img {
                        width: 100px;
                        aspect-ratio: 1/1;
                        object-fit: contain;
                        opacity:0.4
                    }
                    .top-h{
                        font-size:35px;
                        color:red;
                        font-weight:600;
                    }
                </style>
                <div class="main-con" id="print-pdf-card" style="margin-top:150px;">
                    <div class="cnic"> <strong>CNIC:</strong> ${data.cnic}  </div>
                    <div class="row mt-2 row-1 justify-content-center">
                        <div class="col-3">

                            <img class="text-center" src="/logo/pakistan.jfif" style="transform: translateX(-15px);width:150px;padding-left:10px"
                                alt="Sate Yout Parliament">
                        </div>
                        <div class="col-6 d-flex justify-content-center align-items-center">
                            <h1 class="top-h"> National Blood Society</h1>

                        </div>
                        <div class="col-3">
                            <img src="/logo/NBC logo.png" style="transform: translateX(-15px);" width="150px"
                                alt="Sate Yout Parliament">

                        </div>
                    </div>
                    <div class="spacer mt-3 mb-2"></div>
                    <div class="row-2 d-flex justify-content-between align-items-center">
                        <div class="">Date: ${data.date.getDate().toString().padStart(2,"0")} ${data.date.toString().split(' ')[1]} - ${data.date.getFullYear()}</div>
                        <div style="transform: translateX(16px);"><strong>Notification</strong></div>
                        <div>Ref: ${data.ref_no} </div>
                    </div>
                    <div class="mt-3 row-info mb-2">
                        <p style="line-height: 1.8; letter-spacing: 1px; word-spacing: 5px;"> ${data.pg1} </p>
                    </div>
                    <div class="row-img">
                        <img style="z-index: 1;" src="${data.image}" alt="${data.name}">
                        <img src="/logo/NBC logo.png" alt="" class="img-bg-notify">
                    </div>

                    <div class="mt-3 row-info mb-4" style="line-height: 1.8;">
                        <p class="text-center mb-0">It is to notify that </p>
                        <p>Central President ${data.central_president} has appointed <u style="text-underline-offset: 2px;">
                            <strong style="text-underline-offset: 2px; text-decoration: underline;">${data.name} (${data.phone}) as  ${data.role} </strong> at State Youth Parliament</u> in
                            recognition of his extraordinary work for Pakistan.</p>
                    </div>
                    <div class="row justify-content-center">

                        <div class="col-6 d-flex flex-column">
                            <span><strong>Regards:</strong></span>
                            ${data.regards.split("\n").map(v => "<span>"+v+"</span>").join("\n")}
                            <div class="stamp">
                            <img src="/logo/NBS stamp.jpeg">
                        </div>
                        </div>
                        <div class="col-5 d-flex flex-column">
                            <span><strong>Copy To:</strong></span>
                            ${data.copy_to.split("\n").map(v => "<span>"+v+"</span>").join("\n")}
                        </div>
                        <div class="col-2 d-flex flex-column">

                        </div>
                    </div>
                    <div class="spacer mt-3"></div>
                        <div class="d-flex align-items-center row-1 mt-3 flex-column" style="font-size: 0.9rem;">
                            <p style="letter-spacing: initial;"> ${data.address} </p>
                            <p style="letter-spacing: initial;"> ${data.contact_numbers} </p>
                            <p style="letter-spacing: initial;"><b>E-mail: <a
                                    href="mailto:${data.bottom_contact_email}">${data.bottom_contact_email}</a></b></p>
                        </div>


                    </div>
                </div>
            `;

            return holderDiv;
        }


        function printPdf(data) {
            let singleView = createSingleView(data);

            singleView.style.backgroundColor = "white";
            singleView.style.paddingTop = "2rem";
            let opt = {
                filename: data.name.trim().toLowerCase().split(' ').join('') + " " + data.role.toLowerCase()
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
                }
            };
            html2pdf().from(singleView).set(opt).save();
        }
    </script>
@endpush
