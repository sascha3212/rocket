@extends('layouts.app')

@section('content')
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Gebruiker gegevens</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{url('/edit_employee')}}">
                                {{ csrf_field() }}
                                <input id="id" type="hidden" class="form-control" name="id" value="{{ $user->id }}">
                                <div class="form-group">
                                    <label for="rol" class="col-md-4 control-label">Rol:</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="rol" name="rol">
                                            @foreach($rollen as $rol)
                                                <option value="{{$rol->rol_id}}" {{$rol->rol_id == 3 ? "disabled" : ""}} {{$user->toRol[0]->rol_id === $rol->rol_id ? "selected" : ""}}>{{ucfirst($rol->rol)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="voornaam" class="col-md-4 control-label">Voornaam</label>

                                    <div class="col-md-6">
                                        <input id="voornaam" type="text" class="form-control" name="voornaam"
                                               value="{{ $user->voornaam }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tussenvoegsel" class="col-md-4 control-label">Tussenvoegsel</label>

                                    <div class="col-md-6">
                                        <input id="tussenvoegsel" type="text" class="form-control" name="tussenvoegsel"
                                               value="{{ $user->tussenvoegsel }}" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="achternaam" class="col-md-4 control-label">Achternaam</label>

                                    <div class="col-md-6">
                                        <input id="achternaam" type="text" class="form-control" name="achternaam"
                                               value="{{ $user->achternaam }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="geboren" class="col-md-4 control-label">Geboortedatum</label>

                                    <div class="col-md-6">
                                        <input id="geboren" type="text" class="form-control" name="geboren"
                                               value="{{ $user->geboren }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="geslacht" class="col-md-4 control-label">Geslacht</label>

                                    <div class="col-md-6">
                                        <input id="geslacht" type="text" class="form-control" name="geslacht"
                                               value="{{ $user->geslacht }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adres" class="col-md-4 control-label">Adress</label>

                                    <div class="col-md-6">
                                        <input id="adres" type="text" class="form-control" name="adres"
                                               value="{{ $user->adres }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="huisnr" class="col-md-4 control-label">Huisnummer</label>

                                    <div class="col-md-6">
                                        <input id="huisnr" type="text" class="form-control" name="huisnr"
                                               value="{{ $user->huisnr }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="postcode" class="col-md-4 control-label">Postcode</label>

                                    <div class="col-md-6">
                                        <input id="postcode" type="text" class="form-control" name="postcode"
                                               value="{{ $user->postcode }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="plaats" class="col-md-4 control-label">Plaats</label>

                                    <div class="col-md-6">
                                        <input id="plaats" type="text" class="form-control" name="plaats"
                                               value="{{ $user->plaats }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefoon" class="col-md-4 control-label">Telefoon</label>

                                    <div class="col-md-6">
                                        <input id="telefoon" type="text" class="form-control" name="telefoon"
                                               value="{{ $user->telefoon }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">E-mail:</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control" name="email"
                                               value="{{ $user->email }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="col-md-4 control-label">Username:</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control" name="username"
                                               value="{{ $user->username }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm
                                        Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation">

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                        @endif
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
                        <div class="panel-heading">Licenties</div>
                        <div class="panel-body">
                            <form class="form-inline" method="POST"
                                  action="{{url('new_licentie',['user_id'=>$user->id])}}">
                                {{csrf_field()}}
                                <select class="form-control" id="voertuigtype_id" name="voertuigtype_id">
                                    <option selected disabled>Voertuigtype</option>
                                    @foreach($voertuigtypes as $voertuigtype)
                                        <option value="{{$voertuigtype->voertuigtype_id}}">{{ucfirst($voertuigtype->lestype)}}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="begindatum" id="begindatum"
                                           value="{{\Carbon\Carbon::parse(\Carbon\Carbon::now())->format('d-m-Y')}}">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="einddatum" id="einddatum"
                                           placeholder="Einddatum">
                                </div>
                                <button type="submit" class="btn btn-primary">Toevoegen</button>
                            </form>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Startdatum</th>
                                    <th>Einddatum</th>
                                    <th>Voertuigtype</th>
                                    <th>Rijbewijs</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($user->toLicentie as $licentie)
                                    <form method="POST"
                                          action="{{url('delete_licentie',['user_id'=>$user->id])}}">
                                        {{csrf_field()}}
                                        <tr>
                                            <td>{{\Carbon\Carbon::parse($licentie->pivot->startdatum)->format('d-m-Y')}}</td>
                                            <td>
                                                @if($licentie->pivot->einddatum != NULL)
                                                    {{\Carbon\Carbon::parse($licentie->pivot->einddatum)->format('d-m-Y')}}
                                                @else
                                                    n.v.t.
                                                @endif
                                            </td>
                                            <td>{{ucfirst($licentie->lestype)}}</td>
                                            <td>{{$licentie->rijbewijs}}</td>
                                            <td>
                                                <a>
                                                    <button type="submit" class="btn btn-danger">Verwijder</button>
                                                </a>
                                            </td>
                                        </tr>
                                    </form>
                                @empty
                                    <tr>
                                        <td>Nog geen licenties</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Voertuigen</div>
                        <div class="panel-body">
                            <form class="form-inline" method="POST"
                                  action="{{url('new_user_voertuig',['user_id'=>$user->id])}}">
                                {{csrf_field()}}
                                <select class="form-control" id="voertuig_kenteken" name="voertuig_kenteken">
                                    <option selected disabled>Voertuig</option>
                                    {{--Haalt alle voertuigen op en checkt of de instructeur de uiste licentie heeft voor dit voertuig--}}
                                    @foreach($voertuigen as $voertuig)
                                        @foreach($user->toLicentie as $licentie)
                                            @if($voertuig->toVoertuigtype->lestype === $licentie->lestype)
                                                <option value="{{$voertuig->kenteken}}">{{ucfirst($voertuig->toVoertuigtype->lestype)}}
                                                    - {{ucfirst($voertuig->kenteken)}}</option>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="begindatum" id="begindatum"
                                           value="{{\Carbon\Carbon::parse(\Carbon\Carbon::now())->format('d-m-Y')}}">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="einddatum" id="einddatum"
                                           placeholder="Einddatum">
                                </div>
                                <button type="submit" class="btn btn-primary">Toevoegen</button>
                            </form>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Voertuigtype</th>
                                    <th>Kenteken</th>
                                    <th>Startdatum</th>
                                    <th>Einddatum</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($user->toVoertuiggebruiker as $voertuiggebruiker)
                                    <form method="POST"
                                          action="{{url('delete_user_voertuig',['user_id'=>$user->id])}}">
                                        {{csrf_field()}}
                                        <tr>
                                            <td>{{ucfirst($voertuiggebruiker->toVoertuigtype->lestype)}}</td>
                                            <td>{{$voertuiggebruiker->kenteken}}</td>
                                            <td>{{\Carbon\Carbon::parse($voertuiggebruiker->pivot->startdatum)->format('d-m-Y')}}</td>
                                            <td>
                                                @if($voertuiggebruiker->pivot->einddatum != NULL)
                                                    {{\Carbon\Carbon::parse($voertuiggebruiker->pivot->einddatum)->format('d-m-Y')}}
                                                @else
                                                    n.v.t.
                                                @endif
                                            </td>
                                            <td>
                                                <a>
                                                    <button type="submit" class="btn btn-danger">Verwijder</button>
                                                </a>
                                            </td>
                                        </tr>
                                    </form>
                                @empty
                                    <tr>
                                        <td>Nog geen toegekende voertuigen</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Absentie</div>
                        <div class="panel-body">
                            <form class="form-inline" method="POST"
                                  action="{{url('new_user_absentie',['user_id'=>$user->id])}}">
                                {{csrf_field()}}
                                <select class="form-control" id="absentietype_absentietype_id" name="absentietype_absentietype_id">
                                    <option selected disabled>Absentietype</option>
                                    @foreach($absentietypes as $absentietype)
                                        <option value="{{$absentietype->absentietype_id}}">{{ucfirst($absentietype->absentietype)}}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="startdatum" id="startdatum"
                                           value="{{\Carbon\Carbon::parse(\Carbon\Carbon::now())->format('d-m-Y')}}">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="einddatum" id="einddatum"
                                           placeholder="Einddatum">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="notitie" id="notitie"
                                           placeholder="Notitie"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Toevoegen</button>
                            </form>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Startdatum</th>
                                    <th>Einddatum</th>
                                    <th>Notitie</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($user->toAbsentie as $absentie)
                                    <form method="POST"
                                          action="{{url('delete_user_absentie',['user_id'=>$user->id])}}">
                                        {{csrf_field()}}
                                        <tr>
                                            <td>{{ucfirst($absentie->absentietype)}}</td>
                                            <td>{{\Carbon\Carbon::parse($absentie->pivot->startdatum)->format('d-m-Y')}}</td>
                                            <td>
                                                @if($absentie->pivot->einddatum != NULL)
                                                    {{\Carbon\Carbon::parse($absentie->pivot->einddatum)->format('d-m-Y')}}
                                                @else
                                                    n.v.t.
                                                @endif
                                            </td>
                                            <td>{{ucfirst($absentie->pivot->notitie)}}</td>
                                            <td>
                                                <a>
                                                    <button type="submit" class="btn btn-danger">Verwijder</button>
                                                </a>
                                            </td>
                                        </tr>
                                    </form>
                                @empty
                                    <tr>
                                        <td>Nog geen absentiesn</td>
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