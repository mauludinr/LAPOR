<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lapor: Daftar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="css/page/guest.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/semantic.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/semantic.js"></script>
    <script src="js/anime.min.js"></script>
</head>

<body class="background">
    <!-- Menu bar item -->
    <div class="ui top fixed menu">
        <div class="item logo" href="#">
            Lapor.
        </div>
        <div class="right menu">
            <a class="item" href="#">Tentang</a>
            <a class="item" href="/login">
                <div class="ui button menubar">Masuk</div>
            </a>
        </div>
    </div>

    <div class="ui two column centered stackable grid" id="section-container">
        <div class="ui nine wide centered column section left" id="section-left">
            <div class="column">
                <i class="inverted newspaper huge icon"></i>
                <div>
                    <h3 class="heading">Satu langkah lagi <br> untuk memulai.</h3>
                </div>
                <div>
                    <p class="subheading">
                        Hanya perlu mengisi form berikut
                    </p>
                </div>
            </div>
        </div>
        <div class="seven wide column" id="main-container">
            <div class="section basic">
                <div class="content">                

                    @if($errors->has('nik'))
                    <script>alert('test')</script>                        
                    @endif
                    @if($errors->has('email'))
                        {{ $errors->first('email') }}
                    @endif

                    <form action="/register" class="ui form" id="formlogin" method="POST">

                        @csrf

                        <div class="field">
                            <label class="label form">
                                NAMA LENGKAP
                            </label>
                            <input type="text" name="name" id="name" value="{{ Request::old('name') }}">
                            <div class="ripple form" target="name"></div>
                        </div>
                        <div class="field">
                            <label class="label form">
                                NIK
                            </label>
                            <input type="text" name="nik" id="nik" value="{{ Request::old('nik') }}">
                            <div class="ripple form" target="NIK"></div>
                        </div>
                        <div class="field">
                            <label class="label form">
                                PASSWORD
                            </label>
                            <input type="password" name="password" id="password">
                            <div class="ripple form" target="password"></div>
                        </div>
                        <div class="field">
                            <label class="label form">
                                EMAIL
                            </label>
                            <input type="email" name="email" id="email" value="{{ Request::old('email') }}">
                            <div class="ripple form" target="email"></div>
                        </div>
                        <button class="ui fluid button form" type="submit">DAFTAR</button>
                        <p class="label form center emphasis">sudah punya akun, masuk <a href="/login">di sini</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="js/page/daftar.js"></script>


</html>
