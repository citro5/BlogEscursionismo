@extends('layouts.master')

@section('titolo')
Rimuovere l'escursione "{{ $excursion->titolo }}"?
@endsection

@section('stile', 'style.css')

@section('left-navbar')
<ul class="header__menu">
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
        <span></span>
    </div>
</div>
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('escursione.index')}}">Lista escursioni</a></li>
        <li class="breadcrumb-item">Elimina</li>
    </ol>
</nav>
@endsection

@section('corpo')
<div class="grid mb-4">
    <div class="col-md-6">
        <div class="card text-center border-secondary">
            <div class='card-header'>
                Torna indietro
            </div>
            <div class='card-body'>
                <p>L'escursione <strong>non sarà rimossa</strong> dalla lista</p>
                <p><a class="btn btn-secondary" href="{{ route('escursione.index') }}"><i class="bi-box-arrow-left"></i> Back</a></p>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card text-center border-danger">
            <div class='card-header'>
                Conferma la cancellazione
            </div>
            <div class='card-body'>
                <p>L'escursione <strong>sarà rimossa</strong> dalla lista</p>
                <p><a class="btn btn-danger" href="{{ route('escursione.destroy', ['id' => $excursion->id]) }}"><i class="bi-trash3"></i> Remove</a></p>
            </div>
        </div>
    </div>
</div>
@endsection