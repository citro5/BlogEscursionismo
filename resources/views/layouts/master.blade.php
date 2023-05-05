<!DOCTYPE html>
<html>

<head> <!--indicazioni per il browser -->
    <meta charset="utf-8" />
    <title>@yield('titolo')</title>  
    <meta name="viewport" content="width=device-width, initial scale=1.0, user-scalable=no">      <!-- per rendere responsive, user-scalable=no non permette lo zoom dell utente-->
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{url('/')}}/css/bootstrap.min.css">    <!-- .min indica che il file non è indentato, meno spazio occupato-->
    <link rel="stylesheet" href="{{url('/')}}/css/@yield('stile')">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">  <!-- per icone internazionalizzazione -->    
    <script src="{{url('/')}}/js/bootstrap.bundle.min.js"></script>      <!-- Javascript -->
    <script src="http://code.jquery.com/jquery.js"></script>             <!-- prende la LIBRERIA JQUERY da quel sito-->
</head>


<body>
<nav class="navbar bg-primary navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
           
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">     <!--Il button viene visto solo quando lo schermo si rimpicciolisce come ad esempio su smartphone-->
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">           <!-- collapse indica il menù che collassa quando lo schiacci-->
                <ul class="navbar-nav">
                    @yield('left-navbar')
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('breadcrumb')
    </div>   

    <div class="container">
        <header class="header-sezione"> <!-- classe CSS-->
            <h1>@yield('titolo')</h1>
        </header>
    </div>

    <div class="container">
       @yield('corpo')
    </div>
</body>

</html>