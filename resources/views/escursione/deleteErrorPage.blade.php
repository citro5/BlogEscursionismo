@extends('layouts.master')

@section('titolo')
Rimuovi escursione dalla lista
@endsection

@section('stile', 'style.css')


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
<div class="grid">
    <div class="col-md-12">
        <div id="delete-card" class="card text-center border-danger">
            <div class='card-header'>
                Accesso negato
            </div>
            <div class='card-body text-danger'>
                <p>Qualcosa di <strong>errato</strong> è accaduto durante la procedura di cancellazione. Potrebbe essere l'id dell'escursione errato?</p>
                <p><a class="btn btn-secondary" href="{{ route('escursione.index') }}"><i class="bi-box-arrow-left"></i> Torna alla lista delle escursioni</a></p>
            </div>
        </div>
    </div>
</div>
@endsection