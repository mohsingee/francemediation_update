@extends('frontend.layouts.app')
@section('title','About us PAGE')
@section('main-content')

<div role="main" class="main">

    <section class="page-header page-header-classic page-header-sm" >
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 data-title-border>À Propos De</h1>
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-end">
                        <li><a href="{{url('/')}}">Accueil</a></li>
                        <li class="active">À Propos De</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <div class="row text-center pb-5">
                    <div class="col-md-9 mx-md-auto">
                        <div class="overflow-hidden mb-3">
                            <h1 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
                                <span>Ce Que Nous, </span>
                                <span class="word-rotator-words " style="background-image: linear-gradient(to right, #00adee, #29b4bb, #87c445); ">
												<b class="is-visible">France</b>
												<b>Médiation</b>
												<b>Tous Jours</b>
											</span>
                                <span> Offrons</span>
                            </h1>
                        </div>
                        <div class="overflow-hidden mb-3">
                            <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 mb-5">
                    <div class="col-md-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="800">
                        <h3 class="font-weight-bold text-4 mb-2">NOTRE MISSION</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu.</p>
                    </div>
                    <div class="col-md-4 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="600">
                        <h3 class="font-weight-bold text-4 mb-2">NOTRE VISION</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nulla vel pellentesque consequat, ante nulla hendrerit arcu.</p>
                    </div>
                    <div class="col-md-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="800">
                        <h3 class="font-weight-bold text-4 mb-2">POURQUOI NOUS</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel consequat, ante nulla hendrerit arcu.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section section-dark border-0 mb-0 appear-animation" style="background-image: linear-gradient(to right, #00adee, #29b4bb, #87c445);" data-appear-animation="fadeIn" data-plugin-options="{'accY': -150}">
        <div class="container">
            <div class="row counters counters-sm pb-4 pt-3">
                <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="counter">
                        <i class="icons icon-user text-color-light"></i>
                        <strong class="text-color-light font-weight-extra-bold" data-to="450" data-append="+">0</strong>
                        <label class="text-4 mt-1 text-color-light">Des Clients Heureux</label>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="counter">
                        <i class="icons icon-badge text-color-light"></i>
                        <strong class="text-color-light font-weight-extra-bold" data-to="10">0</strong>
                        <label class="text-4 mt-1 text-color-light">Années d'activité</label>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-5 mb-sm-0">
                    <div class="counter">
                        <i class="icons icon-graph text-color-light"></i>
                        <strong class="text-color-light font-weight-extra-bold" data-to="17">0</strong>
                        <label class="text-4 mt-1 text-color-light">Sessions de Formation</label>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter">
                        <i class="icons icon-badge text-color-light"></i>
                        <strong class="text-color-light font-weight-extra-bold" data-to="32">0</strong>
                        <label class="text-4 mt-1 text-color-light">Formations à la Médiation</label>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<section class="section section-height-3 bg-color-grey-scale-1 m-0 border-0">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 pb-sm-4 pb-lg-0 pe-lg-5 mb-sm-5 mb-lg-0">
                <h2 class="text-color-dark font-weight-normal text-6 mb-2">Notre <strong class="font-weight-extra-bold">Histoire</strong></h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit massa enim. Nullam id varius nunc. </p>
                <p class="pe-5 me-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna ex, et faucibus lacus venenatis eget</p>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4 offset-sm-4 offset-md-4 offset-lg-2 position-relative mt-sm-5" style="top: 1.7rem;">
                <img src="{{ asset('assets/frontend/') }}/img/generic/generic-corporate-3-1.jpg" class="img-fluid position-absolute d-none d-sm-block appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="300" style="top: 10%; left: -50%;" alt="" />
                <img src="{{ asset('assets/frontend/') }}/img/generic/generic-corporate-3-2.jpg" class="img-fluid position-absolute d-none d-sm-block appear-animation" data-appear-animation="expandIn" style="top: -33%; left: -29%;" alt="" />
                <img src="{{ asset('assets/frontend/') }}/img/generic/generic-corporate-3-3.jpg" class="img-fluid position-relative appear-animation mb-2" data-appear-animation="expandIn" data-appear-animation-delay="600" alt="" />
            </div>
        </div>
    </div>
</section>

<section class="section border-0 pb-0 pb-lg-5 m-0">
    <div class="container pb-2">
        <div class="row">
            <div class="col-lg-6 text-center text-md-start mt-5 mb-5 mb-lg-0">
                <h2 class="text-color-dark font-weight-normal text-6 mb-2">A propos de <strong class="font-weight-extra-bold">Nos Clients</strong></h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit massa enim. Nullam id varius nunc.</p>
                <div class="row justify-content-center my-5">
                    <div class="col-8 text-center col-md-4">
                        <img src="{{ asset('assets/frontend/') }}/img/logos/logo-1.png" class="img-fluid hover-effect-3" alt="" />
                    </div>
                    <div class="col-8 text-center col-md-4 my-3 my-md-0">
                        <img src="{{ asset('assets/frontend/') }}/img/logos/logo-2.png" class="img-fluid hover-effect-3" alt="" />
                    </div>
                    <div class="col-8 text-center col-md-4">
                        <img src="{{ asset('assets/frontend/') }}/img/logos/logo-3.png" class="img-fluid hover-effect-3" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="owl-carousel owl-theme nav-style-1 stage-margin" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 1}, '1200': {'items': 1}}, 'loop': true, 'nav': false, 'dots': false, 'stagePadding': 40, 'autoplay': true, 'autoplayTimeout': 6000, 'loop': true}">
                    <div>
                        <div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark testimonial-remove-right-quote ps-md-4 mb-0">
                            <div class="testimonial-author">
                                <img src="{{ asset('assets/frontend/') }}/img/clients/client-1.jpg" class="img-fluid rounded-circle mb-0" alt="">
                            </div>
                            <blockquote>
                                <p class="text-color-dark text-4 line-height-5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae metus tellus. Curabitur non lorem at odio tempus consectetur vel eu lacus. Morbi.</p>
                            </blockquote>
                            <div class="testimonial-author">
                                <p><strong class="font-weight-extra-bold text-2">John Smith</strong><span>Okler</span></p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark testimonial-remove-right-quote ps-md-4 mb-0">
                            <div class="testimonial-author">
                                <img src="{{ asset('assets/frontend/') }}/img/clients/client-1.jpg" class="img-fluid rounded-circle mb-0" alt="">
                            </div>
                            <blockquote>
                                <p class="text-color-dark text-4 line-height-5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae metus tellus. Curabitur non lorem at odio tempus consectetur vel eu lacus. Morbi.</p>
                            </blockquote>
                            <div class="testimonial-author">
                                <p><strong class="font-weight-extra-bold text-2">John Smith</strong><span>Okler</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
