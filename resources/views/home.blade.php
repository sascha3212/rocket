@extends('layouts.app')

@section('content')
    <!-- Header -->
    <header id="page-top">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Alle erkende en onbekende rijopleidingen</div>
                <div class="intro-heading">Welkom bij Rijschool Rocket</div>
                <a href="#services" class="page-scroll btn btn-xl">Neem een kijkje!</a>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Acties</h2>
                    <h3 class="section-subheading text-muted">Huidig lopende acties.</h3>
                </div>
            </div>
            <div class="row text-center">
                @foreach($lespakketten as $lespakket)
                    @if($lespakket->actie)
                        <div class="col-md-3 col-sm-4 portfolio-item">
                            <a href="#{{$lespakket->lespakket_id}}modal" class="portfolio-link"
                               data-toggle="modal">
                                <img src="img/portfolio/{{$lespakket->toVoertuigType->lestype}}.jpg"
                                     class="img-responsive"
                                     alt="">
                            </a>
                            <div class="portfolio-caption">
                                <h4>{{$lespakket->lespakket}} ({{$lespakket->actie}}%)</h4>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Lespakketten</h2>
                    <h3 class="section-subheading text-muted">Huidige lespakketten aanbod.</h3>
                </div>
            </div>
            <div class="row">
                @foreach($lespakketten as $lespakket)
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a href="#{{$lespakket->lespakket_id}}modal" class="portfolio-link"
                           data-toggle="modal">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fa fa-search fa-3x"></i>
                                </div>
                            </div>
                            <img src="img/portfolio/{{$lespakket->toVoertuigType->lestype}}.jpg" class="img-responsive"
                                 alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4>{{$lespakket->lespakket}}
                                @if($lespakket->actie)
                                    ({{$lespakket->actie}}%)
                                @endif
                            </h4>
                            <p class="text-muted">Graphic Design</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Instructeurs</h2>
                    <h3 class="section-subheading text-muted">Deze medewerkens helpen u naar een rijbewijs!</h3>
                </div>
            </div>
            <div class="row">
                @foreach($users as $user)
                    @foreach($user->toRol as $instructeur)
                        @if($instructeur->rol_id == 2)
                            <div class="col-sm-4">
                                <div class="team-member">
                                    <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQaGbnh2l13okMdLVydJ2gL94jxnGZjjBgYmUGqx7h7TB3UL655Vw"
                                         class="img-responsive img-circle" alt="">
                                    <h4>{{$user->voornaam}} {{$user->achternaam}}</h4>
                                    <p class="text-muted">(
                                        @foreach($user->toLicentie as $type)
                                            {{ucfirst($type->lestype)}}
                                        @endforeach
                                        ) intructeur</p>

                                    <ul class="list-inline social-buttons">
                                        <li><a href=""><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li><a href=""><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href=""><i class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required
                                           data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email"
                                           required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone"
                                           required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required
                                              data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

    @foreach($lespakketten as $lespakket)
        <!-- Portfolio Modal 1 -->
        <div class="portfolio-modal modal fade" id="{{$lespakket->lespakket_id}}modal" tabindex="-1"
             role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2>{{$lespakket->lespakket}}</h2>
                                    <h3>
                                        @if($lespakket->actie)
                                            &#8364; {{$lespakket->toLesPrijs->prijs}} -
                                            {{$lespakket->actie}}% =<br>
                                            &#8364; {{($lespakket->toLesPrijs->prijs / 100) * (100-$lespakket->actie)}}
                                        @else
                                            &#8364; {{$lespakket->toLesPrijs->prijs}}
                                        @endif
                                    </h3>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos
                                        deserunt
                                        repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores
                                        repudiandae,
                                        nostrum, reiciendis facere nemo!</p>
                                    <p>
                                        <strong>Want these icons in this portfolio item sample?</strong>You can download
                                        60
                                        of them for free, courtesy of <a
                                                href="https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc">RoundIcons.com</a>,
                                        or you can purchase the 1500 icon set <a
                                                href="https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc">here</a>.
                                    </p>
                                    <ul class="list-inline">
                                        <li>Date: July 2014</li>
                                        <li>Client: Round Icons</li>
                                        <li>Category: Graphic Design</li>
                                    </ul>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                                                class="fa fa-times"></i> Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
