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
                </div>
            </div>
        </div>
    </section>
@endsection
