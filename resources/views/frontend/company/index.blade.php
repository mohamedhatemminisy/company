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
                        @include('frontend.components.company-card')
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