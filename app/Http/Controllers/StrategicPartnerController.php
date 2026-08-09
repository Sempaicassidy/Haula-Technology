<?php

namespace App\Http\Controllers;

use App\Models\StrategicPartner;
use Illuminate\Http\Request;

class StrategicPartnerController extends Controller
{
    public function index()
    {
        $partners = StrategicPartner::orderBy('id', 'asc')->get();

        if ($partners->isEmpty()) {
            $defaultPartners = [
                ['icon' => '⚓', 'name' => 'TPA (Tanzania Ports Authority)', 'scope' => 'Dar Port Customs Logistics'],
                ['icon' => '📄', 'name' => 'TRA (Tanzania Revenue Authority)', 'scope' => 'Statutory EFD Tax Integration'],
                ['icon' => '🌐', 'name' => 'Cisco Systems', 'scope' => 'Enterprise Network & Security'],
                ['icon' => '📡', 'name' => 'MikroTik RouterOS', 'scope' => 'Hardware Routing Infrastructure'],
                ['icon' => '☁️', 'name' => 'Microsoft Enterprise', 'scope' => 'Cloud & Server Ecosystem'],
                ['icon' => '🛡️', 'name' => 'Dawafy Health OS', 'scope' => 'Pharmacy Technology Partner'],
                ['icon' => '🚚', 'name' => 'SADC / EAC Logistics Alliance', 'scope' => 'Cross-Border Haulage Network']
            ];

            foreach ($defaultPartners as $p) {
                StrategicPartner::create($p);
            }
            $partners = StrategicPartner::orderBy('id', 'asc')->get();
        }

        return response()->json(['status' => 'success', 'data' => $partners]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'scope' => 'required|string|max:191',
            'icon' => 'nullable|string|max:20',
        ]);

        $partner = StrategicPartner::create([
            'icon' => $validated['icon'] ?? '⚓',
            'name' => $validated['name'],
            'scope' => $validated['scope'],
        ]);

        return response()->json(['status' => 'success', 'message' => 'Partner added to Strategic Marquee!', 'data' => $partner], 201);
    }

    public function destroy($id)
    {
        $partner = StrategicPartner::find($id);
        if ($partner) {
            $partner->delete();
            return response()->json(['status' => 'success', 'message' => 'Partner removed successfully.']);
        }

        return response()->json(['status' => 'error', 'message' => 'Partner not found.'], 404);
    }
}
