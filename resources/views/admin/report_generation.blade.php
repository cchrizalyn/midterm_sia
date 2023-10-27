@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Filtered Products</h1>
        </div>

        <!-- Display filter form -->
        <form method="GET" action="{{ route('admin.inventory.filter') }}" class="mb-4">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" class="form-control" name="start_date" id="start_date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="end_date">End Date:</label>
                        <input type="date" class="form-control" name="end_date" id="end_date">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Apply Filter</button>
                </div>
            </div>
        </form>

        <!-- Display filtered products in a table -->
        <table id="filteredInventoryTable" class="display">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th>Serial Number</th>
                    <th>Manufacturer</th>
                    <th>Price</th>
                    <th>Purchased Date</th>
                    <th>Quantity</th>
                    <!-- ... other table headers ... -->
                </tr>
            </thead>
            <tbody>
                @foreach ($filteredProducts as $product)
                    <tr>
                        <td>{{ $product->category->category_name }}</td>
                        <td>{{ $product->prod_name }}</td>
                        <td>{{ $product->serial_num }}</td>
                        <td>{{ $product->manufacturer }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->purchased_date }}</td>
                        <td>{{ $product->qty }}</td>
                        <!-- ... other table data ... -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Include necessary scripts for DataTables, if not already included -->
<!-- ... -->
@endsection
