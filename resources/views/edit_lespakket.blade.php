@extends('layouts.app')

@section('content')
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Gebruiker gegevens</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{url('/edit_lespakket')}}">
                                {{ csrf_field() }}
                                <input id="lespakket_id" type="hidden" name="lespakket_id"
                                       value="{{ $lespakket->lespakket_id }}" >
                                <div class="form-group">
                                    <label for="lespakket" class="col-md-4 control-label">Lespakket</label>

                                    <div class="col-md-6">
                                        <input id="lespakket" type="text" class="form-control" name="lespakket"
                                               value="{{ $lespakket->lespakket }}" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lessenaantal" class="col-md-4 control-label">Lessenaantal</label>

                                    <div class="col-md-6">
                                        <input id="lessenaantal" type="number" class="form-control" name="lessenaantal"
                                               value="{{ $lespakket->lessenaantal }}" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="actie" class="col-md-4 control-label">Actie-percentage</label>

                                    <div class="col-md-6">
                                        <input id="actie" type="nunmber" class="form-control" name="actie"
                                               value="{{ $lespakket->actie }}" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="voertuigtype_voertuigtype_id"
                                           class="col-md-4 control-label">Voertuig</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="voertuigtype_voertuigtype_id"
                                                name="voertuigtype_voertuigtype_id">
                                            @foreach($voertuigtypes as $voertuigtype)
                                                <option value="{{$voertuigtype->voertuigtype_id}}" {{$lespakket->voertuigtype_voertuigtype_id === $voertuigtype->voertuigtype_id ? "selected" : ""}}>{{ucfirst($voertuigtype->lestype)}}</option>
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
