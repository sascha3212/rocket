@extends('layouts.app')

@section('content')
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Gebruiker gegevens</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{url('/edit_user')}}">
                                {{ csrf_field() }}
                                <input id="id" type="hidden" class="form-control" name="id"
                                       value="{{ $user->id }}">
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
                        <div class="panel-heading">Lespakket(ten)</div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Voertuig</th>
                                    <th>Lespakket</th>
                                    <th>Lessen aantal</th>
                                    <th>Prijs</th>
                                    <th>Datum</th>
                                    <th>Instructeur</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($user->toLespakket as $lespakket)
                                    <form method="POST"
                                          action="{{url('new_leerling_instructeur',['user_id'=>$user->id,'contract_id'=> $lespakket->lespakket_id])}}">
                                        {{csrf_field()}}
                                        <tr>
                                            <td>{{ucfirst($lespakket->toVoertuigtype->lestype)}}</td>
                                            <td>{{ucfirst($lespakket->lespakket)}}</td>
                                            <td>{{$lespakket->lessenaantal}}</td>
                                            <td>&#8364; {{$lespakket->toLesPrijs->prijs}}</td>
                                            <td>{{\Carbon\Carbon::parse($lespakket->datum)->format('d-m-Y')}}</td>
                                            <td>
                                                <select class="form-control" id="instructeur" name="instructeur">
                                                    <option value="" selected >Kies</option>
                                                    @foreach($instructeurs as $instructeur)
                                                        @if($instructeur->hasRole(2))
                                                            <option value="{{$instructeur->id}}"{{$lespakket->pivot->instructeur_id == $instructeur->id ? 'selected': ''}}>{{ucfirst($instructeur->voornaam)}}</option>
                                                        @endif
                                                    @endforeach
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
                                        <td>Nog geen lespaketten</td>
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
