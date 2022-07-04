@extends('layouts.app')
@section('title')
@lang('admin.companies')
@endsection
@section('content')

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>{{trans('admin.companies')}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Banner Ends Here -->


<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="all-blog-posts">
                    <div class="row">
                        @foreach($data as $key =>$value)
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
                        @endforeach
                        <div class="col-lg-12">
                            {{ $data->links('vendor.pagination.custom') }}

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection