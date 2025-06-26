@extends('layouts.dashboard.dashboard-layout')
@section('dashboard')
<div class="row">
    @if(session('success'))
    <div class="alert alert-danger">
        {{ session('success') }}
    </div>
    @endif
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="text-2xl font-bold m-0">Sale Table</h2>
                    <a href="{{ route('sales.create') }}" class="btn btn-success">Create</a>
                </div>
                <div class="table-responsive pt-3">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th>VAT</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Due</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(empty($sales))
                            <tr>
                                No product uploaded
                            </tr>
                            @else
                            @foreach($sales as $sale)
                            <tr>
                                <td>{{ $sale->product->name }}</td>
                                <td>{{ $sale->quantity }}</td>
                                <td>{{ $sale->discount }}</td>
                                <td>{{ $sale->vat }}</td>
                                <td>{{ $sale->total_amount }}</td>
                                <td>{{ $sale->paid_amount }}</td>
                                <td>{{ $sale->due_amount }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{ $sales->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection