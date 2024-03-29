@extends('layouts.master') 

@section('titolo')
Dettagli escursione
@endsection

@section('stile','style.css') 

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('escursione.index')}}">Lista escursioni</a></li>
    <li class="breadcrumb-item active" aria-current="page">Dettagli</li>
  </ol>
</nav>
@endsection

@section('corpo')
<div class="escursione">
  <div class="escursione-titolo">
    <h1>{{$excursion->titolo}}</h1>
  </div>
@if($excursion-> user-> name == $loggedName)
  <div class="grid grid--center">
    <a class="button-modify mt-3 mr-1"  href="{{ route('escursione.edit', ['id' => $excursion->id]) }}"><i class="bi-pencil-square"></i>Modifica</a>   <!-- btn blu-->
    <a class="button-delete mt-3" data-toggle="modal" data-target="#exampleModalCenter" href="{{ route('escursione.destroy.confirm', ['id' => $excursion->id]) }}"><i class="bi-trash3"></i>Elimina</a>  <!-- btn rosso-->
  </div>
@endif
  <div class="escursione-descrizione">
    <h3 class="title">Descrizione</h3>
    <p>{{$excursion -> descrizione}}</p>
  </div>

  <div class="row margin-leftright-null grey-background">
  <div class="container">
    <div class="col-md-12 pb-0 text-center">
        <h2 class="mb-4 title line center">Scheda tecnica</h2>
    </div>
    <div class="text trek-data text-center">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-4">
              <i class="bi bi-calendar4-week service big margin-bottom-null"></i><em>Data</em>
                <h3>{{$excursion -> data}}</h3>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-4"><i
                    class="fas fa-map-pin service big margin-bottom-null"></i><em>Altitudine max</em>
                <h3>{{$excursion -> altitudine}}</h3>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4">
            <i class="fas fa-mountain service big margin-bottom-null"></i><em>Gruppo Montuoso</em>
                <h3>{{$excursion -> gruppoMontuoso->nome}}</h3>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4">
            <i class="fa-sharp fa-solid fa-person-hiking service big margin-bottom-null"></i><em>Tipologia</em>
                <h3>{{$excursion -> tipologia->nome}}</h3>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4">
            <i class="fas fa-shoe-prints service big margin-bottom-null"></i><em>Difficoltà</em>
                <h3>{{$excursion -> difficoltà}}</h3>
                <a class="small" style="font-style:italic"
                    href="/difficoltà">(Vai a legenda)</a>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4"><i class="bi bi-watch service big margin-bottom-null"></i>
                  <em>Tempo</em>
                <h3>{{$excursion -> tempistica}}</h3>
            </div>
        </div>
    </div>
  </div>
  </div>
</div>
  
  <div class="gallery">
    <h1 class="mb-4 title line center">Gallery</h1>
    <h3>Clicca su un immagine per aprire la galleria</h3>
    @foreach ($images as $image)
      <a href="{{asset('storage'.$image->path)}}" data-fancybox="gallery">
      <img src="{{asset('storage'.$image->path)}}" alt="Immagine 1">
    @endforeach
      </a>
  </div>

  <div style="margin-left:70px; margin-right:70px; margin-top:30px">
  @if($logged == true)
    <h3>Aggiungi un commento:</h3>
    <form class="comment-form" id="recensioneForm" method="POST" action="{{ route('escursione.commento') }}">
      @csrf
      <input type="hidden" name="escursione_id" value="{{ $excursion->id }}">
      <textarea id="commento" name="commento" placeholder="Inserisci il tuo commento"></textarea>
      <button id="btn" type="submit" disabled>Invia</button>
    </form>
  @endif
<!-- Mostra i commenti precedenti -->
<h3>Commenti:</h3>
@if(count($comments) == 0)
  <p>Nessun commento inserito</p>
@endif
@foreach ($comments as $comments)
@if($comments-> autore == $loggedName)
  <div class="comment" >
    <div class="author">{{ $comments->autore }}</div>
    <div class="date">{{ $comments->data }}</div>
    <div class="content">{{ $comments->contenuto }}</div>
    <div class="actions">
    <form action="{{ route('escursione.removeComment', ['id' => $comments->id]) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Elimina</button>
  </form>
    </div>
  </div>
@else
  <div class="comment" style= "background-color: #f5f5f5">
    <div class="author">{{ $comments->autore }}</div>
    <div class="date">{{ $comments->data }}</div>
    <div class="content">{{ $comments->contenuto }}</div>
    <div class="actions">
      <!-- Aggiungi qui eventuali pulsanti o azioni per i commenti -->
    </div>
  </div>
  @endif

@endforeach
</div>
<script>
  Fancybox.bind('[data-fancybox="gallery"]', {
      Carousel : {
        infinite: false
      }
    });  
</script>

<script>
  // Seleziona il campo textarea e il pulsante di submit del form di commento
  var commentField = document.getElementById('commento');
  var submitButton = document.getElementById('btn');
  commentField.addEventListener('input', function() {
    if (commentField.value.trim() === '') {
      submitButton.disabled = true;     // Disabilita il pulsante di submit se il campo è vuoto
    } else {
      submitButton.disabled = false;      // Abilita il pulsante di submit se il campo non è vuoto
    }
  });
</script>
</div>       
@endsection


