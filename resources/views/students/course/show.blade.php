@extends('layouts.app')
@section('content')
@section('css')
<style>
    .bg-color{
        background-color:#c2c4c5;
    }
</style>
@endsection
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Search Courses</h2>
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {!! session()->get('success') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="card">
                        <div class="body">
                            <h5 class="card-title text-center">Course Info</h5>
                            <h5 class="card-title"><b>{{ $course->title }}</b></h5>
                            <div class="row">
                                <div class="col-6">
                                    Course Category:
                                </div>
                                <div class="col-6">
                                    {{ $course->categories->title }}
                                </div>
                                <div class="col-6 mt-2">
                                    Course Sub Category:
                                </div>
                                <div class="col-6 mt-2">
                                    {{ $course->sub_cat->title }}
                                </div>
                                <div class="col-6 mt-2">
                                    Course charges:
                                </div>
                                <div class="col-6 mt-2">
                                    ${{ $course->price }}
                                </div>
                                <div class="col-6 mt-2">
                                    Total Lectures:
                                </div>
                                <div class="col-6 mt-2">
                                    {{ count($course->lectures) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="blogitem mb-5">
                            <div class="blogitem-image">
                                <img src="{{ asset('assets/courses/'.$course->image) }}" alt="blog image">
                            </div>
                            <div class="blogitem-content">
                                <div class="blogitem-header">
                                    <div class="blogitem-meta">
                                        <span><i class="zmdi zmdi-account"></i>By {{ $course->instruct->first_name }}</span>
                                        <span><i class="zmdi zmdi-money"></i>{{ $course->price }}</span>
                                    </div>
                                </div>
                                <h5>{{ $course->title }}</h5>
                            </div>
                            <a href="{{ route('enroll-course.index',$course->id) }}" class="btn btn-md btn-danger text-center">Enroll</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                            <tr class="bg-secondary text-white">
                                <th>{{ $course->title }}</th>
                                <th>{{ count($course->lectures) }} Lectures</th>
                                <th>Duration</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($course->lectures as $lec)
                                <tr>
                                    @if(empty($lec->file))
                                    <td colspan="2"><i class="zmdi zmdi-videocam"></i> {{ $lec->title }}</td>
                                    <td>{{ $lec->duration }}</td>
                                    @else
                                    <td colspan="2"><i class="zmdi zmdi-file"></i> {{ $lec->title }}</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection