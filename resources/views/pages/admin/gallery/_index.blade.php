@extends('layouts._admin')
@section('title', 'Nomads Dashboard')
@section('content')
    <div class="page-heading d-flex justify-content-between">
        <h3>Nomads Dashboard</h3>
    </div>
    <div class="page-content">
        <h4>Gallery</h4>
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
                            <a href="{{route('gallery.create')}}" class="btn btn-primary btn-sm shadow-md">Add New</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="table1">
                                <thead class="text-center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Travel</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody class="table-hover text-center">
                                @forelse($items as $item)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$item->travel_package->title}}</td>
                                        <td>   <img src="{{Storage::url($item->image)}}" alt="" style="width: 150px;" class="img-thumbnail"></td>
                                        <td>
                                            <a href="{{route('gallery.edit', $item->id)}}" class="btn btn-sm btn-outline-warning">Edit</a>
                                            <form action="{{route('gallery.destroy', $item->id)}}" method="post" class="d-inline">
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
