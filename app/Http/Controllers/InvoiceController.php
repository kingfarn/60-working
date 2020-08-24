<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use \App\Invoice_detail;
use App\Product;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class InvoiceController extends Controller

{
    function __construct()
    {
        /*
        $this->middleware('permission:invoice-list');
        $this->middleware('permission:invoice-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:invoice-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:invoice-delete', ['only' => ['destroy']]);
        $this->middleware('permission:invoice-print', ['only' => ['print']]);
        */
    }
    public function index()
    {
        $invoice  = Invoice::with(['customer', 'detail'])->orderBy('created_at', 'DESC')->paginate(10);
        return view('invoice.index', compact('invoice'));
    }

    public function create()
    {

        $customers = Customer::orderBy('created_at', 'DESC')->get();
        return view('invoice.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required|exists:customers,id'
        ]);

        $invoice = Invoice::create([
            'customer_id' => $request->customer_id,
            'total' => 0
        ]);

        return redirect(route('invoice.edit', [$invoice->id]));
    }

    public function edit($id)
    {
        $invoice = Invoice::with(['customer', 'detail', 'detail.product'])->find($id);
        $products = Product::orderBy('title', 'ASC')->get();
        return view('invoice.edit', compact('invoice', 'products'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer'
        ]);


        $invoice = Invoice::find($id);
        $product = Product::find($request->product_id);
        $invoice_detail = $invoice->detail()->where('product_id', $product->id)->first();

        if ($invoice_detail) {
            $invoice_detail->update([
                'qty' => $invoice_detail->qty + $request->qty
            ]);
        } else {
            Invoice_detail::create([
                'invoice_id' => $invoice->id,
                'product_id' => $request->product_id,
                'price' => $product->sell_price,
                'qty' => $request->qty
            ]);
        }

        return redirect()->back()->with(['success' => 'Product Was Added']);
    }

    public function deleteProduct($id)
    {
        $detail = Invoice_detail::find($id);
        $detail->delete();
        return redirect()->back()->with(['success' => 'Product Was Deleted']);
    }

    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('invoice.show', compact('invoice'));
    }

    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();
        return redirect()->back()->with(['success' => 'invoice was deleted']);
    }

    public function generateInvoice($id)
    {

        $invoice = Invoice::with(['customer', 'detail', 'detail.product'])->find($id);

        $pdf = PDF::loadView('invoice.print', compact('invoice'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
