@extends('layouts._admin')
@section('title', 'Nomads Dashboard')
@section('content')
    <div class="page-heading d-flex justify-content-between">
        <h3>Nomads Dashboard</h3>
    </div>
    <div class="page-content">
        <h4>Transactions</h4>
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
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="table1">
                                <thead class="text-center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Travel</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Additional Visa</th>
                                    <th scope="col">Transaction Total</th>
                                    <th scope="col">Transaction Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody class="table-hover text-center">
                                @forelse($items as $item)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$item->travel_package->title}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->additional_visa}}</td>
                                        <td>Rp{{number_format($item->transaction_total)}}</td>
                                        @if($item->transaction_status === 'SUCCESS')
                                            <td class="text-bg-success">{{$item->transaction_status }}</td>
                                        @elseif($item->transaction_status === 'PENDING')
                                            <td class="text-bg-warning">{{$item->transaction_status }}</td>
                                        @else
                                            <td class="text-bg-danger">{{$item->transaction_status }}</td>
                                        @endif
                                        <td>
                                            <a href="{{ route('transaction.show', $item->uuid) }}" class="btn-sm btn btn-primary">
                                                Show
                                            </a>
                                            @if($item->transaction_status !== 'SUCCESS' && $item->transaction_status !== 'CANCELLED')
                                                <a href="{{ route('transaction.edit', $item->uuid) }}" class="btn-sm btn btn-warning">
                                                    Update
                                                </a>

                                            @endif
                                            <form action="{{ route('transaction.destroy', $item->uuid) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn-sm btn btn-danger">
                                                    Delete
                                                </button>
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
