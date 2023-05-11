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
<div class="grid">
    <div class="col-100">   
        <a href="{{route('escursione.create')}}" class="btn btn-success">Crea una nuova escursione</a> <!--btn:bottone, btn-success: bottone verde-->
    </div>
</div>

<section class="cards clearfix">
@foreach($excursions_list as $excursion)
    <div class="card">
        <div class="card__img" style="background-image: url('http://afmarchetti.github.io/alux/image.jpg');"></div>
        <div class="card_copy">
        <h3> {{$excursion->titolo }}</h3>
        <h4> {{ $excursion->tipologia->nome }}</h4>
        <h4> {{$excursion->gruppoMontuoso->nome }}</h4>
        <h4> {{$excursion->altitudine }} mt</h4>
    </div>
    </div> 
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
                        <td>
                            <a class="btn btn-primary"  href="{{ route('escursione.edit', ['escursione' => $excursion->id]) }}"><i class="bi-pencil-square"></i>Edit</a>   <!-- btn blu-->
                        </td>
                        <td>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" href="{{ route('escursione.destroy.confirm', ['id' => $excursion->id]) }}"><i class="bi-trash3"></i>Delete</a>  <!-- btn rosso-->
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
        </table>
    </div>
</div>
@endsection