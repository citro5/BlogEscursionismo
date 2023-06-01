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
    <h1 class="mb-5 title" ><span>Lista delle escursioni</span></h1>
</div>
@if($logged == true)
<div class="grid grid--center">
    <div>   
        <a id= "buttonNew" href="{{route('escursione.create')}}" class="btn btn-success">Crea una nuova escursione</a> <!--btn:bottone, btn-success: bottone verde-->
    </div>
</div>
@endif
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


<div class="grid">
    <div class="col-100">  <!--potrei non metterlo perche 12-->
        <table class="table table-responsive table-stripped table-hover">   <!--table: classe di bootstrap-->
            <col width="50%">   <!--prima colonna-->
            <col width="30%">   <!--seconda colonna-->
            <col width="10%">
            <col width="10%">
                <thead>
                    <tr>
                        <th>Titolo</th>
                        <th>Data</th>
                        <th>Tipologia</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($excursions_list as $excursion)                      <!--cicla sui libri contenuti in books_list-->
                    <tr>
                        <td>{{ $excursion->titolo }}</td>
                        <td>{{ $excursion->data }}</td>
                        <td>{{ $excursion->tipologia->nome }}</td>
                        @if($logged == true)
                        <td>
                            <a class="btn btn-primary"  href="{{ route('escursione.edit', ['id' => $excursion->id]) }}"><i class="bi-pencil-square"></i>Edit</a>   <!-- btn blu-->
                        </td>
                        <td>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" href="{{ route('escursione.destroy.confirm', ['id' => $excursion->id]) }}"><i class="bi-trash3"></i>Delete</a>  <!-- btn rosso-->
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    
                </tbody>
        </table>
    </div>
</div>
<script>
$(document).ready(function() {
  $('.card').click(function() {
    // Azione da eseguire al clic sulla card
    window.location.href = '{{ route("escursione.info", ":id") }}'.replace(':id', escursioneId); // Sostituisci 'nuova-vista.html' con l'URL desiderato
  });
});
</script>
@endsection
