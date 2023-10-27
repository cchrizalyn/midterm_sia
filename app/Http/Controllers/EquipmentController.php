<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    public function index(){

        $equipments = Equipment::all();
        return view('admin.admin_inventory', ['equipments' => $equipments]);
    }
    

    public function store(Request $request)
    {
        // Validate the form data (add validation rules as needed)
        $validatedData = $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer',
        ]);
    
        // Create a new equipment record in the database
        Equipment::create($validatedData);
    
        // Redirect back with a success message or return JSON response as needed
        return redirect()->back()->with('success', 'Equipment added successfully');
    }
    public function update(Request $request, Equipment $equipment)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'update_name' => 'required|string',
            'update_quantity' => 'required|integer',
        ]);
    
        // Update the equipment with the validated data
        $equipment->update([
            'name' => $validatedData['update_name'],
            'quantity' => $validatedData['update_quantity'],
        ]);
    
        // Redirect back to the equipment listing or wherever you want
        return redirect()->route('equipments.index')->with('success', 'Equipment updated successfully');
    }
    
}
