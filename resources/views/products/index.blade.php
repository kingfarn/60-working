@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Product Managment</h3><br><br>
                            <a class="btn btn-success" href="/products/create"> Add New Product</a><br>
                        </div>

                    </div>
                </div>

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Cost</th>
                            <th>Sell</th>
                            <th>Stock</th>
                            <th>Added At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>{{ ($product->description) }}</td>
                            <td>${{ number_format($product->cost_price) }}</td>
                            <td>${{ number_format($product->sell_price) }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->created_at->format('d-m-Y') }}</td>
                            <td>{{ $product->created_at->format('d-m-Y') }}</td>

                            <td>
                                <form action="{{ url('/products/' . $product->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE" class="form-control">
                                    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="6">No Product Data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection