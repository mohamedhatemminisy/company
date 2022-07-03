<div class="col-lg-4">
    <div class="blog-post">
        <div class="blog-thumb">
            @foreach($value->images as $image)
            @if ($loop->first)
            <img src="{{asset($image->image)}}" alt="{{$value->name}}">
            @endif
            @endforeach
        </div>
        <div class="down-content">
            <a href="{{route('company.show',$value->id)}}">
                <h4>{{$value->name}}</h4>
            </a>
            <ul class="post-infos">
                <li>@lang('admin.city') : {{ $value->city->name }}</li>
                <li>@lang('admin.area') : {{ $value->area->name }}</li>
                <li>@lang('admin.phone') : {{$value->phone}}</li>
            </ul>
        </div>
    </div>
</div>