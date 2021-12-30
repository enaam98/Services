@extends('layouts.base')

@section('title')
AdminContact
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
            <h1> Contact</h1>
            <div class="crumbs">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>/</li>
                    <li>Contact </li>
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- 
<section class="tp-banner-container">
    <div class="tp-banner">
        <ul>
            <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000"
                data-saveperformance="off" data-title="Slide">
                <img src="{{asset('img1.jpg')}}" alt="fullslide1" data-bgposition="center center"
                    data-kenburns="on" data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130"
                    data-bgfitend="100" data-bgpositionend="right center">
            </li>
            <li data-transition="slidehorizontal" data-slotamount="1" data-masterspeed="1000"
                data-saveperformance="off" data-title="Slide">
                <img src="{{asset('img6.jpg')}}" alt="fullslide1" data-bgposition="top center"
                    data-kenburns="on" data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130"
                    data-bgfitend="100" data-bgpositionend="right center">
            </li>
        </ul>
        <div class="tp-bannertimer"></div>
    </div>
    <div class="filter-title">
        <div class="title-header">
            <h1> Contact</h1>
            <div class="crumbs">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>/</li>
                    <li>Contact </li>
                </ul>
            </div>
        </div>

    </div>
    <br>
    <br>
    <br>
    </section> --}}

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
                                        All Messages
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <a href="{{route('admin.add_Service_Categories')}}" class="btn btn-info pull-right">Add Categories</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>#</td>
                                   <td>name</td>
                                    <td>email</td>
                                    <td>phone</td>
                                    <td>message</td>
                                    <td>createdAt</td>
                                  </tr>
                            </thead>
                            <tbody>

                                @foreach ($contacts as $contact)
                                <tr>
                                    <td>
                                        <h5>{{$contact->id}}</h5>
                                    </td>

                                    <td>
                                        <h5>{{$contact->name}}</h5>
                                    </td>
                                    <td>
                                        <h5>{{$contact->email}}</h5>
                                    </td>
                                    <td>
                                        <h5>{{$contact->phone}}</h5>
                                    </td>
                                    <td>
                                        <h5>{{$contact->message}}</h5>
                                    </td>
                                     <td>
                                        <h5>{{$contact->created_at}}</h5>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$contacts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
