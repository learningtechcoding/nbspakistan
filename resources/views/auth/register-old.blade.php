@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="/registration" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label ">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="father-name" class="col-md-4 col-form-label ">Father Name</label>

                            <div class="col-md-6">
                                <input id="father-name" type="text"
                                    class="form-control @error('father-name') is-invalid @enderror" name="father-name"
                                    value="{{ old('father-name') }}" required autocomplete="father-name" autofocus>

                                @error('father-name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label ">Phone#</label>

                            <div class="col-md-6">
                                <input value="{{ old('phone') ? old('phone') : '' }}" id="phone" type="tel"
                                    pattern="^03[0-9]{2}[0-9]{7}$"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone" required
                                    autocomplete="phone" placeholder="03000000000">
                                <span class="invalid-feedback d-block" role="alert" style="color: #324d69;">
                                </span>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="province" class="col-md-4 col-form-label ">Province</label>

                            <div class="col-md-6">
                                <select id="province" class="form-control @error('province') is-invalid @enderror"
                                    name="province" required>
                                    <option value="">Choose Province</option>
                                    <option value="pb">Punjab</option>
                                    <option value="sd">Sindh</option>
                                    <option value="kpk">Khyber Pakhtunkhwa </option>
                                    <option value="ba">Balochistan </option>
                                    <option value="ajk">Azad Jammu & Kashmir</option>
                                    <option value="gb">Gilgit-Baltistan </option>
                                </select>

                                @error('province')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label ">City</label>
                            <div class="col-md-6">
                                <select id="city" class="form-control @error('city') is-invalid @enderror" name="city"
                                    required>
                                    <option value="">Choose City</option>
                                </select>

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cnic" class="col-md-4 col-form-label ">CNIC</label>

                            <div class="col-md-6">
                                <input id="cnic" type="text" pattern="^[0-9]{5}-[0-9]{7}-[0-9]$"
                                    class="form-control @error('cnic') is-invalid @enderror" name="cnic"
                                    value="{{ old('cnic') }}" required autocomplete="cnic" autofocus placeholder="00000-0000000-0">
                                <span class="invalid-feedback d-block" role="alert" style="color: #324d69;">
                                </span>
                                @error('cnic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label ">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="facebook-link" class="col-md-4 col-form-label ">Facebook
                                link</label>

                            <div class="col-md-6">
                                <input id="facebook-link" type="url"
                                    class="form-control @error('facebook-link') is-invalid @enderror"
                                    name="facebook-link" value="{{ old('facebook-link') }}" required
                                    autocomplete="facebook-link" autofocus placeholder="https://m.facebook.com/..yourname..">
                                <span class="invalid-feedback d-block" role="alert" style="color: #324d69;">
                                </span>
                                @error('facebook-link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="twitter-link" class="col-md-4 col-form-label ">Twitter link</label>

                            <div class="col-md-6">
                                <input id="twitter-link" type="url"
                                    class="form-control @error('twitter-link') is-invalid @enderror" name="twitter-link"
                                    value="{{ old('twitter-link') }}" required autocomplete="twitter-link" autofocus placeholder="https://twitter.com/..yourname..">
                                <span class="invalid-feedback d-block" role="alert" style="color: #324d69;">
                                </span>
                                @error('twitter-link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="education" class="col-md-4 col-form-label ">Education</label>

                            <div class="col-md-6">
                                <select name="education" class="form-control @error('education') is-invalid @enderror"
                                    id="education" required autocomplete="education" autofocus>
                                    <option value="" selected="selected" disabled="disabled">Choose Education</option>
                                    <option value="No formal education">No formal education</option>
                                    <option value="Primary education">Primary education</option>
                                    <option value="Middle (class 6-8)">Middle (class 6-8)</option>
                                    <option value="Matric (SSC)">Matric (SSC)</option>
                                    <option value="Intermediate (HSSC)">Intermediate (HSSC)</option>
                                    <option value="Bachelor's degree">Bachelor's degree</option>
                                    <option value="Master's degree">Master's degree</option>
                                    <option value="Doctorate or higher">Doctorate or higher</option>
                                </select>

                                @error('education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label ">Age</label>

                            <div class="col-md-6">
                                <input id="age" type="number" min="12" step="1"
                                    class="form-control @error('age') is-invalid @enderror" name="age"
                                    value="{{ old('age') }}" required autocomplete="age" autofocus>

                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="team-type" class="col-md-4 col-form-label ">Team Type</label>

                            <div class="col-md-6">
                                <select id="team-type" class="form-control @error('team-type') is-invalid @enderror"
                                    name="team-type" required>
                                    <option value="">Choose Team Type</option>
                                    <option value="General Team">General Team</option>
                                    <option value="Social Media Team">Social Media</option>
                                    <option value="University Council">University Council</option>
                                    <option value="Women Wing">Women Wing</option>
                                    <option value="Lawyers Wing">Lawyers Wing</option>
                                </select>

                                @error('team-type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="is-member" class="col-md-4 col-form-label ">Are you already Member
                                of SYP</label>

                            <div class="col-md-6 checkbox-info">
                                <div class="checkbox-div">
                                    <input id="is-member" type="radio"
                                        class="form-control @error('is-member') is-invalid @enderror" name="is-member"
                                        value="1" required autocomplete="is-member" autofocus>
                                    Yes
                                </div>
                                <div class="checkbox-div">
                                    <input id="is-member" type="radio"
                                        class="form-control @error('is-member') is-invalid @enderror" name="is-member"
                                        value="0" required autocomplete="is-member" autofocus>
                                    No
                                </div>
                                <span class="toggle-info">
                                    <strong>i</strong>
                                    <p>If you already have some work with syp then choose yes. it help us to find great
                                        resources for our team.</p>

                                </span>
                                @error('is-member')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label ">Picture</label>

                            <div class="col-md-6">
                                <input id="image" type="file" accept="image/*"
                                    class="form-control @error('image') is-invalid @enderror" name="image"
                                    value="{{ old('image') }}" required autocomplete="image" autofocus>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const provinceSelect = document.getElementById("province");
    const citySelect = document.getElementById("city");
    /* const tehsilSelect = document.getElementById("tehsil");
    const inputTehsil = document.getElementById("input-tehsil"); */
    const cities = {
        ajk :
        [
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
        let data;
        if(provinceSelect.value === ""){
            data = "<option value=''>Choose City</option>";
            citySelect.innerHTML = data;
        }
        else {
            data = "<option value=''>Choose City</option>";
            cities[provinceSelect.value].forEach(i => {
                data += `<option value='${i}'>${i}</option>`;
            });
            citySelect.innerHTML = data;
        }

    });

    /*
    citySelect.addEventListener("change", e => {
        let province = provinceSelect.value;
        let district = e.target.value;

        let data;
        if(provinceSelect.value === ""){
            data = "<option value=''>Choose Tehsil</option>";
            tehsilSelect.innerHTML = data;
        }
        else if(provinceSelect.value === "pb"){
            data = "<option value=''>Choose Tehsil</option>";
            Punjab[district].forEach(i => {
                data += `<option value='${i}'>${i}</option>`;
            });
            tehsilSelect.innerHTML = data;
        }
        else if(provinceSelect.value === "ba"){
            data = "<option value=''>Choose Tehsil</option>";
            Balochistan[district].forEach(i => {
                data += `<option value='${i}'>${i}</option>`;
            });
            tehsilSelect.innerHTML = data;
        }
        else if(provinceSelect.value === "sd"){
            data = "<option value=''>Choose Tehsil</option>";
            Sindh[district].forEach(i => {
                data += `<option value='${i}'>${i}</option>`;
            });
            tehsilSelect.innerHTML = data;
        }
        else if(provinceSelect.value === "kpk"){
            data = "<option value=''>Choose Tehsil</option>";
            Kpk[district].forEach(i => {
                data += `<option value='${i}'>${i}</option>`;
            });
            tehsilSelect.innerHTML = data;
        }
    }) */

</script>

@endsection
