@extends('layouts.app')

@section('content')
    <!-- Header -->
    <header id="page-top">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welkom op het admin paneel</div>
                <div class="intro-heading">Hier beheert u de website</div>
                <a href="#beheer" class="page-scroll btn btn-xl">Beheren</a>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="beheer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                       aria-expanded="true" aria-controls="collapseOne">
                                        Gebruikers
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Voornaam</th>
                                            <th>Achternaam</th>
                                            <th>Email</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            @foreach($user->toRol as $test)
                                                @if($test->rol_id == 3)
                                                <tr>
                                                    <td>{{ucfirst($user->voornaam)}}</td>
                                                    <td>{{$user->tussenvoegsel}} {{ucfirst($user->achternaam)}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td><a href="{{url('edit_user',['user'=>$user->id])}}">
                                                            <button class="btn btn-primary">Bekijken</button>
                                                        </a></td>
                                                    <td>
                                                        <button class="btn btn-danger">Verwijderen</button>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        <tr>
                                            <td><a href="{{url('/new_user')}}">
                                                    <button class="btn btn-success">+ nieuw</button>
                                                </a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Medewerkers
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Voornaam</th>
                                            <th>Achternaam</th>
                                            <th>Email</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            @foreach($user->toRol as $test)
                                                @if($test->rol_id != 3)
                                                    <tr>
                                                        <td>{{ucfirst($user->voornaam)}}</td>
                                                        <td>{{$user->tussenvoegsel}} {{ucfirst($user->achternaam)}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td><a href="{{url('edit_employee',['user'=>$user->id])}}">
                                                                <button class="btn btn-primary">Bekijken</button>
                                                            </a></td>
                                                        <td>
                                                            <button class="btn btn-danger">Verwijderen</button>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        <tr>
                                            <td><a href="{{url('/new_employee')}}">
                                                    <button class="btn btn-success">+ nieuw</button>
                                                </a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Voertuigen
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Voertuig</th>
                                            <th>Kenteken</th>
                                            <th>Merk</th>
                                            <th>Aankopdatum</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($voertuigen as $voertuig)
                                            <tr>
                                                <td>{{ucfirst($voertuig->toVoertuigtype->lestype)}}</td>
                                                <td>{{$voertuig->kenteken}}</td>
                                                <td>{{ucfirst($voertuig->merk)}}</td>
                                                <td>{{$voertuig->aankoopdatum}}</td>
                                                <td>
                                                    <a href="{{url('edit_voertuig',['voertuig'=>$voertuig->kenteken])}}">
                                                        <button class="btn btn-primary">Bekijken</button>
                                                    </a></td>
                                                <td>
                                                    <button class="btn btn-danger">Verwijderen</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td><a href="{{url('/new_voertuig')}}">
                                                    <button class="btn btn-success">+ nieuw</button>
                                                </a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Lespakketten
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingFour">
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Lespakket</th>
                                            <th>Lessen aantal</th>
                                            <th>actie</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($lespakketten as $lespakket)
                                            <tr>
                                                <td>{{ucfirst($lespakket->lespakket)}}</td>
                                                <td>{{$lespakket->lessenaantal}}</td>
                                                <td>{{$lespakket->actie}}</td>
                                                <td>
                                                    <a href="{{url('edit_lespakket',['lespakket'=>$lespakket->lespakket_id])}}">
                                                        <button class="btn btn-primary">Wijzigen</button>
                                                    </a></td>
                                                <td>
                                                    <button class="btn btn-danger">Verwijderen</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td><a href="{{url('/new_lespakket')}}">
                                                    <button class="btn btn-success">+ nieuw</button>
                                                </a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFive">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Vakanties en Feestdagen
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingFive">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                    ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingSix">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        Reparatieonderdelen
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingSix">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                    ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingSeven">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        Info
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingSeven">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                    ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
