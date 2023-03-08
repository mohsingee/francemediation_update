@extends('layouts.app')
@section('content')
<!-- Responsive Table -->
<div class="container-xxl flex-grow-1 container-p-y">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {!! session()->get('success') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7">
                <div class="card">
                    <div class="card-body">
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
            <div class="col-lg-5 col-md-5">
                <div class="card">
                    <img src="{{ asset('assets/courses/'.$course->image) }}" class="card-img-top"/>
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="card-title text-center"><b>${{ $course->price }}</b></h5>
                            <button class="btn btn-md btn-danger">Enroll</button>
                        </div>
                        <h5 class="card-title">{{ $course->title }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!--/ Responsive Table -->
@endsection