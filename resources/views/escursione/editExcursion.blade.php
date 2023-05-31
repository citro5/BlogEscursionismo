@extends('layouts.master')  <!--extends parte da 'resources/views' -->

@section('titolo')
@if(isset($excursion->id))
    Modifica escursione
@else
    Aggiungi escursione
@endif
@endsection

@section('stile','style.css')


@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('escursione.index')}}">Lista escursioni</a></li>
        @if(isset($excursion->id))
            <li class="breadcrumb-item">Modifica</li>
        @else
            <li class="breadcrumb-item">Crea</li>
        @endif
    </ol>
</nav>
@endsection

@section('corpo')
<div class='grid mb-2'>
    <div class='col-12'>
        @if(isset($excursion->id))
        <form class="form-horizontal" name="excursion" method="post" action="{{ route('escursione.update', ['id' => $excursion->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @else
        <form class="form-horizontal" name="excursion" method="post" action="{{ route('escursione.store') }}" enctype="multipart/form-data">
        @endif
        @csrf
        <div class="form-group">  
            <label for="title"> Titolo</label>
            @if(isset($excursion->id))
                <input class="form-control" type="text" id="titolo" name="titolo" placeholder="Titolo" value="{{ $excursion->titolo }}" required>
            @else
                <input class="form-control" type="text" id="titolo" name="titolo" placeholder="Titolo" required>
            @endif 
        </div>
        
        <div class="form-group">
            <label for="author">Tipologia</label>
            <select class="form-select" id="tipology_id" name="tipology_id" required>
                @foreach($tipology_list as $tipology)
                    @if((isset($excursion->id))&&($tipology->id == $excursion->tipology_id))
                        <option value="{{ $tipology->id }}" selected="selected"> {{$tipology->nome}}</option>
                    @else
                    <option value="{{ $tipology->id }}"> {{$tipology->nome}}</option>
                    @endif    
                @endforeach
            </select>
        </div> 
        
        <div class="form-group">
            <label for="author">Gruppo montuoso</label>
            <select class="form-select" id="group_id" name="group_id" required>
                @foreach($group_list as $group)
                    @if((isset($excursion->id))&&($group->id == $excursion->gruppo_id))
                    <option value="{{ $group->id }}" selected="selected"> {{$group->nome}}</option>
                    @else
                    <option value="{{ $group->id }}">{{ $group->nome }}</option>
                    @endif
                @endforeach
            </select>
        </div> 
        <div class="form-group"> <!-- Date input -->
            <label class="control-label" for="data">Data</label>
            @if(isset($excursion->id))
            <input class="form-control" id="data" name="data" placeholder="DD/MM/YYYY" type="text" value="{{$excursion->data}}" required/>
            @else
            <input class="form-control" id="data" name="data" placeholder="DD/MM/YYYY" type="text" required/>
            @endif
        </div>
        <div class="form-group">
            <label>Altitudine
            @if(isset($excursion->id))
                <input class="form-control" id="numero-input" type="number" name="altitudine" maxlenght="5" placeholder="Altitudine" value="{{$excursion->altitudine}}"required>
                <div id="numero-error" style="color: red;"></div>
                @else
                <input class="form-control" id="numero-input"  type="number" name="altitudine" maxlength="5" required>
                <div id="numero-error" style="color: red;"></div>
                @endif
            </label>
        </div>
        <div class="form-group">
            <label>Tempo impiegato
            @if(isset($excursion->id))
                <input class="form-control" type="time" name="tempistica" placeholder="Tempo impiegato" value="{{$excursion->tempistica}}">
            @else
            <input class="form-control" type="time" name="tempistica" placeholder="Tempo impiegato" required>    
            @endif
            </label>
        </div>
        <div class="form-group">
            <label>Descrizione
            @if(isset($excursion->id))
            <textarea class="form-control" rows="3" cols="150" name="descrizione" placeholder="Descrizione" required>{{$excursion->descrizione}}</textarea>
            @else
            <textarea class="form-control"  rows="3" cols="150" name="descrizione" placeholder="Descrizione" required></textarea>   
            @endif
            </label>
        </div>
        <div class="form-group">
            <label for="images" class="form-label">Immagini escursione
                <input class="form-control" id="images" type="file" name="images[]" accept="image/*" multiple/>
            </label>    
        </div>

        
        <a href="{{ route('escursione.index') }}" class="btn btn-secondary"><i class="bi-box-arrow-left"></i> Cancel</a>
            @if(isset($excursion->id))
            <label for="mySubmit" class="btn btn-primary"><i class="bi-check-lg"></i> Salva</label>
            <input id="mySubmit" type="submit" value="Save" class="hidden"/>
            @else
            <label for="mySubmit" class="btn btn-primary"><i class="bi-check-lg"></i> Crea</label>
            <input id="mySubmit" type="submit" value="Create" class="hidden"/>
            @endif

    </form>


    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script>
    $(document).ready(function(){
        var date_input=$('input[name="data"]'); //our date input has the name "data"
        var container=$('.bootstrap-iso form').length=0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
            endDate: "today", 
        })
    })
    </script>

<script>
$(document).ready(function() {
  $('#numero-input').on('input', function() {
    var numero = $(this).val();

    if (!(/^\d{0,5}$/.test(numero))) {
      $('#numero-error').text('Inserire un numero con al massimo 5 cifre.');
    } else {
      $('#numero-error').text('');
    }
  });
});
</script>

</div>
</div>
@endsection   
