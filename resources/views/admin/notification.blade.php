<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <link href="https://fonts.googleapis.com/css2?family=Tinos:wght@400;700&display=swap" rel="stylesheet">

    <title>Document</title>
</head>

<body>
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

        body {
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
    <div class="mt-5 main-con mb-5" id="main">
        <div class="cnic"> <strong>CNIC:</strong>{{ $data->cnic }} </div>
        <div class="row mt-2 row-1 justify-content-center">
            <div class="col-4">
                <p>Ijaz Gondal - President</p>
                <p>SATE YOUTH PARLIAMENT</p>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <img src="/logo/logo_reg.png" style="transform: translateX(-15px);" height="150px"
                    alt="Sate Yout Parliament">
            </div>
            <div class="col-4">
                <p>www.stateyouthparliament.pk</p>
                <p>contact@stateyouthparliament.pk</p>
                <p>+92 304 6001087</p>
            </div>
        </div>
        <div class="spacer mt-3 mb-2"></div>
        <div class="row-2 d-flex justify-content-between align-items-center">
            <div class="">Date: {{ now()->format('d M - Y') }}</div>
            <div style="transform: translateX(16px);"><strong>Notification</strong></div>
            <div>Ref: SYP/{{ now()->year }}/PAK/{{ str_pad($data->id, 5, '0', STR_PAD_LEFT) }}</div>
        </div>
        <div class="mt-3 row-info mb-2">
            <p style="line-height: 1.8; letter-spacing: 1px; word-spacing: 5px;">State Youth Parliament is an
                alliance of Student
                leaders from all student
                Union/Youth Leagues Pakistan.
                This platform was made in order to defend Pakistan and its ideology at every platform.</p>
        </div>
        <div class="row-img">
            <img src="/storage/images/{{ $data->image }}" alt="{{ $data->name }}">

            <img src="/logo/logo2.png" alt="" class="img-bg-notify">
        </div>

        <div class="mt-3 row-info mb-4" style="line-height: 1.8;">
            <p class="text-center mb-0">It is to notify that </p>
            <p>Central President Mr. Ijaz Gondal has appointed <u style="text-underline-offset: 2px;"> <strong>
                        {{ $data->name }} ({{ $data->phone }}) as {{ $data->role }} </strong> at State Youth
                    Parliament</u> in
                recognition of his extraordinary work for Pakistan.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-5 d-flex flex-column">
                <span><strong>Copy To:</strong></span>
                <span>Mr. Shaheer Sialvi - Founder</span>
                <span>Mr. Muhammad Haseeb - CCOC</span>
                <span>State Youth Parliament</span>

            </div>
            <div class="col-6 d-flex flex-column">
                <span><strong>Regards:</strong></span>
                <span>Mr. Hashaam Bin Malik</span>
                <span>Acting Chairman Universities Council - Punjab</span>
                <span>State Youth Parliament</span>
                <span>(+92 306 5118373)</span>


            </div>
            <div class="col-2 d-flex flex-column">

            </div>
        </div>
        <div class="spacer mt-3"></div>
        <div class="d-flex align-items-center row-1 mt-3 flex-column" style="font-size: 0.9rem;">
            <p style="letter-spacing: initial;">Office#1, LG Floor, Emaan Heights, Zaraj Housing Society Islamabad,
                44000, Pakistan</p>
            <p style="letter-spacing: initial;">+92 344 9319963, +92 300 4423400, +92 304 6001087</p>
            <p style="letter-spacing: initial;">E-mail: <a
                    href="mailto:contact@stateyouthparliament.pk">contact@stateyouthparliament.pk</a></p>
        </div>

        <div class="stamp">
            <img src="/logo/stamp.png">
        </div>
    </div>

    <form action="/admin/registrations/file-save/{{ $data->id }}" id="file-form" method="post"
        style="display: hidden" hidden>
        @csrf
        <input type="text" name="file" id="file">
    </form>

    <script src="/js/admin/html2pdf.bundle.min.js"></script>
    <script>
        const singleView = document.getElementById("main").cloneNode(true);
        let opt = {
            filename: "registration.pdf",
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
        //html2pdf(singleView, opt);
        const worker = html2pdf().set(opt).from(singleView);
        var file;
        worker.outputPdf('blob')
            .then(pdf => {
                var formData = new FormData();
                formData.append('file', pdf);
                formData.append('_token', '{{ csrf_token() }}');
                var request = new XMLHttpRequest();
                request.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                    } else if (this.readyState == 4) {
                        console.log("Error");
                    }
                };
                request.open("POST", window.origin + "/admin/registrations/file-save/{{ $data->id }}");
                request.send(formData);
            });
    </script>
</body>

</html>
