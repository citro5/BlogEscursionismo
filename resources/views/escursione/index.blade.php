@extends('layouts.master')  <!--extends parte da 'resources/views' -->

@section('titolo','Lista escursioni')

@section('stile')
style.css
@endsection

@section('left-navbar')
<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
</li>
<li class="nav-item">
    <a class="nav-link active current" href="{{route('escursione.index')}}">Lista escursioni</a>
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

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Lista escursioni</li>
  </ol>
</nav>
@endsection

@section('corpo')
<div class="row">
    <div class="col-xs-6">   
        <a href="{{route('escursione.create')}}" class="btn btn-success">Crea una nuova escursione</a> <!--btn:bottone, btn-success: bottone verde-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">  <!--potrei non metterlo perche 12-->
        <table class="table table-responsive table-stripped table-hover">   <!--table: classe di bootstrap-->
            <col width="50%">   <!--prima colonna-->
            <col width="30%">   <!--seconda colonna-->
            <col width="10%">
            <col width="10%">
                <thead>
                    <tr>
                        <th>Titolo</th>
                        <th>Data</th>
                        <th>difficoltà</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($excursions_list as $excursion)                      <!--cicla sui libri contenuti in books_list-->
                    <tr>
                        <td>{{ $excursion->titolo }}</td>
                        <td></td>
                        <td>
                            <a class="btn btn-primary" href="#">Edit</a>   <!-- btn blu-->
                        </td>
                        <td>
                            <a class="btn btn-danger" href="#">Delete</a>  <!-- btn rosso-->
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
        </table>
    </div>
</div>
@endsection