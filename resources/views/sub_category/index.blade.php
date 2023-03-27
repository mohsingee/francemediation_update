@extends('layouts.app')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Sub Categories</h2>
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
                                            <th>Title</th>
                                            <th>Category Title</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Category Title</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($sub_category as $key=>$sub_cate)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $sub_cate->title }}</td>
                                            <td>{{ $sub_cate->categories->title }}</td>
                                            <td>
                                                @if($sub_cate->status == 0)
                                                    <span class="tag badge badge-success">Active</span>
                                                @else
                                                    <span class="tag badge badge-warning">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('sub_categories.edit',$sub_cate->id) }}"><i class="zmdi zmdi-hc-fw"></i></a>
                                                <a href="javascript:void(0)" class="delete_btn" data-url="sub_categories"
                                                data-id="{{ $sub_cate->id }}"><i class="zmdi zmdi-hc-fw"></i></a>
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