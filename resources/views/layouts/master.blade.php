<!DOCTYPE html>
<html>

<head> <!--indicazioni per il browser -->
    <meta charset="utf-8" />
    <title>@yield('titolo')</title>  
    <meta name="viewport" content="width=device-width, initial scale=1.0, user-scalable=no">      <!-- per rendere responsive, user-scalable=no non permette lo zoom dell utente da mobile-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{url('/')}}/css/bootstrap.min.css">    <!-- .min indica che il file non è indentato, meno spazio occupato-->
    <link rel="stylesheet" href="{{url('/')}}/css/@yield('stile')">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">  <!-- per icone internazionalizzazione -->    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>  <!-- galleria foto-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />   <!--mappa-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <script src="{{url('/')}}/js/bootstrap.bundle.min.js"></script>      <!-- Javascript -->
    <script src="{{url('/')}}/js/myScript.js"></script>
    <script src="http://code.jquery.com/jquery.js"></script>             <!-- prende la LIBRERIA JQUERY da quel sito-->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>  <!-- carousel foto-->
    <script src="https://kit.fontawesome.com/05e7f5a039.js" crossorigin="anonymous"></script> <!-- icone info -->
</head>

<body>
    <header class="header">
        <div class="header__content">
            <a class="header__logo navbar-brand" href="{{route('home')}}"></a>
            <ul class="header__menu">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('escursione.index')}}">Lista escursioni</a></li>
                <li><a href="{{route('difficoltà')}}">Tabella difficoltà</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="{{route('mappa')}}">Mappa</a></li>
                <li><a href="#footer" onclick="event.preventDefault();showContacts();">Contatti</a></li>
            </ul>
            <div class="header__quick">
                @if($logged)
                    <i class="bi bi-person-fill">&nbsp;{{$loggedName}}</i> <a class="button" href="{{route('user.logout')}}">Logout&nbsp;<i class="bi-box-arrow-left"></i></a> 
                @else
                    <a class="button" href="{{route('user.login')}}"><i class="bi bi-door-open-fill"></i> &nbsp;Login</a>
                @endif
                <div class="icon-hamburger">
                    <span></span>
                    <span></span>
                </div>
            </div>
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
                    <li>email: info@escursionicamune.it</li>
                    <li>Tel. + 39 335 622 5789</li>
                </ul>
            </div>
            <div class="col-25 reveal">
                <h3> Menu</h3>
                <ul>
                    <li><a style="color:white" href="{{route('home')}}">Home</a></li>
                    <li><a style="color:white" href="{{route('escursione.index')}}">Lista escursioni</a></li>
                    <li><a style="color:white" href="{{route('difficoltà')}}">Tabella difficoltà</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>