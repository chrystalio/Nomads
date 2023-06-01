@extends('layouts._app')
@section('title', 'Detail Travel')

@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0 pl-3 pl-lg-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    @foreach($items as $item)
                        <div class="col-lg-8 pl-lg-0">
                            <div class="card card-details">
                                <h1>{{$item->title}}</h1>
                                <p>{{$item->location}}</p>
                                <div class="gallery">
                                    <div class="xzoom-container">
                                        <img class="xzoom" id="xzoom-default" width="128"
                                             src="{{ Storage::url($item->galleries->first()->image) }}"
                                             xoriginal="{{ Storage::url($item->galleries->first()->image) }}"/>
                                        <div class="xzoom-thumbs">
                                            @foreach($item->galleries as $gallery)
                                                <a href="{{ Storage::url($gallery->image) }}">
                                                    <img class="xzoom-gallery" width="128"
                                                         src="{{ Storage::url($gallery->image) }}"
                                                         xpreview="{{ Storage::url($gallery->image) }}"/>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <h2>About Destination</h2>
                                    <p>{{$item->about}}</p>
                                    <div class="features row pt-3">
                                        <div class="col-md-4">
                                            <img src="{{url('frontend/images/ic_event@2x.png')}}" alt=""
                                                 class="features-image"/>
                                            <div class="description">
                                                <h3>Featured Event</h3>
                                                <p>
                                                    {{$item->featured_event}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 border-left">
                                            <img
                                                src="{{url('frontend/images/ic_bahasa@2x.png')}}"
                                                alt=""
                                                class="features-image"
                                            />
                                            <div class="description">
                                                <h3>Language</h3>
                                                <p>
                                                    {{$item->language}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 border-left">
                                            <img
                                                src="{{url('frontend/images/ic_foods@2x.png')}}"
                                                alt=""
                                                class="features-image"
                                            />
                                            <div class="description">
                                                <h3>Foods</h3>
                                                <p>
                                                    {{$item->foods}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card card-details card-right">
                                <h2>Members are going</h2>
                                <div class="members my-2">
                                    <img src="{{url('frontend/images/members@2x.png')}}" alt="" class="w-75"/>
                                </div>
                                <hr/>
                                <h2>Trip Informations</h2>
                                <table class="trip-informations">
                                    <tr>
                                        <th width="50%">Date of Departure</th>
                                        <td width="50%"
                                            class="text-right">{{\Carbon\Carbon::create($item->departure_date)->format('F n, Y')}}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Duration</th>
                                        <td width="50%" class="text-right">{{$item->duration}}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Type</th>
                                        <td width="50%" class="text-right">{{$item->type}}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Price</th>
                                        <td width="60%" class="text-right">Rp{{number_format($item->price)}}/person</td>
                                    </tr>
                                </table>
                            </div>
                            @endforeach
                            <div class="join-container">
                                @auth()
                                    <form action="{{ route('checkout-process', $item->uuid) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                            Join Now
                                        </button>
                                    </form>
                                @endauth
                                @guest()
                                    <a href="{{route('login')}}" class="btn btn-block btn-join-now mt-3 py-2">
                                        Login or Register to Join
                                    </a>
                                @endguest
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('addon-style')
    <link rel="stylesheet" href="{{url('frontend/libraries/xzoom/dist/xzoom.css')}}"/>
@endpush

@push('addon-script')
    <script src="{{url('frontend/libraries/xzoom/dist/xzoom.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                Xoffset: 15
            });
        });
    </script>
@endpush
