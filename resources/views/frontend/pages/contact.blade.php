@extends('frontend.layouts.app')
@section('title','About us PAGE')
@section('main-content')
    <div role="main" class="main">

        <section class="page-header page-header-classic page-header-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                        <h1 data-title-border>Contact</h1>
                    </div>
                    <div class="col-md-4 order-1 order-md-2 align-self-center">
                        <ul class="breadcrumb d-block text-md-end">
                            <li><a href="{{url('/')}}">Accueil</a></li>
                            <li class="active">Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="section border-0 py-0 m-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row py-5 my-5">
                            <div class="col-md-6">
                                <h2 class="font-weight-bold text-color-secondary text-6 text-lg-5 text-xl-6 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">Prendre Contact</h2>
                                <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
                                    <h3 class="font-weight-bold text-color-secondary text-transform-none text-4 text-lg-3 mb-0">Demandes de Renseignements</h3>
                                    <a href="tel:+1234567890" class="d-inline-block text-color-default text-color-hover-primary text-decoration-none mb-4">(800) 123-4567</a>
                                </div>
                                <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">
                                    <h3 class="font-weight-bold text-color-secondary text-transform-none text-4 text-lg-3 mb-0">Formation</h3>
                                    <a href="tel:+1234567890" class="d-inline-block text-color-default text-color-hover-primary text-decoration-none mb-4">(800) 123-4567</a>
                                </div>
                                <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
                                    <h3 class="font-weight-bold text-color-secondary text-transform-none text-4 text-lg-3 mb-0">Heures</h3>
                                    <p>Mon - Sat 9:00am - 8:00pm<br> Sunday - CLOSED</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h2 class="font-weight-bold text-color-secondary text-6 text-lg-5 text-xl-6 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100">Post Address and Mail</h2>
                                <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300">
                                    <h3 class="font-weight-bold text-color-secondary text-transform-none text-4 text-lg-3 mb-0">Adresse</h3>
                                    <p>12345 Porto Blvd. <br>Suite 1500 <br>Paris, France 90000</p>
                                </div>
                                <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1500">
                                    <h3 class="font-weight-bold text-color-secondary text-transform-none text-4 text-lg-3 mb-0">Courriel</h3>
                                    <a href="mailto:mail@example.com" class="text-color-default text-color-hover-primary text-decoration-underline mb-4">mail@francemediationtousjours.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 fluid-col-lg-5 p-0">
                        <div class="fluid-col h-100">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.76457410633!2d2.2769947569434734!3d48.85894658150094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis%2C%20France!5e0!3m2!1sen!2s!4v1676286825387!5m2!1sen!2s" class="google-map h-100 m-0" style="min-height: 400px;" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container py-5 mt-5">
            <div class="row pb-2 mb-4">
                <div class="col">
                    <div class="d-flex align-items-center mb-2">
                        <span class="custom-line appear-animation" data-appear-animation="customLineAnimation" appear-animation-duration="1s"></span>
                        <div class="overflow-hidden ms-3">
                            <h2 class="text-color-primary font-weight-semibold line-height-3 text-4 mb-0 appear-animation" data-appear-animation="maskRight" data-appear-animation-delay="1000">CONTACTEZ-NOUS</h2>
                        </div>
                    </div>
                    <h3 class="text-color-secondary font-weight-bold text-transform-none line-height-2 text-8 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">Envoyez-nous un Message</h3>
                </div>
            </div>
            <div class="row pb-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400">
                <div class="col">
                    <form class="contact-form custom-form-style-1" action="#" method="POST">
                        <div class="contact-form-success alert alert-success d-none mt-4">
                            <strong>Success!</strong> Your message has been sent to us.
                        </div>

                        <div class="contact-form-error alert alert-danger d-none mt-4">
                            <strong>Error!</strong> There was an error sending your message.
                            <span class="mail-error-message text-1 d-block"></span>
                        </div>

                        <div class="row row-gutter-sm">
                            <div class="form-group col-lg-6 mb-4">
                                <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required placeholder="Votre Nom">
                            </div>
                            <div class="form-group col-lg-6 mb-4">
                                <input type="text" value="" data-msg-required="Please enter your phone number." maxlength="100" class="form-control" name="phone" id="phone" required placeholder="Votre Numéro">
                            </div>
                        </div>
                        <div class="row row-gutter-sm">
                            <div class="form-group col-lg-6 mb-4">
                                <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required placeholder="Votre E-mail ">
                            </div>
                            <div class="form-group col-lg-6 mb-4">
                                <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required placeholder="Sujet">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col mb-4">
                                <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message" required placeholder="Votre Message"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col mb-0">
                                <button type="submit" class="btn btn-primary btn-modern font-weight-bold text-3 px-5 py-3" data-loading-text="Loading...">ENVOYER LE MESSAGE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
