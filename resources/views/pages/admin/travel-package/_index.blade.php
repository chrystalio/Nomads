@extends('layouts._admin')
@section('title', 'Nomads Dashboard')
@section('content')
    <div class="page-heading d-flex justify-content-between">
        <h3>Nomads Dashboard</h3>
    </div>
    <div class="page-content">
        <h4>Travel Packages</h4>
        @foreach (Alert::getMessages() as $type => $messages)
            @foreach ($messages as $message)
                <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
                    {{ $message }}
                </div>
            @endforeach
        @endforeach
        <div class="row my-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{route('travel-package.create')}}" class="btn btn-primary btn-sm shadow-md">Add New</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="table1">
                                <thead class="text-center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Departure Date</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody class="table-hover text-center">
                                @forelse($items as $item)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->location}}</td>
                                        <td>{{$item->type}}</td>
                                        <td>{{$item->departure_date}}</td>
                                        <td>{{$item->duration}}</td>
                                        <td>Rp{{number_format($item->price)}}</td>
                                        <td>
                                            <a href="{{route('travel-package.edit', $item->uuid)}}" class="btn btn-sm btn-outline-warning">Edit</a>
                                            <form action="{{route('travel-package.destroy', $item->uuid)}}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            Data not found
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
