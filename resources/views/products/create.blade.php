@extends('layouts.dashboard.dashboard-layout')
@section('dashboard')
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Create Product</h6>
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name">
                            </div>
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Purchase Price</label>
                                <input type="number" name="purchase_price" class="form-control" placeholder="Enter purchase price">
                            </div>
                            @error('purchase_price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Sell Price</label>
                                <input type="number" name="sell_price" class="form-control" placeholder="Enter sell price">
                            </div>
                            @error('price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Opening Stock</label>
                                <input type="number" name="opening_stock" class="form-control" placeholder="Enter opening stock">
                            </div>
                            @error('price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <button type="submit" class="btn btn-primary submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection