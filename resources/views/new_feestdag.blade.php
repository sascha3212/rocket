@extends('layouts.app')

@section('content')
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Feestdagen toevoegen </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{url('/new_feestdag')}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="feestdag" class="col-md-4 control-label">Feestdag</label>

                                    <div class="col-md-6">
                                        <input id="feestdag" type="text" class="form-control" name="feestdag" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="datum" class="col-md-4 control-label">Datum</label>

                                    <div class="col-md-6">
                                        <input id="datum" type="date" class="form-control" name="datum"autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="einddatum" class="col-md-4 control-label">Einddatum</label>

                                    <div class="col-md-6">
                                        <input id="einddatum" type="date" class="form-control" name="einddatum" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="notitie" class="col-md-4 control-label">Notitite</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" name="notitie" id="notitie"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Voeg toe
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
