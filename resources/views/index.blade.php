@extends('layouts.master')

@section('titolo', 'Escursioni Camune')

@section('stile')
style.css
@endsection

@section('left-navbar')
<ul class="header__menu text-center">
    <li><a href="{{route('home')}}">Home</a></li>
    <li><a href="{{route('escursione.index')}}">Lista escursioni</a></li>
    <li><a href="#">Blog</a></li>
    <li><a href="#">Mappa</a></li>
    <li><a href="#">Contatti</a></li>
</ul>
<div class="header__quick">
    <a href="#" class="button-small">Login</a>
    <div class="icon-hamburger">
        <span></span>
        <span></span>                        <!-- crea righe icona menu--> 
    </div>
</div>
@endsection

@section('corpo')

    <div class="cover"
        style="background-image:linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.6)), url('{{url('/')}}/img/20210612_125717.jpg');">
        <div class="cover__content reveal">
            <h1> Escursioni camune</h1>
            <h2> Escursioni in Valle Camonica e oltre </h2>
            <a href="{{route('escursione.index')}}" role="button" class="button">Vai alle escursioni</a>
        </div>
    </div>
    <div class="spacer"></div>


    <div class="grid pt-4">
        <div class="col-50 reveal">
            <h2>Chi siamo</h2>
            <p>In questo lavoro sono state raccolte le descrizioni sintetiche di alcune delle tante escursioni e dei molteplici itinerari che il nostro territorio ci offre, e che ho avuto il piacere di fare con gli amici o da solo. La maggior parte di questi itinerari hanno difficoltà escursionistica ed alcuni addirittura turistica, quindi sono adatti a tutti quelli che hanno un minimo di allenamento. Le escursioni sono state inserite in un elenco generale, con riferimento alla suddivisione settoriale della lunga (90 km) Vallecamonica, e quindi in relazione ai paesi principali e/o zone limitrofe che bisogna raggiungere per iniziare la camminata; inoltre sono state anche  raggruppate in due parti distinte: sotto i 2000 m e sopra i 2000 m di altitudine ed elencate in ordine di quota crescente; In tal modo è più veloce la consultazione e/o la scelta del percorso o del sentiero da fare, in relazione alla zona da raggiungere, alla stagione climatica e alle esigenze personali. Quasi tutti gli itinerari descritti sono corredati da una mappa e da alcune foto esclusivamente scattate dal sottoscritto e/o da amici, ed abbastanza recenti in quanto effettuate a partire dall’estate 2012. 
Nelle schede relative ai percorsi si è evidenziato il luogo di partenza e di arrivo, con i relativi tempi di percorrenza, i dislivelli, le difficoltà e la data della gita. E’ ovvio che ancora sono tante le escursioni e le gite da fare, e che piano piano, spero, andranno ad arricchire questa raccolta di percorsi dedicata agli Escursionisti e agli amanti della montagna. I vari itinerari sono consultabili con un browser e sono corredati da alcune foto e da estratti di mappe con evidenziati i sentieri della zona interessata, facilitando così la visione dettagliata dei vari percorsi. E’ sempre comunque consigliato avere appresso la mappa o cartina originale: la Carta funziona sempre, non deve agganciarsi al 3G o avere bel tempo per arrivare al satellite.  Non dotarsi di mappe è una scelta che priva di fascino e di sapere profondo!</p>
        </div>
        <div class="col-50">
            <div class="cover reveal"
                style="background-image:linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.6)), url('{{url('/')}}/img/IMG-20190828-WA0125.jpg');">
                <div class="cover__content">

                </div>
            </div>
        </div>
    </div>

    <div class="grid pt-4 pb-4 mb-4 text-center grey-background">
    <div class="col-12 padding-leftright-null padding-bottom-null text text-center">
        <h2 class="title line center reveal">ATTIVITÁ TRATTATE</h2>
    </div>
        <div class="col-33 text-center reveal">
            <h3 class="margin-bottom-extrasmall ">Escursionismo</h3>
            <img src="{{URL::asset('/img/trekking.jpg')}}" class="img-small round mb-2 " alt="">
            <p class="margin-bottom-null ">Trekking di varia difficoltà e lunghezza su strade e sentieri, solitamente da svolgersi in giornata.</p>
        </div>
        <div class="col-33 text-center reveal">
        <h3 class="margin-bottom-extrasmall ">Alpinismo</h3>
            <img src="{{URL::asset('/img/alpinismo.jpg')}}" class="img-small round mb-2 " alt="">
            <p class="margin-bottom-null">Ascesa di cime su vie alpinistiche (roccia, neve, ghiaccio) che richiedono preparazione e tecnica.</p>
        </div>
        <div class="col-33 text-center reveal">
        <h3 class="margin-bottom-extrasmall">Vie ferrate</h3>
            <img src="{{URL::asset('/img/ferrata.jpg')}}" class="img-small round mb-2 " alt="">
            <p class="margin-bottom-null">Escursioni che prevedono tratti di sentiero attrezzato su pareti rocciose.</p>
        </div>
    </div>

    <script> /* js code */</script>
    <script>
        let item = document.querySelector('.icon-hamburger');
        item.addEventListener("click", function () {
            document.body.classList.toggle('menu-open');
        });

        ScrollReveal().reveal('.reveal', {distance: '100px', duration: 1500, easing: 'cubic-bezier(.215, .61, .355, 1)',interval: 600  });
    </script>
</body>
@endsection
