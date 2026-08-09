<?php

namespace App\Http\Controllers;

use App\Models\SoftwareProduct;
use Illuminate\Http\Request;

class SoftwareProductController extends Controller
{
    public function index()
    {
        $products = SoftwareProduct::orderBy('is_custom', 'asc')->orderBy('key', 'asc')->get();
        return response()->json(['status' => 'success', 'data' => $products]);
    }

    public function update(Request $request)
    {
        $config = $request->input('config', []);
        foreach ($config as $key => $status) {
            SoftwareProduct::updateOrCreate(
                ['key' => $key],
                [
                    'title' => ucfirst($key) . ' System',
                    'status' => $status,
                ]
            );
        }

        return response()->json(['status' => 'success', 'message' => 'Software Ecosystem configuration updated.']);
    }

    public function addCustom(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:191',
            'desc' => 'required|string',
            'icon' => 'nullable|string|max:20',
        ]);

        $key = 'custom_eco_' . time();
        $product = SoftwareProduct::create([
            'key' => $key,
            'title' => $validated['title'],
            'icon' => $validated['icon'] ?? '⚡',
            'status' => 'live',
            'description' => $validated['desc'],
            'is_custom' => true,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Custom Software Project added to Ecosystem!', 'data' => $product], 201);
    }
}
