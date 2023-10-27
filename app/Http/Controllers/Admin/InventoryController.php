<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $products = Products::all();
        $selectedCategoryId = null;
        
        return view('admin.admin_inventory', compact('products','categories', 'selectedCategoryId'));
    }

    public function viewProduct($product) {
        $product = Products::find($product);
        return view('admin.view_product', compact('product'));
    }
    

    public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required|exists:categories,id', // Ensure a valid category is selected
        'prod_name' => 'required|string',
        'serial_num' => 'required|string',
        'manufacturer' => 'required|string',
        'price' => 'required|integer',
        'qty' => 'required|integer',
        'purchased_date' => 'required|date',
        'note' => 'required|string',
        
    ]);

    Products::create([
        'category_id' => $request->input('category_id'), // Corrected to use category_id
        'prod_name' => $request->input('prod_name'),
        'serial_num' => $request->input('serial_num'),
        'manufacturer' => $request->input('manufacturer'),
        'price'=> $request->input('price'),
        'qty' => $request->input('qty'),
        'purchased_date' => $request->input('purchased_date'),
        'note' => $request->input('note'),
    ]);

    return redirect()->route('admin.inventory')->with('success', 'product added successfully');

}

    public function edit(Products $product)
{
    $categories = Category::all();
    return view('admin.update_inv', compact('product', 'categories'));
}

public function update(Request $request, Products $product)
{
    // Validate the form data
    $validatedData = $request->validate([
        'update_category' => 'required|exists:categories,id',
        'update_prod_name' => 'required|string',
        'update_serial_num' => 'required|string',
        'update_manufacturer' => 'required|string',
        'update_price' => 'required|integer',
        'update_qty' => 'required|integer',
        'update_date' => 'required|date',
        'update_notes' => 'required|string',
    ]);

    // Update the product with the validated data
    $product->update([
        'category_id' => $validatedData['update_category'],
        'prod_name' => $validatedData['update_prod_name'],
        'serial_num' => $validatedData['update_serial_num'],
       ' manufacturer'=>$validatedData['update_manufacturer'],
       ' price'=>$validatedData['update_price'],
        'qty' => $validatedData['update_qty'],
        'purchased_date' => $validatedData['update_date'],
        'note'=>$validatedData['update_notes']
        
    ]);

    // Redirect back to the product listing or wherever you want
    return redirect()->route('products.index')->with('success', 'product updated successfully');
}

    public function destroy(Products $product)
    {
        $product->delete();
    
        return redirect()->back()->with('success', 'product deleted successfully');
    }
    public function outOfStock()
    {
        $outOfStockproducts = Products::where('qty', '<=', 5)->get();
        $outOfStockCount = $outOfStockproducts->count();
        
        return view('admin/admin_dashboard', compact('outOfStockproducts', 'outOfStockCount'));
    }

    public function updateQuantity(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
    
        $product = Products::find($productId);
    
        if ($product) {
            $product->qty = $quantity;
            $product->save();
            return response()->json(['message' => 'Quantity updated successfully']);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
    
    public function reportGeneration(Request $request)
    {
        $categories = Category::all();
    
        // Apply filter for the purchased date
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        $productsQuery = Products::query();
    
        if ($startDate && $endDate) {
            $productsQuery->whereBetween('purchased_date', [$startDate, $endDate]);
        }
    
        $filteredProducts = $productsQuery->get();
        $selectedCategoryId = null;
    
        // If filtered products are empty, you can redirect back with a message
        if ($filteredProducts->isEmpty()) {
            return redirect()->route('admin.inventory')
                ->with('error', 'No products found matching the filter criteria.');
        }
    
        return view('admin.report_generation', compact('filteredProducts', 'categories', 'selectedCategoryId'));
    }
    
    

}
