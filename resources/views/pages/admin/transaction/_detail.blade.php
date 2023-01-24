@extends('layouts._admin')
@section('title', 'Detail Transactin')
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
                                            <h4 class="card-title">Detail Transaction | {{$item->user->name}}</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <table class="table table-bordered table-hover col-12 ">
                                                    <tr>
                                                        <th>Transaction Status</th>
                                                        @if($item->transaction_status === 'SUCCESS')
                                                            <td class="text-bg-success text-center font-bold">{{$item->transaction_status }}</td>
                                                        @elseif($item->transaction_status === 'PENDING')
                                                            <td class="text-bg-warning text-center font-bold">{{$item->transaction_status }}</td>
                                                        @else
                                                            <td class="text-bg-danger text-center font-bold">{{$item->transaction_status }}</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <th>Travel Package</th>
                                                        <td>{{$item->travel_package->title}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Customer</th>
                                                        <td>{{$item->user->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Additional Visa</th>
                                                        <td>{{$item->additional_visa}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Transaction</th>
                                                        <td class="font-bold">Rp{{number_format($item->transaction_total)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Transaction</th>
                                                        <td>
                                                            <table class="table table-striped text-center">
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Nationality</th>
                                                                    <th>Visa</th>
                                                                    <th>DOE Passport</th>
                                                                </tr>
                                                                @foreach($item->details as $detail)
                                                                    <tr>
                                                                        <td>{{ $detail->username }}</td>
                                                                        <td>{{ $detail->nationality }}</td>
                                                                        <td>{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                                                        <td>{{ $detail->doe_passport }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
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
