<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Journal;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date', now()->subDays(30));
        $endDate = $request->input('end_date', now());

        $sales = Sale::whereBetween('created_at', [$startDate, $endDate])->get();

        $totalSales = Journal::where('type', 'sales')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('amount');

        $totalDiscount = Journal::where('type', 'discount')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('amount');

        $totalVat = Journal::where('type', 'vat')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('amount');

        return view('reports.index', compact('sales', 'totalSales', 'totalDiscount', 'totalVat', 'startDate', 'endDate'));
    }
}
