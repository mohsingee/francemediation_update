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
                    <h2>Total {{ count($course->lectures) }} Lectures</h2>
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
                <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <table class="table table-borderless">
                            <thead>
                            <tr class="bg-secondary text-white">
                                <th>{{ $course->title }}</th>
                                <th>Duration</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($course->lectures as $lecture)
                                <tr @if($tutorial->id == $lecture->id) class="bg-success text-white" @endif>
                                    @if(empty($lecture->file))
                                        <td>
                                            <a @if($tutorial->id == $lecture->id) class="text-white" @endif href="{{ route('enroll-course.show',$lecture->id) }}">
                                                <i class="zmdi zmdi-videocam"></i> {{ $lecture->title }}
                                            </a>
                                        </td>
                                        <td>{{ $lecture->duration }}</td>
                                    @else
                                        <td colspan="2">
                                            <a href="{{ route('enroll-course.show',$lecture->id) }}">
                                                <i class="zmdi zmdi-file"></i> {{ $lecture->title }}
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="card">
                        <div class="body">
                            @if($tutorial->file)
                            <h1>this is file</h1>
                            @elseif($tutorial->youtube_link)
                            <iframe width="600" height="315"
                                src="{{ $tutorial->youtube_link }}">
                            </iframe>
                            @else
                                Vimeo
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
@endsection