@extends('frontend.layouts.app')
@section('title','Mediation PAGE')
@section('main-content')
    <div role="main" class="main">

        <section class="page-header page-header-classic page-header-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                        <h1 data-title-border>Mediation</h1>
                    </div>
                    <div class="col-md-4 order-1 order-md-2 align-self-center">
                        <ul class="breadcrumb d-block text-md-end">
                            <li><a href="{{url('/')}}">Accueil</a></li>
                            <li class="active">Mediation</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $regions = array (
            0 => 'Auvergne-rhone-alpes',
            1 => 'Bourgogne-Franche-Comté',
            2 => 'Bretagne',
            3 => 'Centre-Val de Loire',
            4 => 'Corse',
            5 => 'Grand-Est',
            6 => 'Guadeloupe',
            7 => 'Guyane',
            8 => 'Hauts-de-France',
            9 => 'Île-de-France',
            10 => 'Martinique',
            11 => 'Mayotte',
            12 => 'Normandie',
            13 => 'Nouvelle-Aquitaine',
            14 => 'Occitanie',
            15 => 'Pays de la Loire',
            16 => 'Provence-Alpes Côte d\'Azur',
            17 => 'Réunion',
        );
        //var_dump($regions[0]);die;
        ?>
        <section class="section border-0 pb-0 pb-lg-5 m-0">
            <div class="container my-lg-4">
                <div class="row mb-4 pb-2">
                    <div class="col">
                        <div class="overflow-hidden mb-2">
                            <h2 class="text-color-dark font-weight-normal text-7 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200">Nos <strong class="font-weight-extra-bold">Médiateurs</strong> en Régions</h2>
                        </div>
                    </div>
                </div>
                <?php
                $data_region = [];
                foreach ($regions as $key => $region) {
                $region_mediatores = regionData($key);
                if ($region_mediatores) {
                //dd($region_mediatores);die;
                $data_region[] = $key;
                ?>
                    <div class="row mb-2 pb-2">
                        <div class="col">
                            <p class="custom-font-secondary text-4 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                                {{$region}}
                            </p>
                        </div>
                    </div>
                    <div class="row row-gutter-sm">
                    <?php foreach ($region_mediatores as $mediator) {?>
                            <div class="col-md-6 col-lg-4 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
                                <a href="#" class="text-decoration-none">
                                    <div class="card custom-card-style-1">
                                        <div class="card-body text-center py-5">
                                            <div class="custom-card-style-1-image-wrapper bg-primary rounded-circle d-inline-block mb-3">
                                                <img src="{{ asset('assets/profile/'.$mediator->profile) }}" class="img-fluid rounded-circle" alt="" />
                                            </div>
                                            <h4 class="custom-card-style-1-title text-color-secondary font-weight-bold mb-2">{{$mediator->first_name.' '.$mediator->last_name}}</h4>
                                            <p class="custom-card-style-1-description">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. </p>
                                            <span class="custom-card-style-1-link font-weight-bold">Contacter le médiateur</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                <?php  }
                } if (count($data_region) == 0){?>
                    <div class="col-md-12 col-lg-12 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
                        <h3 class="text-center">No Mediator registered.</h3>
                    </div>
                <?php } ?>
            </div>
        </section>

        <section class="section section-with-shape-divider section-height-3 bg-tertiary border-0 m-0">
            <div class="shape-divider" style="height: 116px;">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 116" preserveAspectRatio="xMinYMin">
                    <path class="custom-svg-fill-color-tertiary-darken" d="M0,24c2.86,0.42,7.41,1.1,13,2c6.13,0.98,10.67,1.77,12,2c11.67,2.01,42.24,7.05,68,11
								c7.79,1.2,22.72,3.48,41,6c20.75,2.86,38.83,5.06,74,9c41.19,4.61,62.09,6.95,93,10c57.4,5.66,101.17,9.03,114,10
								c9.13,0.69,40.29,3.02,109,7c48.33,2.8,87.04,5.04,132,7c76.86,3.35,135.02,4.27,184,5c104.27,1.56,187.39,0.71,234,0
								c21.92-0.34,91.62-1.5,183-5c50.62-1.94,106.43-4.12,181-9c57.01-3.73,108.05-7.94,152-12c94.91-8.78,162.37-17.44,182-20
								c41.76-5.45,72.06-10.09,96-14c21.23-3.47,39.04-6.63,52-9c0-11.67,0-23.33,0-35C1279-11,638-11-3-11C-2,0.67-1,12.33,0,24z"/>
                    <path fill="#F7F7F7" d="M-7,23c1.59,0.23,4.03,0.58,7,1c82.06,11.6,145.17,16.35,182,19c244.62,17.62,377,23,377,23
								c157.86,6.42,277.64,7.71,308,8c75.8,0.73,232.89,1.31,438-6c0,0,137.72-4.66,358-19c42.98-2.8,104.01-7.03,183-16
								c33.26-3.78,60.85-7.38,80-10c0-9.01,0-18.01,0-27.02c-644,0-1288,0-1932,0C-6.33,4.99-6.67,13.99-7,23z"/>
                </svg>
            </div>
            <div class="container pt-4 pb-3 mt-5">
                <div class="row align-items-center justify-content-center pt-3">
                    <div class="col-md-9 col-lg-7 col-xl-9 text-center text-xl-start mb-4 mb-xl-0">
                        <h2 class="text-color-light font-weight-medium line-height-4 text-9 negative-ls-1 mb-2">Inscrivez-vous en tant <span class="font-weight-extra-bold custom-highlight-1 p-1 appear-animation" data-appear-animation="customHighlightAnim" data-appear-animation-delay="300">Que Médiateur</span> .</h2>
                        <p class="custom-font-secondary custom-font-size-1 font-weight-light text-color-light opacity-8 mb-0">Inscrivez-vous sur notre site web !</p>
                    </div>
                    <div class="col-xl-3 text-center text-xl-end">
                        <div class="position-relative">
                            <a href="javascript:void(0)" class="btn btn-secondary btn-modern font-weight-bold text-3 btn-px-4 py-3">LE RECRUTEMENT DE MÉDIATEUR</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <div class="container appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
        <div class="row pt-5 pb-4 my-5">
            <div class="col-md-6 order-2 order-md-1 text-center text-md-start">
                <div class="owl-carousel owl-theme nav-style-1 nav-center-images-only stage-margin mb-0" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 2}, '1200': {'items': 2}}, 'margin': 25, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
                    <div>
                        <img class="img-fluid rounded-0 mb-4" src="{{ asset('assets/frontend/') }}/img/team/team-1.jpg" alt="" />
                        <h3 class="font-weight-bold text-color-dark text-4 mb-0">Activité 1</h3>
                        <p class="text-2 mb-0">Martinique</p>
                    </div>
                    <div>
                        <img class="img-fluid rounded-0 mb-4" src="{{ asset('assets/frontend/') }}/img/team/team-2.jpg" alt="" />
                        <h3 class="font-weight-bold text-color-dark text-4 mb-0">Activité 2</h3>
                        <p class="text-2 mb-0">Guadeloupe</p>
                    </div>
                    <div>
                        <img class="img-fluid rounded-0 mb-4" src="{{ asset('assets/frontend/') }}/img/team/team-3.jpg" alt="" />
                        <h3 class="font-weight-bold text-color-dark text-4 mb-0">Activité 3</h3>
                        <p class="text-2 mb-0">Martinique</p>
                    </div>
                    <div>
                        <img class="img-fluid rounded-0 mb-4" src="{{ asset('assets/frontend/') }}/img/team/team-4.jpg" alt="" />
                        <h3 class="font-weight-bold text-color-dark text-4 mb-0">Activité 4</h3>
                        <p class="text-2 mb-0">Occitanie</p>
                    </div>
                    <div>
                        <img class="img-fluid rounded-0 mb-4" src="{{ asset('assets/frontend/') }}/img/team/team-5.jpg" alt="" />
                        <h3 class="font-weight-bold text-color-dark text-4 mb-0">Activité 5</h3>
                        <p class="text-2 mb-0">DESIGNER</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 order-1 order-md-2 text-center text-md-start mb-5 mb-md-0">
                <h2 class="text-color-dark font-weight-normal text-6 mb-2 pb-1">L’agenda des <strong class="font-weight-extra-bold">Médiateurs</strong></h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit massa enim. Nullam id varius nunc.</p>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna ex, et faucibus lacus venenatis eget.</p>
            </div>
        </div>
    </div>

    <section class="section border-0 pb-0 pb-lg-5 m-0">
        <div class="container mt-lg-4 pb-3">
            <div class="row">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-2">
                        <span class="custom-line appear-animation" data-appear-animation="customLineAnimation" appear-animation-duration="1s"></span>
                        <div class="overflow-hidden ms-3">
                            <h2 class="text-color-primary font-weight-semibold line-height-3 text-4 mb-0 appear-animation" data-appear-animation="maskRight" data-appear-animation-delay="1000">SERVICES</h2>
                        </div>
                    </div>
                    <h3 class="text-color-secondary font-weight-bold text-transform-none text-8 mb-3 pb-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">Nos Prestations</h3>
                    <p class="mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
                </div>
            </div>
            <div class="row align-items-center justify-content-center mb-4">
                <div class="col-lg-7 pe-lg-5 mb-5 mb-lg-0">
                    <div class="accordion custom-accordion-style-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1600" id="accordion1">
                        <div class="card card-default">
                            <div class="card-header" id="collapse1HeadingOne">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapse1One" aria-expanded="false" aria-controls="collapse1One">
                                        1 - Médiation conventionnelle (en présentielle ou en distancielle via ZOOM)
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1One" class="collapse" aria-labelledby="collapse1HeadingOne" data-bs-parent="#accordion1">
                                <div class="card-body">
                                    <p class="mb-0">Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header" id="collapse1HeadingTwo">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapse1Two" aria-expanded="false" aria-controls="collapse1Two">
                                        2 - Médiation judiciaire
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1Two" class="collapse" aria-labelledby="collapse1HeadingTwo" data-bs-parent="#accordion1">
                                <div class="card-body">
                                    <p class="mb-0">Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 col-lg-5 ps-sm-5">
                    <div class="position-relative">
                        <div data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.2, 'transition': true, 'transitionDuration': 1000, 'isInsideSVG': true}">
                            <img src="{{ asset('assets/frontend/') }}/img/MediationTraining.jpg" class="img-fluid rounded-circle custom-box-shadow-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200" alt="" />
                        </div>
                        <div class="position-absolute top-50pct left-50pct transform3dxy-n50" style="left: 25%;">
                            <!-- <div data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.3, 'transition': true, 'transitionDuration': 1000, 'isInsideSVG': true}">
                                <img src="{{ asset('assets/frontend/') }}/img/MediationTraining2.jpgs" class="img-fluid rounded-circle custom-box-shadow-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400" alt="" />
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
