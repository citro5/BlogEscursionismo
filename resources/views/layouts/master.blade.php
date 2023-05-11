<!DOCTYPE html>
<html>

<head> <!--indicazioni per il browser -->
    <meta charset="utf-8" />
    <title>@yield('titolo')</title>  
    <meta name="viewport" content="width=device-width, initial scale=1.0, user-scalable=no">      <!-- per rendere responsive, user-scalable=no non permette lo zoom dell utente-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{url('/')}}/css/bootstrap.min.css">    <!-- .min indica che il file non è indentato, meno spazio occupato-->
    <link rel="stylesheet" href="{{url('/')}}/css/@yield('stile')">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">  <!-- per icone internazionalizzazione -->    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <script src="{{url('/')}}/js/bootstrap.bundle.min.js"></script>      <!-- Javascript -->
    <script src="http://code.jquery.com/jquery.js"></script>             <!-- prende la LIBRERIA JQUERY da quel sito-->
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
</head>

<body>
    <header class="header">
        <div class="header__content">
            <a class="header__logo navbar-brand" href="{{route('home')}}"></a>
            @yield('left-navbar')
        </div>
    </header>

    <div class="container">
        @yield('breadcrumb')
    </div>   
    
    @yield('corpo')
    
    <footer class="footer col-100">
        <div class="grid">
            <div class="col-50 reveal">
                <h3>Escursioni camune</h3>
                <p>Solo per veri appassionati di montagna</p>
            </div>
            <div class="col-25 reveal">
                <h3> Contatti</h3>
                <ul>
                    <li>mail: mattia.citroni00@gmail.com</li>
                    <li>335 622 5789</li>
                </ul>
            </div>
            <div class="col-25 reveal">
                <h3> Menu</h3>
                <ul>
                    <li>Link</li>
                    <li>Link</li>
                </ul>
            </div>
        </div>
    </footer>
</body>


</html>