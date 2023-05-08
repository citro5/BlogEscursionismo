@extends('layouts.master')

@section('titolo')
Rimuovi escursione dalla lista
@endsection

@section('stile', 'style.css')

@section('left_navbar')
<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
</li>
<li class="nav-item ">
    <a class="nav-link current" href="{{route('escursione.index')}}">Lista escursioni</a>
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
        <li class="breadcrumb-item"><a href="{{route('escursione.index')}}">Lista escursioni</a></li>
        <li class="breadcrumb-item">Delete</li>
    </ol>
</nav>
@endsection

@section('corpo')
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Accesso negato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Qualcosa di <strong>errato</strong> è accaduto durante la procedura di eliminazione?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" href="{{ route('escursione.index') }}" data-dismiss="modal"> <i class="bi-box-arrow-left"></i>Torna alla lista delle escursioni</button>
      </div>
    </div>
  </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="card text-center border-danger">
            <div class='card-header'>
                Accesso negato
            </div>
            <div class='card-body text-danger'>
                <p>Qualcosa di <strong>errato</strong> è successo durante la procedura di cancellazione. Potrebbe essere l'id dell'escursione errato?</p>
                <p><a class="btn btn-secondary" href="{{ route('escursione.index') }}"><i class="bi-box-arrow-left"></i> Torna alla lista delle escursioni</a></p>
            </div>
        </div>
    </div>
</div>
@endsection