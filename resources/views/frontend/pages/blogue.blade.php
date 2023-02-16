@extends('frontend.layouts.app')
@section('title','Blogs PAGE')
@section('main-content')
    <div role="main" class="main">
        <section class="page-header page-header-classic page-header-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                        <h1 data-title-border>Blogue</h1>
                    </div>
                    <div class="col-md-4 order-1 order-md-2 align-self-center">
                        <ul class="breadcrumb d-block text-md-end">
                            <li><a href="{{url('/')}}">Accueil</a></li>
                            <li class="active">Blogue</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="section position-relative border-0 m-0">
            <div class="container py-4">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1600">
                        @forelse($blogs as $blog)
                        <article class="mb-5">
                            <div class="card border-0 border-radius-0 box-shadow-1">
                                <div class="card-body p-3 z-index-1">
                                    <a href="javascript:void(0)">
                                        <img class="card-img-top border-radius-0 mb-2" src="{{ asset('assets/blogs/'.$blog->thumbnail_img) }}" alt="Card Image">
                                    </a>
                                    <p class="text-uppercase text-color-default text-1 my-2">
                                        <time pubdate datetime="2022-01-10">{{ date('m-d-Y', strtotime($blog->created_at))}}</time>
                                        <span class="opacity-3 d-inline-block px-2">|</span>
                                        {{ $blog->author }}
                                    </p>
                                    <div class="card-body p-0">
                                        <h4 class="card-title text-5 font-weight-bold pb-1 mb-2"><a class="text-color-dark text-color-hover-primary text-decoration-none" href="#">{{ $blog->title }}</a></h4>
                                        <p class="card-text mb-2">{{ $blog->short_description }}</p>
                                        <a href="#" class="btn btn-link font-weight-semibold text-decoration-none text-3 ps-0">LIRE PLUS</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @empty
                        <article class="mb-5">
                            <div class="card border-0 border-radius-0 box-shadow-1">
                                <div class="card-body p-3 z-index-1">
                                    <p class="text-uppercase text-color-default text-1 my-2">
                                        No Records found.
                                    </p>
                                </div>
                            </div>
                        </article>
                        @endforelse
                        <ul class="custom-pagination-style-3 pagination pagination-rounded pagination-md justify-content-center">
                            {!! $blogs->links() !!}
                        </ul>
                    </div>
                    <div class="blog-sidebar col-lg-4 pt-4 pt-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1800">
                        <aside class="sidebar">
                            <div class="px-3 mb-4">
                                <h3 class="text-color-quaternary text-capitalize font-weight-bold text-5 m-0 mb-3">À propos de ce Blog</h3>
                                <p class="m-0">Lorem ipsum dolor sit amet, conse elit porta. Vestibulum ante justo, volutpat quis porta diam.</p>
                            </div>
                            <div class="py-1 clearfix">
                                <hr class="my-2">
                            </div>
                            <div class="px-3 mt-4">
                                <form action="page-search-results.html" method="get">
                                    <div class="input-group mb-3 pb-1">
                                        <input class="form-control box-shadow-none text-1 border-0 bg-color-grey" placeholder="Search..." name="s" id="s" type="text">
                                        <button type="submit" class="btn bg-color-grey text-1 p-2"><i class="fas fa-search m-2"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="py-1 clearfix">
                                <hr class="my-2">
                            </div>
                            <div class="px-3 mt-4">

                            </div>

                            <div class="px-3 mt-4">

                            </div>

                            <div class="px-3 mt-4">

                            </div>
                        </aside>
                    </div>
                </div>
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
                        <h2 class="text-color-light font-weight-medium line-height-4 text-9 negative-ls-1 mb-2">Inscrivez-vous en tant <span class="font-weight-extra-bold custom-highlight-1 p-1 appear-animation" data-appear-animation="customHighlightAnim" data-appear-animation-delay="300">Que Médiateur</span> </h2>
                        <p class="custom-font-secondary custom-font-size-1 font-weight-light text-color-light opacity-8 mb-0">Inscrivez-vous sur notre site web!</p>
                    </div>
                    <div class="col-xl-3 text-center text-xl-end">
                        <div class="position-relative">
                            <a href="{{route('page.mediator')}}" class="btn btn-secondary btn-modern font-weight-bold text-3 btn-px-4 py-3">LE RECRUTEMENT DE MÉDIATEUR</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
