@extends('layouts._admin')
@section('title', 'Nomads Dashboard')
@section('content')
    <div class="page-heading d-flex justify-content-between">
        <h3>Nomads Dashboard</h3>
    </div>
    <div class="page-content">
        <h4></h4>
        <div class="row my-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <section id="multiple-column-form">
                            <div class="row match-height">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Add Travel Packages</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                @if($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach($errors->all() as $error)
                                                                <li>{{$error}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <form action="{{route('travel-package.store')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="title">Title</label>
                                                                <input type="text" id="title" class="form-control" placeholder="Title" name="title" value="{{old('title')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="location">Location</label>
                                                                <input type="text" id="location" class="form-control" placeholder="Location" name="location" value="{{old('location')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="about">About</label>
                                                                <textarea name="about" id="about" rows="3" class="form-control">{{old('about')}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="departure_date">Departure Date</label>
                                                                <input type="date" id="departure_date" class="form-control" placeholder="Departure Date" name="departure_date" value="{{old('departure-date')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="type">Type</label>
                                                                <select name="type" id="type" class="form-control">
                                                                    <option value="Open Trip">Open Trip</option>
                                                                    <option value="Private Trip">Private Trip</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="language">Language</label>
                                                                <input type="text" id="language" class="form-control" placeholder="Language" name="language" value="{{old('language')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="foods">Foods</label>
                                                                <input type="text" id="foods" class="form-control" placeholder="Foods" name="foods" value="{{old('foods')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="duration">Duration</label>
                                                                <input type="text" id="duration" class="form-control" placeholder="Duration" name="duration" value="{{old('duration')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="featured_event">Featured Events</label>
                                                                <input type="text" id="featured_event" class="form-control" placeholder="Featured Event" name="featured_event" value="{{old('featured_event')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="price">Price</label>
                                                                <input type="number" id="price" class="form-control" placeholder="Rp." name="price" value="{{old('price')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 my-2 d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary me-3 mb-1">
                                                                Submit
                                                            </button>
                                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                                Reset
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
