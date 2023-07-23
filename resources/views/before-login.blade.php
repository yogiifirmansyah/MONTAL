<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simontal</title>
    <link rel="stylesheet" href="{{ ('assets/css/custom.css') }}">
    <link rel="shortcut icon" href="{{ URL::asset('/assets/images/logovokasi.png') }}">
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="content-one">
                <h2>Selamat datang di<br>SIMONTAL</h2>
                <p>Eksplorasi SIMONTAL disini</p>
                <a href="{{ url('login') }}" class="button-login">Masuk</a>
                <div class="copy">©2023 Simontal</div>
                <div class="circle"></div>
            </div>
            <div class="content-two">
                <img src="{{ asset('assets/images/vector-intro.png') }}" class="vector">
            </div>
        </div>
    </div>
</body>

</html>