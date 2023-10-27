@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Categories</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <!-- Button to trigger the modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
            Create Category
        </button>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->category_desc }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <button type="button" class="btn btn-danger" onclick="showDeleteConfirmation(this)">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal for adding category items -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add Category Items</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for adding category items -->
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for ="category_name">Category Name</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" required>
                        </div>
                        <div class="form-group">
                            <label for="category_description">Category Description</label>
                            <textarea class="form-control" id="category_desc" name="category_desc" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function showDeleteConfirmation(button) {
        var categoryId = button.parentElement.querySelector('input[name="category_id"]').value;

        if (confirm('Are you sure you want to delete this category?')) {
            // Check if the category is associated with equipment
            var isCategoryAssociatedWithEquipment = checkCategoryEquipmentAssociation(categoryId);

            if (isCategoryAssociatedWithEquipment) {
                alert('This category cannot be deleted because it has associated equipment.');
            } else {
                button.parentElement.submit();
            }
        }
    }

    // Function to check if there are associated equipment records for the category
    function checkCategoryEquipmentAssociation(categoryId) {
        // Implement the logic to check if there are associated equipment records for the category
        // You can use an AJAX request to the server to perform this check

        // For example, you can return true if there are associated equipment records; otherwise, return false.
        return false; // Change this based on your actual logic
    }
</script>
