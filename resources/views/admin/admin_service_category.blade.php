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
            <h1> All SERVICES CATEGORIES</h1>
            <div class="crumbs">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>/</li>
                    <li>Service Categories</li>
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
                                        All service category
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.add_Service_Categories')}}" class="btn btn-info pull-right">Add Categories</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>image</td>
                                    <td>name</td>
                                    <td>slug</td>
                                    <td>featured</td>
                                    <td>options</td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($scategories as $scategory)
                                <tr>
                                    <td>
                                        <h5>{{$scategory->id}}</h5>
                                    </td>
                                    <td>
                                        <img src="{{asset('')}}{{$scategory->image}}" alt="{{$scategory->name}}" width="60" />
                                    </td>
                                    <td>
                                        <h5>{{$scategory->name}}</h5>
                                    </td>
                                    <td>
                                        <h5>{{$scategory->slug}}</h5>
                                    </td>
                                    <td> @if ($scategory->featured)
                                        Yes
                                    @else
                                    No
                                     @endif
                                     </td>
                                    <td>
                                        <form method="post" action="{{route('admin.delete_Service_Categories',$scategory->id)}}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">X</button>
                                            <a class="btn btn-primary btn-sm" href="{{route('admin.edit_Service_Categories',$scategory->id)}}"> Edit</a>
                                            {{-- <a class="btn btn-primary btn-sm" href="{{route('admin.Service_By_Categories',['category_slug'=>$scategory->slug])}}"> ___ </a> --}}
                                            <a class="btn btn-primary btn-sm" href="{{route('admin.Service_By_Categories',['category_slug'=>$scategory->slug])}}"> ___ </a>
                                        </form>
                                        {{-- <i class="bi bi-trash"></i> --}}

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$scategories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
