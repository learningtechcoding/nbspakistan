@extends('layouts.app')

{{-- Cropper CSS --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('js/admin/cropper/cropper.min.css') }}">
    <style>
        body {
            position: relative;
        }

        .model {
            position: absolute;
            inset: 0;
            z-index: 2000000;
            display: flex;
            justify-content: center;
            align-items: center;
            top: 0;
            left: 0;
            background-color: rgb(148 147 147 / 32%);
        }

        .model .model-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: start;
            height: 70%;
            width: 70%;
            background-color: white;
        }

        @media(max-width: 1200px) {
            .model .model-inner {
                width: clamp(95%, 90%, 90%);
            }
        }

        .model .model-inner .image-div img {
            max-width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .model .model-inner .image-div {
            width: 100%;
            height: 80%;
        }

        .cropper-view-box,
        .cropper-face {
            border-radius: 50%;
        }

    </style>
@endpush

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

        div.register-holder {
            background-image: url("/storage/images/static/register.png");
            min-height: 850px;
            background-position: bottom right;
            background-size: cover;
            position: relative;
        }

        div.register-holder .overlay {
            position: absolute;
            inset: 0;
            background-image: linear-gradient(105deg, white 40%, transparent);
            z-index: 1;
        }

        div.register-holder .content {
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 2;
        }

        div.register-holder .content input:not([type="file"]) {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
            color: black;
            outline: none;
            background: none;
            font-weight: 600;
        }

        div.register-holder .content input::placeholder {
            color: rgb(24, 24, 24);
            font-weight: 400;
        }

        div.register-holder .content select {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
            color: black;
            background: none;
            outline: none;
        }

        div.register-holder .content select[data-selected="true"] {
            font-weight: 600;
        }

        .labeled-input {
            position: relative;
        }

        .labeled-input input:focus+label {
            display: none;
        }

        @media(max-width: 500px) and (pointer:coarse) {
            .labeled-input input:focus+label {
                display: initial;
            }
        }

        .labeled-input input[value]+label {
            display: none;
        }

        .labeled-input label {
            position: absolute;
            top: 0;
            left: calc(calc(var(--bs-gutter-x)*.5) + 2px);
            width: 50%;
            background-color: white;
        }

        @media(max-width: 1900px) {
            div.register-holder {
                min-height: 700px;
            }
        }

        @media(max-width: 1100px) {
            div.register-holder {
                height: 610px;
            }
        }

        @media(max-width: 992px) {
            div.register-holder .overlay {
                background: white;
            }
        }

        @media(max-width: 767px) {
            div.register-holder {
                height: 560px;
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
    <div class="register-holder">
        <div class="overlay"></div>


        <div class="content">
            @if ($errors->any())
                <div class="alert alert-danger text-center">Please fill inputs correctly</div>
            @endif
            @if (session('message'))
                <div class="alert alert-success text-center">{{ session('message') }}</div>
            @endif

            <form action="/registration" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container mt-5">
                    <h2 class="mb-3">Register</h2>

                    <div class="row gx-3 gx-sm-5">
                        <div class="col-6 col-sm-5 col-lg-4 col-xl-3">
                            <input class="@error('name') is-invalid @enderror" type="text" name="name"
                                value="{{ old('name') }}" id="name" placeholder="Name*" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 col-sm-5 col-lg-4 col-xl-3">
                            <select class="@error('province') is-invalid @enderror" name="province" id="province" required>
                                <option value="" selected disabled>Province*</option>
                                <option value="tc" @if (old('province') === 'tc') selected @endif>TwinCities
                                </option>
                                <option value="pb" @if (old('province') === 'pb') selected @endif>Punjab</option>
                                <option value="kpk" @if (old('province') === 'kpk') selected @endif>KPK</option>
                                <option value="ba" @if (old('province') === 'ba') selected @endif>Balochistan</option>
                                <option value="sd" @if (old('province') === 'sd') selected @endif>Sindh</option>
                                <option value="gb" @if (old('province') === 'gb') selected @endif>Gilgit-Baltistan
                                </option>
                                <option value="ajk" @if (old('province') === 'ajk') selected @endif>Azad Jammu Kashmir
                                </option>
                            </select>
                            @error('province')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row gx-3 gx-sm-5 mt-5">
                        <div class="col-6 col-sm-5 col-lg-4 col-xl-3">
                            <input class="@error('father-name') is-invalid @enderror" type="text"
                                value="{{ old('father-name') }}" name="father-name" id="father-name"
                                placeholder="Father Name*" required>
                            @error('father-name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 col-sm-5 col-lg-4 col-xl-3">
                            <select class="@error('city') is-invalid @enderror" name="city" id="city" required>
                                <option value="" selected disabled>City*</option>
                            </select>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row gx-3 gx-sm-5 mt-5">
                        <div class="col-6 col-sm-5 col-lg-4 col-xl-3">
                            <input class="@error('cnic') is-invalid @enderror" type="text"
                                data-error="Enter CNIC as XXXX-XXXXXXX-X" value="{{ old('cnic') }}" name="cnic" id="cnic"
                                placeholder="CNIC*" minlength="15" pattern="^[0-9]{5}-[0-9]{7}-[0-9]$" maxlength="15"
                                required>
                            @error('cnic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 col-sm-5 col-lg-4 col-xl-3">
                            <select class="@error('education') is-invalid @enderror" name="education" id="education"
                                required>
                                <option value="" selected disabled>Education*</option>
                                <option value="No formal education" @if (old('education') === 'No formal education') selected @endif>No
                                    formal education</option>
                                <option value="Primary education" @if (old('education') === 'Primary education') selected @endif>
                                    Primary
                                    education</option>
                                <option value="Middle (class 6-8)" @if (old('education') === 'Middle (class 6-8)') selected @endif>
                                    Middle
                                    (class 6-8)</option>
                                <option value="Matric (SSC)" @if (old('education') === 'Matric (SSC)') selected @endif>Matric
                                    (SSC)</option>
                                <option value="Intermediate (HSSC)" @if (old('education') === 'Intermediate (HSSC)') selected @endif>
                                    Intermediate (HSSC)</option>
                                <option value="Bachelor's degree" @if (old('education') === "Bachelor's degree") selected @endif>
                                    Bachelor's degree</option>
                                <option value="Master's degree" @if (old('education') === "Master's degree") selected @endif>Master's
                                    degree</option>
                                <option value="Doctorate or higher" @if (old('education') === 'Doctorate or higher') selected @endif>
                                    Doctorate or higher</option>
                            </select>
                            @error('education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row gx-3 gx-sm-5 mt-5">
                        <div class="col-6 col-sm-5 col-lg-4 col-xl-3">
                            <input class="@error('phone') is-invalid @enderror" type="tel" minlength="11" maxlength="11"
                                pattern="^03[0-9]{9}$" name="phone" value="{{ old('phone') }}"
                                data-error="Enter phone number as 03XXXXXXXXX" id="phone" placeholder="Phone*" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 col-sm-5 col-lg-4 col-xl-3">
                            <select class="@error('wing-type') is-invalid @enderror" name="wing-type" id="wing-type"
                                required>
                                <option value="" selected disabled>Select Wing*</option>
                                <option>Executive Committee</option>
                                <option>Advisory Board </option>
                                <option>Central Organizing Committee </option>
                                <option>Membership & Notification Team</option>
                                <option>General Body</option>
                                <option>Universities Council </option>
                                <option>Universities Council (Females)</option>
                                <option>Women Wing</option>
                                <option>Social Media Team</option>
                                <option>Speaker Forum </option>
                                <option>Literature Forum</option>
                                <option>Overseas Chapter</option>
                                <option>Blood Committee</option>
                                <option>Doctors Wing</option>
                                <option>Traders Wing</option>
                                <option>Lawyers Wing</option>
                                <option>Islamic Scholors and Mashaikhs Wing</option>
                                <option>Minorities Wing</option>
                                <option>IT Cell</option>
                            </select>
                            @error('wing-type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row gx-3 gx-sm-5 mt-5">
                        <div class="col-6 col-sm-5 col-lg-4 col-xl-3">
                            <input class="@error('email') is-invalid @enderror" type="email" value="{{ old('email') }}"
                                name="email" id="email" placeholder="Email*" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 col-sm-5 col-lg-4 col-xl-3 labeled-input">
                            <input class="@error('birthday') is-invalid @enderror" type="date" name="birthday"
                                id="birthday" placeholder="Birthdate*" required>
                            <label for="birthday">Birthday*</label>
                            @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row gx-3 gx-sm-5 mt-5">
                        <div class="col-6 col-sm-5 col-lg-4 col-xl-3">
                            <input class="@error('institution') is-invalid @enderror" type="text"
                                value="{{ old('institution') }}" name="institution" id="institution"
                                placeholder="Institution">
                            @error('institution')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 col-sm-5 col-lg-4 col-xl-3 labeled-input">
                            <input class="@error('occupation') is-invalid @enderror" type="text"
                                value="{{ old('occupation') }}" name="occupation" id="occupation"
                                placeholder="Occupation">
                            @error('occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="row gx-3 gx-sm-5 mt-5">
                        <div class="col-12 col-md-6 d-flex flex-column">
                            <label for="image" class=" d-inline-block pb-2">Add Photo*</label>
                            <input class="@error('image') is-invalid @enderror" type="file" accept="image/*" id="image"
                                required>
                            <input type="hidden" name="image" id="server-result-image" class="d-none" hidden>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row gx-3 gx-sm-5 mt-5">
                        <div class="col-md-6 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Register</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

    {{-- Cropper Image Model --}}
    <div class="model modal d-none" id="model">
        <div class="model-inner">
            <div class="image-div">
                <img src="#" alt="User choosed image" id="model-image">
            </div>
            <div class="model-btn mt-4 d-flex">
                <button id="crop-btn" class="btn btn-primary">{{ __('Crop') }}</button>
                <button id="cancel-btn" class="btn btn-primary ml-5">{{ __('Cancel') }}</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        //Setting top-margin on main div
        let mainDivHeight = Math.ceil(document.getElementById("app-nav").getBoundingClientRect().height);
        //mainDivHeight += (5 - (mainDivHeight % 5));
        document.getElementById("app-main").style.marginTop = mainDivHeight + "px";

        const allLabeledInputs = document.querySelectorAll(".labeled-input input");
        allLabeledInputs.forEach(input => {
            input.addEventListener("change", e => {
                if (input.value == null || input.value == "" || !input.value) {
                    input.removeAttribute("value");
                } else {
                    input.setAttribute("value", input.value)
                }
            });
        });

        const allSelectInputs = document.querySelectorAll("div.register-holder select");
        allSelectInputs.forEach(select => {
            select.addEventListener("change", e => {
                if (select.value == null || select.value == "" || !select.value) {
                    select.removeAttribute("data-selected");
                } else {
                    select.setAttribute("data-selected", "true");
                }
            });
        });

        const provinceSelect = document.getElementById("province");
        const citySelect = document.getElementById("city");
        const cities = {
            tc: [
                "Islamabad",
                "Rawalpindi",
            ],
            ajk: [
                "New Mirpur",
                "Muzaffarabad",
                "Kotli",
                "Rawala Kot",
                "Bagh",
                "Athmuqam"
            ],
            gb: [
                "Aliabad",
                "Chilas",
                "Dambudas",
                "Danyor",
                "Eidghah",
                "Gahkuch",
                "Gilgit",
                "Ishkoman",
                "Juglot",
                "Karimabad",
                "Khaplu",
                "Nagarkhas",
                "Shigar",
                "Skardu",
                "Tangir",
                "Tolti",
            ],
            ba: [
                "Quetta",
                "Turbat",
                "Khuzdar",
                "Chaman",
                "Zhob",
                "Gwadar",
                "Kalat",
                "Dera Allahyar",
                "Pishin",
                "Dera Murad Jamali",
                "Kohlu",
                "Mastung",
                "Loralai",
                "Barkhan",
                "Musa Khel Bazar",
                "Ziarat",
                "Gandava",
                "Sibi",
                "Dera Bugti",
                "Uthal",
                "Khuzdar",
                "Panjgur",
                "Qila Saifullah",
                "Kharan",
                "Awaran",
                "Dalbandin"
            ],
            pb: [
                "Ahmedpur East",
                "Arif Wala",
                "Attock",
                "Bahawalnagar",
                "Bahawalpur",
                "Bhakkar",
                "Bhalwal",
                "Burewala",
                "Chakwal",
                "Chiniot",
                "Chishtian",
                "Daska",
                "Dera Ghazi Khan",
                "Faisalabad",
                "Ferozewala",
                "Gojra",
                "Gujranwala",
                "Gujranwala Cantonment",
                "Gujrat",
                "Hafizabad",
                "Haroonabad",
                "Hasilpur",
                "Jaranwala",
                "Jatoi",
                "Jhang",
                "Jhelum",
                "Kamalia",
                "Kamoke",
                "Kasur",
                "Khanewal",
                "Khanpur",
                "Khushab",
                "Kot Abdul Malik",
                "Kot Addu",
                "Lahore",
                "Layyah",
                "Lodhran",
                "Mandi Bahauddin",
                "Mianwali",
                "Multan",
                "Muridke",
                "Muzaffargarh",
                "Narowal",
                "Okara",
                "Pakpattan",
                "Rahim Yar Khan",
                "Rawalpindi",
                "Sadiqabad",
                "Sahiwal",
                "Sambrial",
                "Samundri",
                "Sargodha",
                "Sheikhupura",
                "Sialkot",
                "Taxila",
                "Vehari",
                "Wah Cantonment",
                "Wazirabad",
            ],
            sd: [
                "Badin",
                "Bandhi",
                "Bhiria City",
                "Bhiria Road",
                "Bhirkan",
                "Boriri",
                "Chak",
                "Dadu",
                "Daharki",
                "Daulatpur",
                "Digri",
                "Diplo",
                "Dokri",
                "Gambat",
                "Garhi Yasin",
                "Ghotki",
                "Guddu Barrage",
                "Hala",
                "Khairpur Mirs",
                "Hyderabad",
                "Islamkot",
                "Jacobabad",
                "Jamshoro",
                "Jam sahib",
                "Kandhkot",
                "Kandiaro",
                "Karachi",
                "Kashmore",
                "Keti Bandar",
                "Khadro",
                "Khairpur",
                "Khipro",
                "Kiamari",
                "Korangi",
                "Kot Diji",
                "Kotri",
                "Kunri",
                "Lakhi ghulam shah",
                "Larkana",
                "Madeji",
                "Malir",
                "Manjhand",
                "Maqsoodo Rind",
                "Matiari",
                "Mehar",
                "Mehrabpur",
                "Mehrabpur",
                "Mian Sahib",
                "Miranpur",
                "Mirpur Khas",
                "Mirpur Mathelo",
                "Mithani",
                "Mithi",
                "Moro",
                "Nagarparkar",
                "Nasirabad",
                "Naudero",
                "Naushahro Feroze",
                "Nawabshah",
                "Pir Jo Goth",
                "Piryaloi",
                "Qambar",
                "Qasimabad",
                "Qubo Saeed Khan",
                "Rajo Khanani",
                "Ranipur",
                "Ratodero",
                "Rohri",
                "Sakrand",
                "Samaro",
                "Sanghar",
                "Sann",
                "Sehwan Sharif",
                "Shahbandar",
                "Shahdadkot",
                "Shahdadpur",
                "Shahpur Chakar",
                "Shahpur jahania",
                "Shikarpaur",
                "Sijawal Junejo",
                "Sinjhoro",
                "Sita Road",
                "Sobho Dero",
                "Sukkur",
                "Tando Adam Khan",
                "Tando Allahyar",
                "Tando Muhammad Khan",
                "Tangwani",
                "Thari Mirwah",
                "Tharushah",
                "Thatta",
                "Thul",
                "Ubauro",
                "Umerkot",
                "Warah",
            ],
            kpk: [
                "Abbottabad",
                "kora Khattak",
                "Amangarh",
                "Bahrain",
                "Bannu",
                "Barikot",
                "Batkhela",
                "Charsadda",
                "Chitral",
                "Dera Ismail Khan",
                "Dir",
                "Hangu",
                "Haripur",
                "Havelian",
                "Jamrud",
                "Jehangira",
                "Kabal",
                "Karak",
                "Khalabat",
                "Khwazakhela",
                "Kohat",
                "Lakki Marwat",
                "Landi Kotal",
                "Mansehra",
                "Mardan",
                "Matta",
                "Mingora",
                "Nawan Shehr",
                "Nowshera",
                "Pabbi",
                "Paharpur",
                "Paroa",
                "Peshawar",
                "Risalpur",
                "Sadda",
                "Shabqadar",
                "Swabi",
                "Takht-i-Bahi",
                "Tall",
                "Tangi",
                "Tank",
                "Timargara",
                "Topi",
                "Tordher",
                "Utmanzai",
                "Zaida",
            ]
        }

        provinceSelect.addEventListener("change", e => {
            changeCitySelect();
        });

        function changeCitySelect() {
            let data;
            if (provinceSelect.value === "") {
                data = "<option value='' disabled selected>Choose City*</option>";
                citySelect.innerHTML = data;
            } else {
                data = "<option value='' disabled selected>Choose City*</option>";
                cities[provinceSelect.value].forEach(i => {
                    data += `<option value='${i}'>${i}</option>`;
                });
                citySelect.innerHTML = data;
                citySelect.removeAttribute("data-selected");
            }
        }
        changeCitySelect();

        /* Attaching data-error with inputes */
        const allInputsWithDataError = document.querySelectorAll("input[data-error]");
        allInputsWithDataError.forEach(input => {
            input.oninvalid = function(e) {
                if (!input.validity.valid) {
                    input.setCustomValidity(input.dataset.error);
                }
            };
            input.oninput = function(e) {
                input.setCustomValidity("");
            };
        });
    </script>
@endpush

{{-- Image Crop Script --}}
@push('scripts')
    <script src="{{ asset('js/admin/cropper/cropper.min.js') }}"></script>
    <script>
        function getRoundedCanvas(sourceCanvas) {
            var canvas = document.createElement('canvas');
            var context = canvas.getContext('2d');
            var width = sourceCanvas.width;
            var height = sourceCanvas.height;
            canvas.width = width;
            canvas.height = height;
            context.imageSmoothingEnabled = true;
            context.fillStyle = "#fff"
            context.drawImage(sourceCanvas, 0, 0, width, height);
            context.globalCompositeOperation = 'destination-in';
            context.beginPath();
            context.arc(width / 2, height / 2, Math.min(width, height) / 2, 0, 2 * Math.PI, true);
            context.fill();
            var imgData = context.getImageData(0, 0, canvas.width, canvas.height);
            var data = imgData.data;
            for (var i = 0; i < data.length; i += 4) {
                if (data[i + 3] < 255) {
                    data[i] = 255;
                    data[i + 1] = 255;
                    data[i + 2] = 255;
                    data[i + 3] = 255;
                }
            }
            context.putImageData(imgData, 0, 0);
            return canvas;
        }

        const image = document.getElementById("image");
        var croppable = false;
        var cropper;
        image.addEventListener("change", e => {
            const [file] = image.files;
            if (file) {
                document.getElementById("model-image").src = URL.createObjectURL(file);
                document.getElementById("model").classList.remove("d-none");
                cropper = new Cropper(document.getElementById("model-image"), {
                    viewMode: 1,
                    dragMode: 'move',
                    aspectRatio: 1,
                    ready: function() {
                        croppable = true;
                    }
                });
            } else {
                document.getElementById("server-result-image").value = null;
            }
        });

        const button = document.getElementById("crop-btn");
        var mainCanvas;
        button.onclick = function() {
            var croppedCanvas;
            var roundedCanvas;
            var roundedImage;
            if (!croppable) {
                return;
            }
            croppedCanvas = cropper.getCroppedCanvas({
                imageSmoothingEnabled: true,
                fillStyle: '#fff',
            });
            roundedCanvas = getRoundedCanvas(croppedCanvas);
            mainCanvas = roundedCanvas;
            document.getElementById("server-result-image").value = roundedCanvas.toDataURL('image/jpeg', 1);
            croppable = false;
            cropper.destroy();
            cropper = null;
            document.getElementById("model").classList.add("d-none");
        };

        document.getElementById("cancel-btn").addEventListener("click", e => {
            croppable = false;
            cropper.destroy();
            cropper = null;
            image.value = null;
            document.getElementById("server-result-image").value = null;
            document.getElementById("model").classList.add("d-none");

        });

        var cnicValue = "";
        //37401-1898703-2
        document.querySelector("input#cnic").addEventListener("input", e => {

            if (e.inputType === "deleteContentBackward") {
                if (cnicValue.length === 6) {
                    e.target.value = cnicValue.substr(0, 4);
                }
                if (cnicValue.length === 14) {
                    e.target.value = cnicValue.substr(0, 12);
                }
            } else if (e.inputType === "insertText") {
                if (e.target.value[e.target.value.length - 1] != "0") {
                    if (!parseInt(e.target.value[e.target.value.length - 1])) {
                        e.target.value = cnicValue;
                        e.preventDefault();
                        return;
                    }
                }
                if (e.target.value.length == "5" || e.target.value.length == "13") {
                    e.target.value += "-";
                }
            }
            cnicValue = e.target.value;
        });
    </script>
@endpush
