@extends('layouts.base')

@section('title')
admin_service_category
@endsection
@section('content')

<style>
    nav svg {
        height: 20px;
    }

    nav .hidden {
        display: block !important;
    }
</style>
<div class="section-title-01 honmob">
    <div class="bg_parallax image_01_parallax"></div>
    <div class="opacy_bg_02">
        <div class="container">
            <h1> All SERVICES </h1>
            <div class="crumbs">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>/</li>
                    <li> All Service </li>
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
                    <div class="col-md-12 profile1">
                        <div class="panel panel-default">
                            <div class="panel heading">
                                <div class="row">
                                    <div class="col-md-6">
                                        All Service
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.add_Service')}}" class="btn btn-info pull-right">Add New</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Image</td>
                                    <td>Name</td>
                                    <td>Price</td>
                                    <td>Status</td>
                                    <td>Category</td>
                                    <td>Featured</td>
                                    {{-- <td>Created_at</td> --}}
                                    <td>options</td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($services as $service)
                                <tr>
                                    <td>
                                        <h5>{{$service->id}}</h5>
                                    </td>
                                    <td>
                                        <img src="{{asset('')}}{{$service->image}}" alt="{{$service->name}}" width="60" />
                                    </td>
                                    <td>
                                        <h5>{{$service->name}}</h5>
                                    </td>
                                    <td>
                                        <h5>{{$service->price}}</h5>
                                    </td>
                                    <td>{{$service->status}}</td>
                                    <td>
                                    @foreach($cat as $c)
                                    @if( $service->service_category_id === $c->id )
                                       {{ $c->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                            @if ($service->featured)
                            Yes
                            @else
                            No
                            @endif
                        </td>


                                    {{-- <td>{{$service->name}}</td> --}}
                                    {{-- <td>{{$service->created_at}}</td> --}}
                                    <td>
                                        <form method="post" action="{{route('admin.delete_Service',$service->id)}}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">X</button>
                                            <a class="btn btn-primary btn-sm" href="{{route('admin.edit_Service',['id'=>$service->id])}}"> Edit</a>
                                            {{-- <a class="btn btn-primary btn-sm" href="{{route('admin.Service_By_Categories',['id'=>$service->id])}}"> +-/</a> --}}
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$services->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
