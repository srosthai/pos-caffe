<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use App\Models\Transactionsaleline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::all();
        $transactions = Transaction::when($request->customer_id, function ($query) use ($request) {
            $query->where('customer_id', $request->customer_id);
        })->when($request->start_date, function ($query) use ($request) {
            $query->where('created_at', '>=', $request->start_date);
        })->when($request->end_date, function ($query) use ($request) {
            $query->where('created_at', '<=', $request->end_date . ' 23:59:59');
        })->when($request->status, function ($query) use ($request) {
            $query->where('status', $request->status);
        })->latest()->paginate(5);
        $total_due = $transactions->sum('total_due');
        $total_amount = $transactions->sum('total');

        $totalpaid = $transactions->sum('total_paid');
        $subtotal = $transactions->sum('subtotal');
        $discount = $transactions->sum('discount');
        if ($request->ajax()) {
            $view = view('sale._table', compact('transactions', 'customers', 'totalpaid', 'subtotal', 'total_amount', 'discount','total_due'))->render();
            return response()->json([
                'view' => $view
            ]);
        }
        return view('sale.index', compact('transactions', 'customers', 'totalpaid', 'subtotal', 'total_amount', 'discount','total_due'));
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Transactionsaleline::where('transaction_id', $id)->delete();
            Transaction::find($id)->delete();

            DB::commit();
            return redirect()->route('transaction.index')->with('success','Transaction deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('transaction.index')->with('error', 'Failed to delete transaction!');
        }
    }
}
