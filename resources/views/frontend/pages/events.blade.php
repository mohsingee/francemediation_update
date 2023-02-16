@extends('frontend.layouts.app')
@section('title','Event PAGE')
@section('main-content')
    <div role="main" class="main">
        <section class="page-header page-header-classic page-header-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                        <h1 data-title-border>Nouvelles</h1>
                    </div>
                    <div class="col-md-4 order-1 order-md-2 align-self-center">
                        <ul class="breadcrumb d-block text-md-end">
                            <li><a href="{{url('/')}}">Accueil</a></li>
                            <li class="active">Nouvelles</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <div class="container pb-1">

            <div class="row pt-4">
                <div class="col">
                    <div class="overflow-hidden mb-3">
                        <h2 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
                            <span>Un mot du</span>
                            <span class="word-rotator-words bg-primary">
										<b class="is-visible">Président </b>
										<b>PDG </b>
										<b>Fondateur</b>
									</span>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-lg-10">
                    <div class="overflow-hidden">
                        <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="250">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non <span class="alternative-font">metus.</span> pulvinar. Sociis natoque penatibus et magnis dis parturient montes.
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="450">
                    <a href="#" class="btn btn-modern btn-primary mt-1">Rejoignez notre équipe!</a>
                </div>
            </div>
        </div>
        <section class="section section-default border-0 my-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="750">
            <div class="container py-4">

                <div class="row align-items-center">
                    <div class="col-md-6 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1000">
                        <div class="owl-carousel owl-theme nav-inside mb-0" data-plugin-options="{'items': 1, 'margin': 10, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 6000, 'loop': true}">
                            <div>
                                <img alt="" class="img-fluid" src="{{ asset('assets/frontend/') }}/img/generic/generic-corporate-3-2-full.jpg">
                            </div>
                            <div>
                                <img alt="" class="img-fluid" src="{{ asset('assets/frontend/') }}/img/generic/generic-corporate-3-3-full.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="overflow-hidden mb-2">
                            <h2 class="text-color-dark font-weight-normal text-7 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200">Notre <strong class="font-weight-extra-bold">Histoire</strong></h2>
                        </div>
                        <p class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam <a href="#">vehicula</a> sit amet enim ac sagittis. Curabitur eget leo varius, elementum mauris eget, egestas quam. Donec ante risus, dapibus sed lectus non, lacinia vestibulum nisi. Morbi vitae augue quam. Nullam ac laoreet libero.</p>
                        <p class="mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1600">Consectetur adipiscing elit. Aliquam iaculis sit amet enim ac sagittis. Curabitur eget leo varius, elementum mauris eget, egestas quam.</p>
                    </div>
                </div>

            </div>
        </section>

        <div class="container">

            <div class="row mt-5 py-3">
                <div class="col-md-6">
                    <div class="toggle toggle-primary toggle-simple m-0" data-plugin-toggle>
                        <section class="toggle active mt-0">
                            <a class="toggle-title">Objectifs</a>
                            <div class="toggle-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. Etiam nec viverra arcu. Morbi vitae augue quam. Nullam ac laoreet libero.</p>
                            </div>
                        </section>
                        <section class="toggle">
                            <a class="toggle-title">Équipe Pédagogique</a>
                            <div class="toggle-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Nullam tortor nunc, bibendum vitae semper a, volutpat eget massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer fringilla, orci sit amet posuere auctor.</p>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="progress-bars">
                        <div class="progress-label">
                            <span class="text-1">Formations</span>
                        </div>
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-primary" data-appear-progress-animation="100%">
                                <span class="progress-bar-tooltip">100%</span>
                            </div>
                        </div>
                        <div class="progress-label">
                            <span class="text-1">Services de Médiation</span>
                        </div>
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-primary" data-appear-progress-animation="99%" data-appear-animation-delay="300">
                                <span class="progress-bar-tooltip">99%</span>
                            </div>
                        </div>
                        <div class="progress-label">
                            <span class="text-1">Nos certifications</span>
                        </div>
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-primary" data-appear-progress-animation="95%" data-appear-animation-delay="600">
                                <span class="progress-bar-tooltip">95%</span>
                            </div>
                        </div>
                        <div class="progress-label">
                            <span class="text-1">Nos Partenaires </span>
                        </div>
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-primary" data-appear-progress-animation="97%" data-appear-animation-delay="900">
                                <span class="progress-bar-tooltip">97%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col py-4">
                    <hr class="solid">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mx-md-auto text-center">

                    <h2 class="text-color-dark font-weight-normal text-7 mb-0 pt-2">Our <strong class="font-weight-extra-bold">History</strong></h2>
                    <p>How we started, lorem ipsum dolor sit amet, consectetur adipiscing elit ac laoreet libero.</p>

                    <section class="timeline" id="timeline">
                        <div class="timeline-body">
                            <div class="timeline-date">
                                <h3 class="text-primary font-weight-bold">2022</h3>
                            </div>

                            <article class="timeline-box left text-start appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="200">
                                <div class="timeline-box-arrow"></div>
                                <div class="p-2">
                                    <img alt="" class="img-fluid" src="{{ asset('assets/frontend/') }}/img/history/history-3.jpg" />
                                    <h3 class="font-weight-bold text-3 mt-3 mb-1">New Office</h3>
                                    <p class="mb-0 text-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante.</p>
                                </div>
                            </article>

                            <div class="timeline-date">
                                <h3 class="text-primary font-weight-bold">2012</h3>
                            </div>

                            <article class="timeline-box right text-start appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="400">
                                <div class="timeline-box-arrow"></div>
                                <div class="p-2">
                                    <img alt="" class="img-fluid" src="{{ asset('assets/frontend/') }}/img/history/history-2.jpg" />
                                    <h3 class="font-weight-bold text-3 mt-3 mb-1">New Partners</h3>
                                    <p class="mb-0 text-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat.</p>
                                </div>
                            </article>

                            <div class="timeline-date">
                                <h3 class="text-primary font-weight-bold">2006</h3>
                            </div>

                            <article class="timeline-box left text-start appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="600">
                                <div class="timeline-box-arrow"></div>
                                <div class="p-2">
                                    <img alt="" class="img-fluid" src="{{ asset('assets/frontend/') }}/img/history/history-1.jpg" />
                                    <h3 class="font-weight-bold text-3 mt-3 mb-1">Foundation</h3>
                                    <p class="mb-0 text-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel consequat, ante.</p>
                                </div>
                            </article>
                        </div>
                    </section>

                </div>
            </div> -->

        </div>

        <section class="section section-default border-0 my-5">
            <div class="container py-4">

                <div class="row">
                    <div class="col pb-4 text-center">
                        <h2 class="text-color-dark font-weight-normal text-7 mb-0 pt-2">Actualité <strong class="font-weight-extra-bold">de la Médiation</strong></h2>
                        <p>Rockstars lorem ipsum dolor sit amet, consectetur adipiscing elit ac laoreet libero.</p>
                    </div>
                </div>
                <div class="row pb-4 mb-2">
                    <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
								<span class="thumb-info thumb-info-hide-wrapper-bg bg-transparent border-radius-0">
									<span class="thumb-info-wrapper border-radius-0">
										<a href="about-me.html">
											<img src="{{ asset('assets/frontend/') }}/img/team/team-1.jpg" class="img-fluid border-radius-0" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">Article premier</span>
												<span class="thumb-info-type">Julia</span>
											</span>
										</a>
									</span>
									<span class="thumb-info-caption">
										<span class="thumb-info-caption-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula mi, non suscipitaccumsan</span>

									</span>
								</span>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
								<span class="thumb-info thumb-info-hide-wrapper-bg bg-transparent border-radius-0">
									<span class="thumb-info-wrapper border-radius-0">
										<a href="about-me.html">
											<img src="{{ asset('assets/frontend/') }}/img/team/team-2.jpg" class="img-fluid border-radius-0" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">Article deuxième</span>
												<span class="thumb-info-type">Martine</span>
											</span>
										</a>
									</span>
									<span class="thumb-info-caption">
										<span class="thumb-info-caption-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula mi, non suscipitaccumsan</span>

									</span>
								</span>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4 mb-sm-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
								<span class="thumb-info thumb-info-hide-wrapper-bg bg-transparent border-radius-0">
									<span class="thumb-info-wrapper border-radius-0">
										<a href="about-me.html">
											<img src="{{ asset('assets/frontend/') }}/img/team/team-3.jpg" class="img-fluid border-radius-0" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">Article Troisième</span>
												<span class="thumb-info-type">Jack</span>
											</span>
										</a>
									</span>
									<span class="thumb-info-caption">
										<span class="thumb-info-caption-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula mi, non suscipitaccumsan</span>

									</span>
								</span>
                    </div>
                    <div class="col-sm-6 col-lg-3 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="600">
								<span class="thumb-info thumb-info-hide-wrapper-bg bg-transparent border-radius-0">
									<span class="thumb-info-wrapper border-radius-0">
										<a href="about-me.html">
											<img src="{{ asset('assets/frontend/') }}/img/team/team-4.jpg" class="img-fluid border-radius-0" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">Quatrième Article</span>
												<span class="thumb-info-type">Josette</span>
											</span>
										</a>
									</span>
									<span class="thumb-info-caption">
										<span class="thumb-info-caption-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula mi, non suscipitaccumsan</span>

									</span>
								</span>
                    </div>
                </div>
            </div>
        </section>

        <div class="container pb-2 mb-5">
            <div class="row justify-content-center pb-2 mb-3">
                <div class="col-md-9 col-lg-12 text-center">
                    <h2 class="text-color-dark font-weight-bold line-height-6 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">Événements à Venir</h2>
                    <p class="custom-font-secondary text-4 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultri.</p>
                </div>
            </div>
            <div class="row appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
                <div class="col">
                    <div class="owl-carousel nav-outside nav-arrows-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 3}, '1199': {'items': 3}}, 'autoplay': false, 'autoplayTimeout': 5000, 'autoplayHoverPause': true, 'dots': false, 'nav': true, 'loop': false, 'margin': 20, 'stagePadding': '75'}">
                        <div>
                            <div class="card custom-card-style-1 custom-card-style-1-variation">
                                <div class="card-body text-center bg-color-light-scale-1 py-5">
                                    <h4 class="text-color-dark font-weight-bold line-height-1 text-8 mb-2">Séminaire Web</h4>
                                    <p class="custom-font-secondary text-4 mb-4">2/01/23</p>
                                    <p class="mb-0">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="card custom-card-style-1 custom-card-style-1-variation">
                                <div class="card-body text-center bg-color-light-scale-1 py-5">
                                    <h4 class="text-color-dark font-weight-bold line-height-1 text-8 mb-2">Webinar</h4>
                                    <p class="custom-font-secondary text-4 mb-4">25/01/23</p>
                                    <p class="mb-0">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="card custom-card-style-1 custom-card-style-1-variation">
                                <div class="card-body text-center bg-color-light-scale-1 py-5">
                                    <h4 class="text-color-dark font-weight-bold line-height-1 text-8 mb-2">Nouvelle formation</h4>
                                    <p class="custom-font-secondary text-4 mb-4">01/02/23</p>
                                    <p class="mb-0">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="card custom-card-style-1 custom-card-style-1-variation">
                                <div class="card-body text-center bg-color-light-scale-1 py-5">
                                    <h4 class="text-color-dark font-weight-bold line-height-1 text-8 mb-2">Cérémonie de certification</h4>
                                    <p class="custom-font-secondary text-4 mb-4">20/02/23</p>
                                    <p class="mb-0">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="section border-0 pt-4 pb-3 m-0">
            <div class="container">
                <div class="row align-items-end pb-3 mb-5 mb-lg-4">
                    <div class="col-lg-10 col-xl-10 mb-4 mb-lg-0">
                        <div class="d-flex align-items-center mb-2">
                            <span class="custom-line appear-animation" data-appear-animation="customLineAnimation" appear-animation-duration="1s"></span>
                            <div class="overflow-hidden ms-3">
                                <h2 class="text-color-primary font-weight-semibold line-height-3 text-4 mb-0 mt-4 appear-animation" data-appear-animation="maskRight" data-appear-animation-delay="1000">NOS PRESTATIONS</h2>
                            </div>

                        </div>
                        <h3 class="text-color-dark font-weight-bold text-transform-none text-8 mb-3 pb-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">Notre offre de Formation</h3>
                        <p class="mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400">Notre portail propose les modules de formation suivants.</p>
                        <p class="custom-font-secondary text-4 mb-4 mt-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">1) Présentielle </p>
                        <p class="custom-font-secondary text-4 mb-4 mt-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">2) Distancielle </p>
                    </div>
                    <div class="col-lg-2 col-xl-2">
                        <div class="d-flex justify-content-lg-end">
                            <!-- <a href="demo-cleaning-services-portfolio.html" class="btn btn-primary btn-modern font-weight-bold text-3 btn-px-4 py-3 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1800">NOTRE TRAVAIL</a>
                            <a href="demo-cleaning-services-contact.html" class="btn btn-secondary btn-modern font-weight-bold text-3 btn-px-4 py-3 ms-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1600">RÉSERVEZ MAINTENANT</a> -->
                        </div>
                    </div>
                </div>
                <div class="row appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="2000">
                    <div class="col">
                        <div class="owl-carousel nav-outside nav-arrows-1 custom-carousel-box-shadow-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 2}, '1199': {'items': 2}}, 'autoplay': false, 'autoplayTimeout': 5000, 'autoplayHoverPause': true, 'dots': false, 'nav': true, 'loop': false, 'margin': 20, 'stagePadding': '75'}">
                            <div>
                                <p class="custom-font-secondary text-4 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">Notre plate-forme de formation en ligne.</p>
                                <ul class="list list-icons list-icons-style-2 list-icons-lg custom-list-icons-icon-size pb-1 mb-0">
                                    <li class="font-weight-semibold text-color-dark mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900"><i class="fas fa-check text-color-dark border-color-grey-1 top-7"></i> Cours écris</li>
                                    <li class="font-weight-semibold text-color-dark mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100"><i class="fas fa-check text-color-dark border-color-grey-1 top-7"></i> Cours audio</li>
                                    <li class="font-weight-semibold text-color-dark mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100"><i class="fas fa-check text-color-dark border-color-grey-1 top-7"></i> Cours vidéo</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row py-5 my-5">
                <div class="col">

                    <div class="owl-carousel owl-theme mb-0" data-plugin-options="{'responsive': {'0': {'items': 1}, '476': {'items': 1}, '768': {'items': 5}, '992': {'items': 7}, '1200': {'items': 7}}, 'autoplay': true, 'autoplayTimeout': 3000, 'dots': false}">
                        <div>
                            <img class="img-fluid opacity-2" src="{{ asset('assets/frontend/') }}/img/logos/logo-1.png" alt="">
                        </div>
                        <div>
                            <img class="img-fluid opacity-2" src="{{ asset('assets/frontend/') }}/img/logos/logo-2.png" alt="">
                        </div>
                        <div>
                            <img class="img-fluid opacity-2" src="{{ asset('assets/frontend/') }}/img/logos/logo-3.png" alt="">
                        </div>
                        <div>
                            <img class="img-fluid opacity-2" src="{{ asset('assets/frontend/') }}/img/logos/logo-4.png" alt="">
                        </div>
                        <div>
                            <img class="img-fluid opacity-2" src="{{ asset('assets/frontend/') }}/img/logos/logo-5.png" alt="">
                        </div>
                        <div>
                            <img class="img-fluid opacity-2" src="{{ asset('assets/frontend/') }}/img/logos/logo-6.png" alt="">
                        </div>
                        <div>
                            <img class="img-fluid opacity-2" src="{{ asset('assets/frontend/') }}/img/logos/logo-4.png" alt="">
                        </div>
                        <div>
                            <img class="img-fluid opacity-2" src="{{ asset('assets/frontend/') }}/img/logos/logo-2.png" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <section class="section section-height-3 bg-color-grey-scale-1 m-0 border-0">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 pb-sm-4 pb-lg-0 pe-lg-5 mb-sm-5 mb-lg-0">
                    <h2 class="text-color-dark font-weight-normal text-6 mb-2">Nos <strong class="font-weight-extra-bold" style="background-image: linear-gradient(to right, #00adee, #29b4bb, #87c445);">Certifications</strong></h2>
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

@endsection
