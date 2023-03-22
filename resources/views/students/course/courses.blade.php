<div class="card">
    <div class="body">
        <h5 class="pb-1 mb-4">{{ $course->categories->title.' / '.$course->sub_cat->title}}</h5>
        <div class="row clearfix">
            @foreach ($data as $item)
            <div class="col-lg-3 col-md-4">
                <div class="card">
                    <a href="{{ route('user-course.show',$item->id) }}">
                        <img src="{{ asset('assets/courses/'.$item->image) }}" class="card-img-top"/>
                        <div class="card-body">
                            <p class="card-text">
                            {{ $item->instruct->first_name.' '.$item->instruct->last_name }}
                            </p>
                            <h5 class="card-title">{{ $item->title }}</h5>
                            Price: {{ $item->price }}
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>