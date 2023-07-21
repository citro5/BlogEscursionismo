@extends('layouts.master')

@section('titolo', 'Escursioni Camune')

@section('stile')
style.css
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
            <h2>Chi sono</h2>
            <p>Sono un ragazzo di 23 anni, abito in un piccolo paesino della Vallecamonica e fin da piccolo sono cresciuto con la passione della montagna. In questo lavoro vengono raccolte le descrizioni sintetiche di alcune delle tante escursioni e dei molteplici itinerari che il nostro territorio ci offre. La maggior parte di questi itinerari hanno difficoltà escursionistica ed alcuni addirittura turistica, quindi sono adatti a tutti quelli che hanno un minimo di allenamento. Le escursioni sono state inserite in un elenco generale, con la possibilità di suddividerle in base alla tipologia(escursionismo, alpinismo, via ferrata) e con la possibilità di ordinarle in base ad altitudine, nome o data di caricamento.
            L'utente una volta registrato può inserire una nuova escursione a cui possono essere associate varie informazioni come l'altitudine, la difficoltà, il tempo di percorrenza e alcune immagini dell'escursione. Inoltre l'utente registrato può apportare dei commenti a tutte le escursioni presenti nel sito. L'utente non registrato(visitatore) può semplicemente visualizzare le escursioni e tutte le informazioni associate ad esse. All'interno di ogni escursione è presente una sua descrizione, la scheda tecnica che contiene informazioni come difficoltà, tipologia, tempo di percorrenza e gruppo montuoso di appartenenza, le immagini dell'escursione e infine i commenti apportati dagli utenti.
            <br>L'idea che circonda questo progetto è di dare la possibilità agli utenti di creare una raccolta personale delle proprie escursioni e allo stesso tempo condividerle con gli altri utenti in modo da diffondere le proprie esperienze e conoscenze per cercare di arricchire questa raccolta di percorsi dedicata a chi come me è un escursionista ma soprattutto un amante della montagna. </p>
        </div>
        <div class="col-50">
            <div class="cover reveal"
                style="background-image:linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.6)), url('{{url('/')}}/img/IMG-20190828-WA0125.jpg');">
                <div class="cover__content"></div>
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

    <script>
        ScrollReveal().reveal('.reveal', {distance: '100px', duration: 1500, easing: 'cubic-bezier(.215, .61, .355, 1)',interval: 600  });
    </script>
</body>
@endsection
