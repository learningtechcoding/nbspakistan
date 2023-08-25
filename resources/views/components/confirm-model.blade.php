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
            <h2>{{$message}}</h2>
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
    const deleteForms = document.querySelectorAll(".{{$delFormClass}}");
    deleteForms.forEach(form => {
        form.addEventListener("submit", e => {
            document.getElementById('model').style.top = window.pageYOffset + "px";
            model.classList.remove('d-none');
            e.preventDefault();
            ModelCancelBtn.addEventListener("click", cancelHandler);
            ModelSaveBtn.addEventListener("click", e2 => {
                e.target.submit();
            });
        })
    });
    function cancelHandler(e) {
        model.classList.add("d-none");
        ModelCancelBtn.removeEventListener("click", cancelHandler);
    }


    /* Scroll handling when model is on screen */
    let last_known_scroll_position = 0;
    let ticking = false;

    function doSomething(scroll_pos) {
        if(!document.getElementById('model').classList.contains("d-none")){
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
