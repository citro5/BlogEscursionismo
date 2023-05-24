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

  <div class="escursione-descrizione">
    <h3 class="title">Descrizione</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum bibendum fringilla elit, at consectetur neque consequat at. Mauris eu tellus quis magna egestas facilisis in ac urna.</p>
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
                <h3>E </h3>
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

  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
  <script>

    Fancybox.bind('[data-fancybox="gallery"]', {
        Carousel : {
          infinite: false
        }
      });  
   
  </script>
</div>       
@endsection

