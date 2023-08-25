@extends('admin.app')

@section('content')
    <style>
        .user-field-row {
            padding: 5px 0;
            border-bottom: 1px solid gray;
            margin-bottom: 10px;
        }

        .user-field-row div {
            font-size: 1rem;
        }

        @media(max-width: 1350px) {
            .user-field-row .col-4 {
                width: 41.66667%;
            }

            .user-field-row .col-6 {
                width: 58.33333%;
            }
        }

        @media(max-width: 1250px) {
            .user-data-field {
                width: 66.66667%;
            }
        }

        @media(max-width: 800px) {
            .user-data-field {
                width: 66.66667%;
            }

            .user-image {
                text-align: center;
            }
        }

    </style>
    <div class="container mt-5 mb-5">
        <div id="print-pdf-card">
            <div class="card">
                <div class="mt-3 mb-1 card-header">
                    <h3 class=" text-center"> SYP Registration Application </h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-around">
                        <div class="col-md-6 user-data-fields">
                            <div class="row user-field-row">
                                <div class="col-4"><strong>Name</strong></div>
                                <div class="col-7">{{ $data->name }}</div>
                            </div>
                            @if (Auth::user()->type === 'superAdmin')
                                <div class="row user-field-row">
                                    <div class="col-4"><strong>Role</strong></div>
                                    <div class="col-7">{{ $data->role }}</div>
                                </div>
                            @endif
                            <div class="row user-field-row">
                                <div class="col-4"><strong>Father Name</strong></div>
                                <div class="col-7">{{ $data['father-name'] }}</div>
                            </div>
                            <div class="row user-field-row">
                                <div class="col-4"><strong>Phone Number</strong></div>
                                <div class="col-7">{{ $data['phone'] }}</div>
                            </div>
                            <div class="row user-field-row">
                                <div class="col-4"><strong>Province</strong></div>
                                <div class="col-7">{{ $province[$data['province']] }}</div>
                            </div>
                            <div class="row user-field-row">
                                <div class="col-4"><strong>City</strong></div>
                                <div class="col-7">{{ $data['city'] }}</div>
                            </div>
                            <div class="row user-field-row">
                                <div class="col-4"><strong>CNIC</strong></div>
                                <div class="col-7">{{ $data['cnic'] }}</div>
                            </div>
                            <div class="row user-field-row">
                                <div class="col-4"><strong>Email Address</strong></div>
                                <div class="col-7">{{ $data['email'] }}</div>
                            </div>
                            <div class="row user-field-row">
                                <div class="col-4"><strong>Education</strong></div>
                                <div class="col-7">{{ $data['education'] }}</div>
                            </div>
                            <div class="row user-field-row">
                                <div class="col-4"><strong>Birthday</strong></div>
                                <div class="col-7">{{ $data['birthday'] }}</div>
                            </div>
                            <div class="row user-field-row">
                                <div class="col-4"><strong>Occupation</strong></div>
                                <div class="col-7">{{ $data['occupation'] }}</div>
                            </div>
                            <div class="row user-field-row">
                                <div class="col-4"><strong>Institution</strong></div>
                                <div class="col-7">{{ $data['institution'] }}</div>
                            </div>
                            <div class="row user-field-row">
                                <div class="col-4"><strong>Wing Type</strong></div>
                                <div class="col-7">{{ $data['wing-type'] }}</div>
                            </div>
                        </div>
                        <div class=" col-md-3 user-image">
                            @if (strpos($data->image, 'http') !== false)
                                <img width="140px" src="{{ $data->image }}" alt="User image">
                            @else
                                <img width="140px" src="/storage/images/{{ $data->image }}" alt="User image">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (Auth::user()->type === 'admin')
            <div class="mt-4 mb-4 d-flex justify-content-center gap-5">
                <form class="d-none" id="accept-form" action="/admin/registrations/{{ $data->id }}/accept"
                    method="post">
                    @csrf
                    @method('put')
                    <input type="text" name="reg-role" id="reg-role">
                </form>
                <button id="accept-btn" data-id="{{ $data->id }}" data-name="{{ $data->name }}"
                    class="btn btn-lg btn-success">Accept</button>
                <form class="d-inline-block" action="/admin/registrations/{{ $data->id }}/reject" method="post">
                    @csrf
                    @method('put')
                    <button class="btn btn-lg btn-danger">Reject</button>
                </form>
            </div>
        @endif
    </div>
    @if (Auth::user()->type === 'admin')
        <div id="model" class="model-holder d-none">
            <style>
                .confirm-model {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    height: 50%;
                    width: 50%;
                    background-color: white;
                    margin-top: 25vh;
                }

                .confirm-model * {
                    margin: 20px;
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
                    <h2 id="role-header">Enter role</h2>
                    <div class="d-flex flex-column role-input">
                        <input type="text" id="role">
                        <span id="role-input-error" class="invalid-feedback">Role is required</span>
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
            const model = document.getElementById("model");
            const ModelCancelBtn = document.getElementById("model-cancel-btn");
            const ModelSaveBtn = document.getElementById("model-save-btn");
            const roleModelInput = document.getElementById("role");
            const acceptForm = document.getElementById("accept-form");
            const regFormRole = document.getElementById("reg-role");
            const roleHeader = document.getElementById("role-header");
            const roleError = document.getElementById("role-input-error");

            document.getElementById("accept-btn").addEventListener("click", e => {
                let name = e.target.dataset.name;
                roleHeader.innerText = "Enter role for " + name;
                model.style.top = window.pageYOffset + "px";
                model.classList.remove('d-none');
                ModelCancelBtn.addEventListener("click", cancelHandler);
                ModelSaveBtn.addEventListener("click", successHandler);
            });

            function cancelHandler(e) {
                model.classList.add("d-none");
                roleError.classList.remove("d-inline-block");
                roleModelInput.value = ""
                ModelCancelBtn.removeEventListener("click", cancelHandler);
                ModelSaveBtn.removeEventListener("click", successHandler);
            }

            function successHandler(e) {
                let id = document.getElementById("accept-btn").dataset.id;
                if (roleModelInput.value.length <= 1) {
                    roleError.classList.add("d-inline-block");
                    return;
                }
                regFormRole.value = roleModelInput.value;
                acceptForm.setAttribute("action", `/admin/registrations/${id}/accept`);
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
    @endif
@endsection
