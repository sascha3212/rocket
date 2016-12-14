@extends('layouts.app')

@section('content')
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Gebruiker gegevens</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{url('/edit_voertuig')}}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="kenteken" class="col-md-4 control-label">Kenteken</label>

                                    <div class="col-md-6">
                                        <input id="kenteken" type="text" class="form-control" name="kenteken"
                                               value="{{ $voertuig->kenteken }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="merk" class="col-md-4 control-label">Merk</label>

                                    <div class="col-md-6">
                                        <input id="merk" type="text" class="form-control" name="merk"
                                               value="{{ $voertuig->merk }}" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="aankoopdatum" class="col-md-4 control-label">Aankoopdatum</label>

                                    <div class="col-md-6">
                                        <input id="aankoopdatum" type="date" class="form-control" name="aankoopdatum"
                                               value="{{ $voertuig->aankoopdatum }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="voertuigtype_voertuigtype_id"
                                           class="col-md-4 control-label">Voertuig</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="voertuigtype_voertuigtype_id"
                                                name="voertuigtype_voertuigtype_id">
                                            @foreach($voertuigtypes as $voertuigtype)
                                                <option value="{{$voertuigtype->voertuigtype_id}}" {{$voertuig->voertuigtype_voertuigtype_id === $voertuigtype->voertuigtype_id ? "selected" : ""}}>{{ucfirst($voertuigtype->lestype)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Wijzig
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Onderhoudsbeurt(en)</div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Startdatum</th>
                                    <th>Einddatum</th>
                                    <th>Dagen</th>
                                    <th>KM stand</th>
                                    <th>Uurkosten</th>
                                    <th>Garage</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($voertuig->toOnderhoudsbeurt as $onderhoudsbeurt)
                                    <form method="POST"
                                          action="{{url('new_leerling_instructeur',['user_id'=>$user->id,'contract_id'=> $lespakket->lespakket_id])}}">
                                        {{csrf_field()}}
                                        <tr>
                                            <td>{{\Carbon\Carbon::parse($onderhoudsbeurt->pivot->begindatum)->format('d-m-Y')}}</td>
                                            <td>{{\Carbon\Carbon::parse($onderhoudsbeurt->pivot->einddatum)->format('d-m-Y')}}</td>
                                            <td>0</td>
                                            <td>{{$onderhoudsbeurt->pivot->km-stand}}</td>
                                            <td>{{$onderhoudsbeurt->pivot->arbeidsloon}}</td>
                                            <td>
                                                <select class="form-control" id="instructeur" name="instructeur">
                                                    <option value="" selected>Kies</option>
                                                </select>
                                            </td>
                                            <td>
                                                <a>
                                                    <button type="submit" class="btn btn-primary">Toekennen</button>
                                                </a>
                                            </td>
                                        </tr>
                                    </form>
                                @empty
                                    <tr>
                                        <td>Nog geen onderhoudsbeurt</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
