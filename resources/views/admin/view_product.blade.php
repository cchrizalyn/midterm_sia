@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Product</h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h2>Product Name: {{ $product->prod_name }}</h2>
                <p>Serial Number: {{ $product->serial_num }}</p>
                <p>Manufacturer: {{ $product->manufacturer }}</p>
                <p>Price: {{ $product->price }}</p>
                <p>Purchased Date: {{ $product->purchased_date }}</p>
                <p>Quantity: {{ $product->qty }}</p>
                <p>Category: {{ $product->category->category_name }}</p>
                <p>Notes: {{ $product->note }}</p>
            </div>
        </div>
    </div>
@endsection
