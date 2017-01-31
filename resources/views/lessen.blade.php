@extends('layouts.app')

@section('content')
    <!-- Header -->
    <header id="page-top">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welkom bij uw lessen</div>
                <div class="intro-heading">Hier reserveert u lessen</div>
                <a href="#lessen" class="page-scroll btn btn-xl">Lessen</a>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="lessen">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Lessen plannen</h3>
                    <form method="post" action="{{url('new_les')}}">
                        {{csrf_field()}}
                        <select name="lespakket">
                            @foreach($contracten as $contract)
                                <option value="{{$contract->lespakket_lespakket_id}}">
                                    @foreach($lespakketten as $lespakket)
                                        @if($contract->lespakket_lespakket_id == $lespakket->lespakket_id)
                                            {{$lespakket->toVoertuigType->lestype}} - {{$lespakket->lespakket}}
                                        @endif
                                    @endforeach
                                </option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <select name="lesdatum">
                                @foreach($niet_mogelijk as $dag)
                                    <option value="{{$dag != '-' ? Carbon\Carbon::parse($dag)->format('Y-m-d') : $dag}}" {{$dag == '-' ? "disabled" : ""}}>{{$dag != '-' ? Carbon\Carbon::parse($dag)->format('d-m-Y') : $dag}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="starttijd">Start tijd:</label>
                            <input class="form-control" type="time" id="starttijd" name="starttijd">
                        </div>
                        <div class="form-group">
                            <label for="ophaaladres">Ophaal adres:</label>
                            <input class="form-control" type="text" id="ophaaladres" name="ophaaladres">
                        </div>
                        <button type="submit" class="btn btn-primary">Les plannen</button>
                    </form>
                </div>
                <div class="col-lg-12">
                    <h3>Geplande lessen</h3>
                    <table class="table table-bordered table-responsive">
                        <tbody>
                        <thead>
                        <tr>
                            <th><span></span></th>
                            <th>8 uur</th>
                            <th>9 uur</th>
                            <th>10 uur</th>
                            <th>11 uur</th>
                            <th>12 uur</th>
                            <th>13 uur</th>
                            <th>14 uur</th>
                            <th>15 uur</th>
                            <th>16 uur</th>
                            <th>17 uur</th>
                        </tr>
                        </thead>

                        @foreach($dates as $key => $date)
                            <tr>
                                <td><span>{{ $key }}</span></td>
                                @foreach($date as $tijdkey => $tijdvalue)

                                    @if($tijdvalue != 'vrij')
                                        <td>
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#modal_gereserveerd_{{$tijdvalue->les_id}}">
                                                Gereseveerd
                                            </button>
                                        </td>
                                    @else
                                        <td>
                                            Vrij
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </section>


    @foreach($dates as $key => $date)

        @foreach($date as $tijdkey => $tijdvalue)

            @if($tijdvalue != 'vrij')
                <!-- Modal -->
                <div class="modal fade" id="modal_gereserveerd_{{$tijdvalue->les_id}}" tabindex="-1" role="dialog"
                     aria-labelledby="modal_gereserveerd_{{$tijdvalue->les_id}}">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Gereserveerde les</h4>
                            </div>
                            <div class="modal-body">
                                <table>
                                    <tr>
                                        <td><p>Datum:</p></td>
                                        <td><p>{{$tijdvalue->lesdatum}}</p></td>
                                    </tr>
                                    <tr>
                                        <td><p>Begintijd:</p></td>
                                        <td><p>{{$tijdvalue->starttijd}}</p></td>
                                    </tr>
                                    <tr>
                                        <td><p>Ophaaladres:</p></td>
                                        <td><p>{{$tijdvalue->ophaaladres}}</p></td>
                                    </tr>
                                    <tr>
                                        <td><p>Instructeur:</p></td>
                                        <td>
                                            <p>
                                                @foreach($users as $user)
                                                    @if($user->id == $tijdvalue->instructeur)
                                                        {{$user->voornaam}} {{$user->tussenvoegsel}} {{$user->achternaam}}
                                                    @endif
                                                @endforeach
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p>Voertuig:</p></td>
                                        <td>
                                            <p>
                                                @foreach($voertuigen as $voertuig)
                                                    @if($voertuig->kenteken == $tijdvalue->voertuig_kenteken)
                                                        {{$voertuig->merk}} - {{$voertuig->kenteken}}
                                                    @endif
                                                @endforeach
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <a onclick="return confirm('Are you sure?');" href="{{url('delete_les',$tijdvalue->les_id)}}">
                                    <button type="button" class="btn btn-danger">Annuleren</button>
                                </a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endforeach

@endsection
