@extends('layouts.app')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Madiator</h2>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Region</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Region</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($users as $key=>$user)
                                        @php $regions = array (
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
                                        @endphp
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $regions[$user->region] }}</td>
                                            <td>
                                                @if($user->status ==1)
                                                    <span class="tag badge badge-success">Active</span>
                                                @else
                                                    <span class="tag badge badge-warning">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('mediator.edit',$user->id) }}"><i class="zmdi zmdi-hc-fw"></i></a>
                                                <a href="{{ route('mediator.show',$user->id) }}"><i class="zmdi zmdi-hc-fw"></i></a>
                                                <a href="{{ route('mediator.destroy',$user->id) }}"><i class="zmdi zmdi-hc-fw"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection