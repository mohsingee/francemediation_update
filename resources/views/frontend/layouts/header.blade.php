<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 85}">
    <div class="header-body header-body-bottom-border border-top-0">
        <div class="header-top header-top-bottom-containered-border pt-2">
            <div class="container">
                <div class="header-row">
                    <div class="header-column justify-content-start">
                        <div class="header-row">
                            <ul class="header-social-icons social-icons social-icons-clean social-icons-medium position-relative right-7 d-none d-md-block ms-0">
                                <li class="social-icons-instagram"><a href="#" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                <li class="social-icons-twitter"><a href="#" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li class="social-icons-facebook"><a href="#" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            </ul>
                            <ul class="nav nav-pills position-relative bottom-1 ms-md-3">
                                <li class="nav-item">
                                    <span class="d-flex align-items-center ws-nowrap text-color-secondary font-weight-medium text-3"><i class="icon-clock icons text-3 top-3 left-1 me-2 text-color-secondary font-weight-bold"></i>Mon - Sat 9:00am - 6:00pm</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <a href="{{route('page.mediator')}}" class="custom-header-top-btn-style-1 btn btn-secondary font-weight-bold px-4 px-sm-5 py-3">REGISTER NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="demo-cleaning-services.html">
                                <img src="{{ asset('assets/frontend/img/FM-Logo.png') }}" class="img-fluid" width="253" height="92" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-links">
                            <div class="header-nav-main header-nav-main-text-capitalize header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li><a href="{{url('/')}}" class="{{ request()->is('/') ? 'active' : '' }} nav-link">Accueil</a></li>
                                        <li><a href="{{url('a-propos-de')}}" class="{{ request()->is('a-propos-de') ? 'active' : '' }} nav-link">À propos de</a></li>
                                        <li><a href="{{url('formation')}}" class="{{ request()->is('formation') ? 'active' : '' }} nav-link">Formation</a></li>
                                        <li><a href="{{url('nouvelles')}}" class="{{ request()->is('nouvelles') ? 'active' : '' }} nav-link">Nouvelles</a></li>
                                        <li><a href="{{url('mediation')}}" class="{{ request()->is('mediation') ? 'active' : '' }} nav-link">Mediation</a></li>
                                        <li><a href="{{url('blogue')}}" class="{{ request()->is('blogue') ? 'active' : '' }} nav-link">Blogue</a></li>
                                        <li><a href="{{url('contact')}}" class="{{ request()->is('contact') ? 'active' : '' }} nav-link">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
