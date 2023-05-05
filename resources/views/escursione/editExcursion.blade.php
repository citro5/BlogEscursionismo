@extends('layouts.master')  <!--extends parte da 'resources/views' -->

@section('titolo','Aggiungi escursione')

@section('stile')
style.css
@endsection

@section('left-navbar')
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
    <li class="breadcrumb-item active" aria-current="page">Aggiungi</li>
  </ol>
</nav>
@endsection

@section('corpo')
<div class='row'>
        <form method="post" action="{{route('escursione.store')}}">
        @csrf
        <div class="form-group">  
            <label for="title"> Titolo</label>
            <input class="form-control" type="text" id="title" name="title" placeholder="Titolo" required> 
        </div>
        
        <div class="form-group">
            <label for="author">Tipologia</label>
            <select class="form-select" id="tipology_id" name="tipology_id">
                @foreach($tipology_list as $tipology)
                    <option value="{{ $tipology->id }}"> {{$tipology->nome}}</option>
                @endforeach
            </select>
        </div> 
        
        <div class="form-group">
            <label for="author">Gruppo montuoso</label>
            <select class="form-select" id="group_id" name="group_id">
                @foreach($group_list as $group)
                    <option value="{{ $group->id }}"> {{$group->nome}}</option>
                @endforeach
            </select>
        </div> 
        <div class="form-group">    
        <label>Data
                <input class="form-control" type="datetime" name="data" required pattern="\d{4}-\d{2}-\d{2}">
                    <small id="passwordHelpInline" class="text-muted">
                        Formato accettato: YYYY-MM-DD o YYYY/MM/DD
                    </small>
        </label>
        </div>
        <div class="form-group">
            <label>Altitudine
                <input class="form-control" type="text" name="altitudine" required>
            </label>
        </div>
        <div class="form-group">
            <label>Tempistica
                <input class="form-control" type="time" name="tempistica">
            </label>
        </div>
        <!--<div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="btn custom-file-label" for="customFile">Scegli foto</label>
        </div> -->
        
        <a class="btn btn-secondary" href="{{route('escursione.index')}}">Cancel</a>
        <input class="btn btn-primary" type="submit" value="Create">

    </form>
</div>
@endsection