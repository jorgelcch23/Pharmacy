<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pharmacy;
use Illuminate\Validation\Rule;
class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pharmacy=Pharmacy::all();
        return response()->json($pharmacy);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => [
                    'required',
                    Rule::unique('pharmacies', 'name'),
                ],
                'address' => 'required',
                'gps' => 'required',
                'location' => 'required',
            ]);
            $pharmacy = Pharmacy::create([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'gps' => $request->input('gps'),
                'location' => $request->input('location'),
            ]);
    
            return response()->json($pharmacy);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors()->all();
        return response()->json(['errors' => $errors], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $pharmacy=Pharmacy::findOrFail($id);
            return response()->json($pharmacy);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Pharmacy not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => [
                    'required',
                    Rule::unique('pharmacies', 'name')->ignore($id),
                ],
                'address' => 'required',
                'gps' => 'required',
                'location' => 'required',
            ]);
            $pharmacy = Pharmacy::findOrFail($id);
            $pharmacy->update([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'gps' => $request->input('gps'),
                'location' => $request->input('location'),
            ]);
            return response()->json($pharmacy);

        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['errors' => $errors], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Pharmacy not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pharmacy = Pharmacy::findOrFail($id);
            $pharmacy->delete();
            return response()->json(['message' => 'Pharmacy deleted successfully']);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Pharmacy not found'], 404);
        }
    }
}
