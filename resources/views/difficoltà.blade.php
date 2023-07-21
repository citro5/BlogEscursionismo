
@extends('layouts.master') 

@section('titolo')
Legenda difficoltà
@endsection

@section('stile','style.css') 

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('escursione.index')}}">Lista escursioni</a></li>
    <li class="breadcrumb-item active" aria-current="page">Difficoltà</li>
  </ol>
</nav>
@endsection

@section('corpo')
          
           <div id="page-content" class="header-static footer-fixed">
                <div id="flexslider" class="fullpage-wrap small">
                    <ul class="slides">
                        <li title="Scala delle difficoltà">
                            <div class="container text text-center pt-5">
                                <h1 class="mt-5 mb-1">Scala delle difficoltà</h1>
                                <p class="heading">Scala escursionistica, alpinistica (francese) e della via ferrata</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="page-wrap" class="content-section fullpage-wrap">
                    <div class="container text">
                        <div class="row margin-null">
                            <div class="row p-2">
                                <div class="col-md-12">
                                    <div class="table-responsive shadow">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th></th>
                                                    <th>Escursionismo</th>
                                                </tr>
                                                <tr>
                                                    <td>T</td>
                                                    <td>Turistico</td>
                                                </tr>
                                                <tr>
                                                    <td>E</td>
                                                    <td>Escursionistico</td>
                                                </tr>
                                                <tr>
                                                    <td>EE</td>
                                                    <td>Per escursionisti esperti</td>
                                                </tr>
                                                <tr>
                                                    <td>EEA</td>
                                                    <td>Per escursionisti esperti con attrezzatura</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-12">
                                    <div class="table-responsive shadow">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th></th>
                                                    <th>Alpinismo</th>
                                                </tr>
                                                <tr>
                                                    <td>F<br />F+</td>
                                                    <td>Facile</td>
                                                </tr>
                                                <tr>
                                                    <td>PD-<br />PD<br />PD+</td>
                                                    <td>Poco difficile</td>
                                                </tr>
                                                <tr>
                                                    <td>AD-<br />AD<br />AD+</td>
                                                    <td>Abbastanza difficile</td>
                                                </tr>
                                                <tr>
                                                    <td>D-<br />D<br />D+</td>
                                                    <td>Difficile</td>
                                                </tr>
                                                <tr>
                                                    <td>TD-<br />TD<br />TD+</td>
                                                    <td>Troppo difficile</td>
                                                </tr>
                                                <tr>
                                                    <td>ED-<br />ED<br />ED+</td>
                                                    <td>Estremamente difficile</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-12">
                                    <div class="table-responsive shadow">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th></th>
                                                    <th>Vie ferrate</th>
                                                </tr>
                                                <tr>
                                                    <td>F</td>
                                                    <td>Facile</td>
                                                </tr>
                                                <tr>
                                                    <td>MD</td>
                                                    <td>Mediamente difficile o Abbastanza difficile</td>
                                                </tr>
                                                <tr>
                                                    <td>D</td>
                                                    <td>Difficile</td>
                                                </tr>
                                                <tr>
                                                    <td>TD</td>
                                                    <td>Troppo difficile</td>
                                                </tr>
                                                <tr>
                                                    <td>ED</td>
                                                    <td>Estremamente difficile</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @endsection