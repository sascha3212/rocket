@extends('layouts.app')

@section('content')
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Gebruiker gegevens</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{url('/new_employee')}}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="rol" class="col-md-4 control-label">Rol:</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="rol" name="rol">
                                            @foreach($rollen as $rol)
                                                <option value="{{$rol->rol_id}}" {{$rol->rol_id == 3 ? "disabled" : ""}}>{{ucfirst($rol->rol)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="voornaam" class="col-md-4 control-label">Voornaam</label>

                                    <div class="col-md-6">
                                        <input id="voornaam" type="text" class="form-control" name="voornaam"
                                               required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tussenvoegsel" class="col-md-4 control-label">Tussenvoegsel</label>

                                    <div class="col-md-6">
                                        <input id="tussenvoegsel" type="text" class="form-control" name="tussenvoegsel"
                                               autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="achternaam" class="col-md-4 control-label">Achternaam</label>

                                    <div class="col-md-6">
                                        <input id="achternaam" type="text" class="form-control" name="achternaam"
                                               required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="geboren" class="col-md-4 control-label">Geboortedatum</label>

                                    <div class="col-md-6">
                                        <input id="geboren" type="text" class="form-control" name="geboren"
                                               required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="geslacht" class="col-md-4 control-label">Geslacht</label>

                                    <div class="col-md-6">
                                        <input id="geslacht" type="text" class="form-control" name="geslacht"
                                               required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adres" class="col-md-4 control-label">Adress</label>

                                    <div class="col-md-6">
                                        <input id="adres" type="text" class="form-control" name="adres"
                                               required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="huisnr" class="col-md-4 control-label">Huisnummer</label>

                                    <div class="col-md-6">
                                        <input id="huisnr" type="text" class="form-control" name="huisnr"
                                               required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="postcode" class="col-md-4 control-label">Postcode</label>

                                    <div class="col-md-6">
                                        <input id="postcode" type="text" class="form-control" name="postcode"
                                               required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="plaats" class="col-md-4 control-label">Plaats</label>

                                    <div class="col-md-6">
                                        <input id="plaats" type="text" class="form-control" name="plaats"
                                               required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefoon" class="col-md-4 control-label">Telefoon</label>

                                    <div class="col-md-6">
                                        <input id="telefoon" type="text" class="form-control" name="telefoon"
                                               required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">E-mail:</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control" name="email"
                                               required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="col-md-4 control-label">Username:</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control" name="username"
                                               autofocus>
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
