@include('layouts.header')
<!-- BEGIN .main-heading -->
<header class="main-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="page-icon">
                    <i class="icon-users"></i>
                </div>
                <div class="page-title">
                    <h3>Mediator</h3>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                <div class="daterange-container">
                    <a data-toggle="tooltip" class="btn btn-primary btn-sm btn-create"
                       href="{{ route('mediator.index') }}"><i class="icon-eye"></i> List</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END: .main-heading -->
<!-- BEGIN .main-content -->

<div class="main-content">
    <div class="card">
        <div class="card-body">
            <div class="row gutters" >
{{--                @if (isset($user))--}}
{{--                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">--}}
{{--                        <div class="form-group">--}}
{{--                            <!-- Gallery start -->--}}
{{--                            <div class="baguetteBoxThree gallery">--}}
{{--                                <!-- Row start -->--}}
{{--                                <div class="row gutters" id="selectedImage">--}}
{{--                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">--}}
{{--                                        @if ($user->image != '')--}}
{{--                                            <a href="{{ asset('assets/images/' . $user->image) }}" style="width: 186px; height: 186px;">--}}
{{--                                                <img src="{{ asset('assets/images/' . $user->image) }}"--}}
{{--                                                     class="img-responsive">--}}
{{--                                                <div class="overlay">--}}
{{--                                                    <span class="expand">+</span>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        @else--}}

{{--                                            <a href="{{ asset('assets/images/user.png') }}">--}}
{{--                                                <img src="{{ asset('assets/images/user.png') }}" class="img-responsive" />--}}
{{--                                                <div class="overlay">--}}
{{--                                                    <span class="expand">+</span>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
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
                <?php foreach ($columns as $u){?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php
                        if($u == 'status'){
                            if ($user[$u] == 0) {
                                $val= 'InActive';
                            } else {
                                $val= 'Active';
                            }

                        } elseif ($u == 'region'){
                            $val= $user[$u];
                            $val = $regions[$val];
                        }
                        else {
                            $val = $user[$u];
                        }
                       ?>
                        <p><strong>{{strtoupper(str_replace('_',' ', $u))}}:</strong> {{$val}}</p>
                    </div>
                <?php } ?>
        </div>
    </div>
</div>
<!-- END: .main-content -->
@include('layouts.footer')

