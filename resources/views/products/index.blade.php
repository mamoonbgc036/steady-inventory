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
                    <h2 class="text-2xl font-bold m-0">Product Table</h2>
                    <a href="{{ route('products.create') }}" class="btn btn-success">Create</a>
                </div>
                <div class="table-responsive pt-3">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Purchase Price</th>
                                <th>Sell Price</th>
                                <th>Current Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(empty($products))
                            <tr>
                                No product uploaded
                            </tr>
                            @else
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->purchase_price }}</td>
                                <td>{{ $product->sell_price }}</td>
                                <td>{{ $product->current_stock }}</td>
                                <td class="d-flex">
                                    <form action="{{ route('products.destroy', $product->id ) }}" method="POST" class="col-sm-6 col-md-4 col-lg-3">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Trash</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection