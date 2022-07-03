@extends('layouts.app')
@section('title')
{{$company->name}}
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
                        <h4>{{$company->name}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="all-blog-posts">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <!-- Banner Starts Here -->
                                    <div class="main-banner header-text">
                                        <div class="container-fluid">
                                            <div class="owl-banner owl-carousel">
                                                @foreach($company->images as $image)
                                                <div class="item">
                                                    <img src="{{asset($image->image)}}" alt="{{$company->name}}">
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Banner Ends Here -->
                                </div>
                                <div class="down-content">
                                    <span>@lang('admin.company') : {{$company->name}}</span>
                                    <a href="post-details.html">
                                        <h4>@lang('admin.city') : {{$company->city->name}}</h4>
                                        <h4>@lang('admin.area') : {{$company->area->name}}</h4>
                                    </a>
                                    <h5>@lang('admin.categories')</h5>
                                    <ul class="post-info">
                                        @foreach($company->categories as $cat)
                                        <li>{{$cat->name}}</li>
                                        @endforeach </ul>


                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection