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
                                            <h4 class="card-title">Edit Travel Packages {{$item->title}}</h4>
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
                                                <form action="{{route('transaction.update', $item->id)}}" method="post" enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="transaction_status">status</label>
                                                                <select name="transaction_status" id="transaction_status" class="form-control">
                                                                    <option value="{{$item->transaction_status}}">{{$item->transaction_status}}</option>
                                                                    <option value="SUCCESS">SUCCESS</option>
                                                                    <option value="PENDING">PENDING</option>
                                                                    <option value="CANCEL">CANCEL</option>
                                                                    <option value="FAILED">FAILED</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 my-2 d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary me-3 mb-1">
                                                                Edit
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
