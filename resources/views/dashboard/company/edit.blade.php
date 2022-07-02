@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"> {{trans('admin.home')}} </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('companies.index')}}"> {{trans('admin.companies')}}
                                </a>
                            </li>
                            <li class="breadcrumb-item active"> {{trans('admin.edit')}} - {{$company -> name}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> {{trans('admin.edit')}} - {{$company -> name}} </h4>
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
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{route('companies.update',$company -> id)}}" method="POST" enctype="multipart/form-data">
                                        {{ method_field('PUT') }}
                                        @csrf
                                        <input name="id" value="{{$company -> id}}" type="hidden">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="projectinput1">{{trans('admin.name')}}
                                                            </label>
                                                            <input type="text" id="name" class="form-control" placeholder="  " value="{{old('name',$company->name )}}" name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="categories"> @lang('admin.select_category')
                                                            </label>
                                                            <select name="categories[]" id="categories" class="select2 form-control" multiple>
                                                                <optgroup label="  @lang('admin.select_category') ">
                                                                    @if($categories && $categories -> count() > 0)
                                                                    @foreach ($categories as $category)


                                                                    <option value="{{ $category->id }}" @if(in_array($category->id, $category_ids)) selected @endif>
                                                                        {{ $category->name }}
                                                                    </option>

                                                                    @endforeach

                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('categories')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="phone">{{trans('admin.phone')}}
                                                            </label>
                                                            <input type="text" id="phone" class="form-control" placeholder="  " value="{{old('phone',$company->phone )}}" name="phone">
                                                            @error("phone")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="city_id"> @lang('admin.select_city')
                                                            </label>
                                                            <select id="city_id" name="city_id" class="select2 form-control">
                                                                <option disabled selected> @lang('admin.select_city')</option>
                                                                @if($cities && $cities -> count() > 0)
                                                                @foreach($cities as $city)
                                                                <option value="{{$city -> id }}" @if($company->city_id == $city->id) selected @endif>{{$city -> name}}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                            @error('city_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="area_id"> @lang('admin.select_area')
                                                            </label>
                                                            <select id="area_id" name="area_id" class="select2 form-control">
                                                                <option disabled selected> @lang('admin.select_area')</option>
                                                                @if($areas && $areas -> count() > 0)
                                                                @foreach($areas as $area)
                                                                <option value="{{$area -> id }}" @if($company->area_id == $area->id) selected @endif>{{$area -> name}}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                            @error('area_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="images">{{trans('admin.images')}}
                                                            </label>
                                                            <input type="file" multiple id="images" class="form-control" placeholder="  " value="{{old('images')}}" name="images[]">
                                                            @error('images')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                           
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> {{trans('admin.update')}}
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>

@stop