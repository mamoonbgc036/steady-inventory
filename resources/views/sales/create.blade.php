@extends('layouts.dashboard.dashboard-layout')
@section('dashboard')
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="text-2xl font-bold m-0">New Sale</h2>
                </div>

                <form action="{{ route('sales.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="product_id" class="form-label">Product</label>
                        <select name="product_id" id="product_id" class="form-select" required>
                            @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->name }} (Stock: {{ $product->current_stock }})
                            </option>
                            @endforeach
                        </select>
                        @error('product_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" required>
                        @error('quantity')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount</label>
                        <input type="number" name="discount" id="discount" step="0.01" class="form-control">
                        @error('discount')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="paid_amount" class="form-label">Paid Amount</label>
                        <input type="number" name="paid_amount" id="paid_amount" step="0.01" class="form-control" required>
                        @error('paid_amount')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Record Sale</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection