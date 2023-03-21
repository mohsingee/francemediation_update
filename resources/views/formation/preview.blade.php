@extends('layouts.app')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Formation</h2>
                    @if ($errors->any())
                        <div class="validation error">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true" id="cross">×</span></button>
                            <i class="icon-warning2"></i><strong>Oh snap!</strong><br>
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br />
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
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
            </div>
        </div>
    </div>
</section>
@endsection

