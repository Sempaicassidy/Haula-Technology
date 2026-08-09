<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::orderBy('is_custom', 'asc')->orderBy('key', 'asc')->get();
        return response()->json(['status' => 'success', 'data' => $divisions]);
    }

    public function update(Request $request)
    {
        $config = $request->input('config', []);
        foreach ($config as $key => $item) {
            Division::updateOrCreate(
                ['key' => $key],
                [
                    'title' => $item['title'] ?? ucfirst($key),
                    'status' => $item['status'] ?? 'loader',
                    'subtitle' => $item['subtitle'] ?? '',
                ]
            );
        }

        return response()->json(['status' => 'success', 'message' => 'Division status configuration updated.']);
    }

    public function addCustom(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:191',
            'desc' => 'required|string',
            'icon' => 'nullable|string|max:20',
        ]);

        $key = 'custom_' . time();
        $division = Division::create([
            'key' => $key,
            'title' => $validated['title'],
            'icon' => $validated['icon'] ?? '🏢',
            'status' => 'live',
            'subtitle' => $validated['desc'],
            'is_custom' => true,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Custom Conglomerate Division added successfully!', 'data' => $division], 201);
    }
}
