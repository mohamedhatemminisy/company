@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">{{trans('admin.companies')}} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('admin.home')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{trans('admin.companies')}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> {{trans('admin.companies')}} </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">

                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')
                            <div class="card-body">
                                <div class="tab-content">

                                    <div class="col form-group">
                                        <label>@lang('admin.name') </label>
                                        <p class="alert alert-info" style="background-color:rgb(26,60,119)">{{ $company->name  }}</p>
                                    </div>
                                    <div class="col form-group">
                                        <label>@lang('admin.phone') </label>
                                        <p class="alert alert-info" style="background-color:rgb(26,60,119)">{{ $company->phone  }}</p>
                                    </div>
                                    <div class="col form-group">
                                        <label>@lang('admin.city') </label>
                                        <p class="alert alert-info" style="background-color:rgb(26,60,119)">{{ $company->city->name  }}</p>
                                    </div>
                                    <div class="col form-group">
                                        <label>@lang('admin.area') </label>
                                        <p class="alert alert-info" style="background-color:rgb(26,60,119)">{{ $company->area->name  }}</p>
                                    </div>
                                    <div class="col form-group">
                                        <label>@lang('admin.categories') </label>
                                        @foreach($company -> categories as $category)
                                        <p class="alert alert-info" style="background-color:rgb(26,60,119)">{{$category -> name }}</p>
                                        @endforeach
                                    </div>
                                    @if($company->images)
                                    <div class="col form-group">
                                        <label>@lang('admin.images') </label>
                                        <div>
                                            @foreach($company->images as $image)
                                            <img style="width:200px;height:200px;padding:20px" src="{{asset($image->image)}}">

                                        <form id="delete-form-{{ $image->id }}" style="display: inline-table;" action="{{route('image.destroy',$image -> id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button"
                                             class="btn btn-sm btn-clean btn-icon" 
                                             title="@lang('admin.delete')" 
                                             onclick="confirmDelete('delete-form-{{ $image->id }}')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        @endforeach
                                        </div>
                                    </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>

@stop