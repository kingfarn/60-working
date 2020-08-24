@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Manage Invoices</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {!! session('success') !!}
                    </div>
                    @endif
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Invoice ID</th>
                                <th>Name </th>
                                <th>Phone No</th>
                                <th>Total Item</th>
                                <th>Subtotal</th>
                                <th>Discount</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($invoice as $row)
                            <tr>
                                <td><strong>#{{ $row->id }}</strong></td>
                                <td>{{ $row->customer->name }}</td>
                                <td>{{ $row->customer->phone }}</td>
                                <td><span class="badge badge-success">{{ $row->detail->count() }} Item</span></td>
                                <td>$ {{ number_format($row->total) }}</td>
                                <td>$ {{ number_format($row->discount) }}</td>
                                <td>$ {{ number_format($row->total_price) }}</td>
                                <td>
                                    <form action="{{ route('invoice.destroy', $row->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">

                                        <a href="{{ route('invoice.print', $row->id) }}" class="btn btn-secondary btn-sm">Print</a>

                                        <a href="{{ route('invoice.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">No data available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{ $invoice->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection