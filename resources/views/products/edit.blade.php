@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Product</h3>
                </div>
                <div class="card-body">
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    {!! Form::model($product, ['method' => 'PATCH','route' => ['products.update', $product->id]]) !!}
                    <div class="form-group">
                        <label for=""> Product Name</label>
                        <input type="text" name="title" class="form-control" value="{{ $product->title }}" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" cols="10" rows="10" class="form-control">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Cost</label>
                        <input type="number" name="cost_price" class="form-control" value="{{ $product->cost_price }}">
                    </div>
                    <div class="form-group">
                        <label for="">Sell</label>
                        <input type="number" name="sell_price" class="form-control" value="{{ $product->sell_price }}">
                    </div>
                    <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection