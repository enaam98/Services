
{{-- edit_service --}}

@extends('layouts.base')

@section('title')
edit_service
@endsection
@section('content')

<div class="section-title-01 honmob">
    <div class="bg_parallax image_01_parallax"></div>
    <div class="opacy_bg_02">
        <div class="container">
            <h1>EDIT SERVICES CATEGORIES</h1>
            <div class="crumbs">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>/</li>
                    <li>Add Service Categories</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="content-central">
    <div class="content-info">
        <div class="paddings-mini">
            <div class="container">
                <div class="row portfolioContainer">
                    <div class="col-md-8 col-md-offseet-2 profile1">
                        <div class="panel panel-default">
                            <div class="panel heading">
                                <div class="row">
                                    <div class="col-md-6">
                                        Add new service category
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.all_Service_Categories')}}"  class="btn btn-info pull-right">All Services</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if(Session::has('massage'))
                            <div class="alert alert-success" role="alert">{{Session::get('massage')}}</div>

                            @endif
                            <form action="{{route('admin.update_Service',($service->id))}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="contro-label col-sm-3">service Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control"  value="{{old('name', $service->name)}}" required>
                                        @error('name')
                                        <p class="text-danger">{{$massage}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image" class="contro-label col-sm-3">service Image:</label>
                                    <div class="col-sm-9">
                                        <input type="file" id="image" name="image" class="form-control"  value="{{old('image', $service->image)}}" required>
                                        @error('image')
                                        <p class="text-danger">{{$massage}}</p>
                                        @enderror
                                    </div>
                                </div>

                               <div class="form-group">
                                    <label for="featured" class="contro-label col-sm-3">service featured:</label>
                                    <div class="col-sm-9">

                                        <select class="form-control" name="featured" id="featured">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>


                    <button type="submit" class="btn btn-success pull-right">Update Service</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>


@endsection
