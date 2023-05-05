@extends('layouts.master')

@section('titolo', 'Escursioni Camune')

@section('stile')
style.css
@endsection

@section('left-navbar')
<li class="nav-item">
    <a class="nav-link active current" aria-current="page" href="{{route('home')}}">Home</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="{{route('escursione.index')}}">Lista escursioni</a>
  <!--  <ul class="dropdown-menu">
    <li><a class="dropdown-item " href="{{route('escursione.index')}}"></a>Tipologia</li>
    <li><a class="dropdown-item " href="">Ordina per difficoltà</a></li>
    <li><a class="dropdown-item " href="">Ordina per altitudine</a></li>
      </ul>   -->
</li>
<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="">Blog</a>
</li>
<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="">Mappa</a>
</li>
<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="">Contatti</a>
</li>
@endsection

@section('corpo')

<div style= "background:url(../img/pizzobadile.jpg) center" class="bg-cover text-white ">
    <div class="container py-5 text-center">
        <h1 class="display-4 font-weight-bold">Escursioni Camune</h1>
        <p class="font-italic mb-0">Escursioni in Valle Camonica e oltre</p>
        <a href="{{route('escursione.index')}}" role="button" class="btn btn-primary px-5">Leggi tutte le escursioni</a>
    </div>
</div>

<div class="container py-5">
    <h2 class="h3 font-weight-bold">Chi siamo</h2>
    <div class="row">
        <div class="col-lg-10 mb-4">
            <p class="font-italic text-muted">Questo blog non è una guida precisa e dettagliata delle nostre uscite; al contrario esprime il desiderio di condividere, nel modo più sincero possibile, le nostre esperienze accumulate in questi anni di avventure!</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-9 col-md-6"> <!-- assegna 9 colonne a schermi small e 6 a schermi medium-->
        <p>
        In questo lavoro sono state raccolte le descrizioni sintetiche di alcune delle tante escursioni e dei molteplici itinerari che il nostro territorio ci offre, e che ho avuto il piacere di fare con gli amici o da solo. La maggior parte di questi itinerari hanno difficoltà escursionistica ed alcuni addirittura turistica, quindi sono adatti a tutti quelli che hanno un minimo di allenamento. Le escursioni sono state inserite in un elenco generale, con riferimento alla suddivisione settoriale della lunga (90 km) Vallecamonica, e quindi in relazione ai paesi principali e/o zone limitrofe che bisogna raggiungere per iniziare la camminata; inoltre sono state anche  raggruppate in due parti distinte: sotto i 2000 m e sopra i 2000 m di altitudine ed elencate in ordine di quota crescente; In tal modo è più veloce la consultazione e/o la scelta del percorso o del sentiero da fare, in relazione alla zona da raggiungere, alla stagione climatica e alle esigenze personali. Quasi tutti gli itinerari descritti sono corredati da una mappa e da alcune foto esclusivamente scattate dal sottoscritto e/o da amici, ed abbastanza recenti in quanto effettuate a partire dall’estate 2012. In particolare si evidenzia la bellissima escursione ad anello “ il giro dei 4 bivacchi”, che ripercorre alcuni sentieri dei Lupi di San Glisente di Esine e che tocca ben 4 bivacchi compreso il nuovo bivacco “Lupi di San Glisente”, inaugurato nel mese di ottobre 2015.
Nelle schede relative ai percorsi si è evidenziato il luogo di partenza e di arrivo, con i relativi tempi di percorrenza, i dislivelli, le difficoltà e la data della gita.  Di grandissimo aiuto, nella scelta di tante mete e degli itinerari da effettuare, oltre a Internet, sono state le belle e svariate guide e pubblicazioni relative alle nostre montagne, reperibili nelle migliori librerie locali. E’ ovvio che ancora sono tante le escursioni e le gite da fare, e che piano piano, spero, andranno ad arricchire questa raccolta di percorsi dedicata agli Escursionisti e agli amanti della montagna. I vari itinerari sono consultabili con un browser e sono corredati da alcune foto e da estratti di mappe con evidenziati i sentieri della zona interessata, facilitando così la visione dettagliata dei vari percorsi. E’ sempre comunque consigliato avere appresso la mappa o cartina originale: la Carta funziona sempre, non deve agganciarsi al 3G o avere bel tempo per arrivare al satellite.  Non dotarsi di mappe è una scelta che priva di fascino e di sapere profondo!
        </p>
    </div>
    <div class="col-sm-3 col-md-6">                  <!-- assegna 3 colonne all immagine su dispositivi small e 6 a medium-->
        <img class="img-thumbnail img-responsive" src="img/IMG-20190828-WA0125.jpg">      <!-- thumbnail: ridimensiona al ridimensionamento dello schermo, rounded: angoli arrotondati-->
    </div>
</div>
@endsection