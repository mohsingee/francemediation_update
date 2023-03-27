<div class="card">
    <h5 class="pb-1 mb-4">{{ $course->categories->title.' / '.$course->sub_cat->title}}</h5>
    <div class="row clearfix">
        @foreach ($data as $item)
        <div class="col-md-4">
            <div class="blogitem mb-5">
                <div class="blogitem-image">
                    <a href="{{ route('user-course.show',$item->id) }}"><img src="{{ asset('assets/courses/'.$item->image) }}" alt="blog image"></a>
                </div>
                <div class="blogitem-content">
                    <div class="blogitem-header">
                        <div class="blogitem-meta">
                            <span><i class="zmdi zmdi-account"></i>By {{ $item->instruct->first_name }}</span>
                            <span><i class="zmdi zmdi-money"></i>{{ $item->price }}</span>
                        </div>
                    </div>
                    <h5><a href="{{ route('user-course.show',$item->id) }}">{{ $item->title }}</a></h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>