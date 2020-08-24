@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Product Data</h3>
                </div>
                <div class="card-body">
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <form action="{{ url('/products') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}" placeholder="Enter Product Name">
                            <p class="text-danger">{{ $errors->first('title') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Cost</label>
                            <input type="number" name="cost_price" class="form-control {{ $errors->has('cost_price') ? 'is-invalid':'' }}">
                            <p class="text-danger">{{ $errors->first('cost_price') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Sell</label>
                            <input type="number" name="sell_price" class="form-control {{ $errors->has('sell_price') ? 'is-invalid':'' }}">
                            <p class="text-danger">{{ $errors->first('sell_price') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Stock</label>
                            <input type="number" name="stock" class="form-control {{ $errors->has('stock') ? 'is-invalid':'' }}">
                            <p class="text-danger">{{ $errors->first('stock') }}</p>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection