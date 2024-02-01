<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Turn;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
class TurnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $now = Carbon::now();
        $startOfDay = $now->copy()->startOfDay()->addHours(8);
        $endOfDayTomorrow = $now->copy()->addDay()->startOfDay()->addHours(8);
            $turns = Turn::with('pharmacy')->whereDate('date', '>=', $startOfDay->toDateString())
            ->whereDate('date', '<', $endOfDayTomorrow->toDateString())
            ->get();
        return response()->json($turns);
    }
    public function indexPharmacy()
    {
        $now = Carbon::now();
        $startOfDay = $now->copy()->startOfDay()->addHours(8);
        $endOfDayTomorrow = $now->copy()->addDay()->startOfDay()->addHours(8);
        $result = Turn::with('pharmacy')->whereDate('date', '>=', $startOfDay->toDateString())
        ->whereDate('date', '<', $endOfDayTomorrow->toDateString())->get() ->groupBy('date')->map
        (function ($turns, $date) {
            return [
                'date' => $date,
                'pharmacies' => $turns->pluck('pharmacy')->toArray(),
            ];
        })->values()->all();
        return response()->json($result);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required',
                'pharmacy_id' => 'required',
                'date' => 'required',
            ]);
            $turn = Turn::create([
                'user_id' => $request->input('user_id'),
                'pharmacy_id' => $request->input('pharmacy_id'),
                'date' => $request->input('date'),
            ]);
    
            return response()->json($turn);
    
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
            $turn=Turn::findOrFail($id);
            return response()->json($turn);
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
                'user_id' => 'required',
                'pharmacy_id' => 'required',
                'date' => 'required',
            ]);
            $turn = Turn::findOrFail($id);
            $turn->update([
                'user_id' => $request->input('user_id'),
                'pharmacy_id' => $request->input('pharmacy_id'),
                'date' => $request->input('date'),
            ]);
            return response()->json($turn);

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
            $pharmacy = Turn::findOrFail($id);
            $pharmacy->delete();
            return response()->json(['message' => 'Pharmacy deleted successfully']);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Pharmacy not found'], 404);
        }
    }
}
