@extends('layouts.master')  <!--extends parte da 'resources/views' -->

@section('titolo','Lista escursioni')

@section('stile')
style.css
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Lista escursioni</li>
  </ol>
</nav>
@endsection

@section('corpo')
<div class="container text text-center mt-2">
    <h1 class="mb-4 title" ><span>Lista delle escursioni</span></h1>
</div>
@if($logged == true)
<div class="grid grid--center">
    <div>   
        <a id= "buttonNew" href="{{route('escursione.create')}}" class="btn btn-success">Crea una nuova escursione</a> <!--btn:bottone, btn-success: bottone verde-->
    </div>
</div>
@endif
<div class="custom-select">
    <span class="label">Ordina</span>
<select id="sortingSelect">
    @if(!isset($order) || $order == "id" )
        <option value="id" selected>Più recenti </option>
        <option value="titolo">Titolo</option>
        <option value="altitudine">Altitudine</option>
     @elseif($order == 'titolo')
        <option value="id">Più recenti </option>
        <option value="titolo" selected>Titolo</option>
        <option value="altitudine">Altitudine</option>
    @else
        <option value="id">Più recenti </option>
        <option value="titolo">Titolo</option>
        <option value="altitudine" selected>Altitudine</option>  
    @endif
</select>
</div>
<section class="cards clearfix">
    @foreach($excursions_list as $excursion)
        <a class="card"  href="{{ route('escursione.info', ['id' => $excursion->id])}}">
        @php
        $breakLoop = false;
        @endphp
        @foreach ($images as $image)
            @if($image->escursione_id == $excursion->id)
                <img class="card__img " src="{{asset('storage'.$image->path)}}">
                @php
                    $breakLoop=true;
                @endphp
                @break
            @endif
        @endforeach
        @if($breakLoop == false)
            <div class="card__img placeholder-image">NESSUNA IMMAGINE INSERITA</div>
        @endif
        
    <div class="card_copy">
            <h3> {{$excursion->titolo }}</h3>
            <h4> <b>Tipologia:</b> {{ $excursion->tipologia->nome }}</h4>
            <h4> <b>Gruppo Montuoso:</b> {{$excursion->gruppoMontuoso->nome }}</h4>
            <h4> <b>Altitudine:</b> {{$excursion->altitudine }} mt</h4>
            <br></br>
            <p> <b>Creato da:</b> {{ $excursion -> user -> name}} </p>
        </div>           
        </a>
    @endforeach 
</section>

<script>
// Gestire l'evento di selezione
document.getElementById("sortingSelect").addEventListener("change", function() {
  var selectedOption = this.value
  // Effettua una chiamata AJAX al tuo modello per ottenere le escursioni ordinate
  $.ajax({
    url: '/escursione/order',
    method: 'GET',
    data: { sortBy: selectedOption },
    success: function(response) {
        var newDocument = document.open('text/html', 'replace');
        newDocument.write(response);
        newDocument.close();
    },
    error: function() {
      console.log("Si è verificato un errore durante la chiamata AJAX");
    }
  });
});
</script>
@endsection
