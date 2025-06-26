@extends('layouts.dashboard.dashboard-layout')
@section('dashboard')
<div class="card shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 fw-bold mb-0">Financial Report</h2>
    </div>

    <form method="GET" class="mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-4">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ $startDate }}" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" name="end_date" id="end_date" value="{{ $endDate }}" class="form-control">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="border rounded p-3">
                <h5 class="fw-bold mb-1">Total Sales</h5>
                <p class="mb-0">{{ number_format($totalSales, 2) }} TK</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="border rounded p-3">
                <h5 class="fw-bold mb-1">Total Discount</h5>
                <p class="mb-0">{{ number_format(abs($totalDiscount), 2) }} TK</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="border rounded p-3">
                <h5 class="fw-bold mb-1">Total VAT</h5>
                <p class="mb-0">{{ number_format($totalVat, 2) }} TK</p>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table">
                <tr>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sales as $sale)
                <tr>
                    <td>{{ $sale->created_at->format('Y-m-d') }}</td>
                    <td>{{ $sale->product->name }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->total_amount }} TK</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No records found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection