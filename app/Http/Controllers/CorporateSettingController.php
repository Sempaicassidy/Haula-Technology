<?php

namespace App\Http\Controllers;

use App\Models\CorporateSetting;
use Illuminate\Http\Request;

class CorporateSettingController extends Controller
{
    public function show()
    {
        $settings = CorporateSetting::pluck('setting_value', 'setting_key')->toArray();

        $defaults = [
            'slogan' => 'Smart Life, Real Value',
            'email' => 'info@haulaenterprises.co.tz',
            'phone' => '+255 779 646 632 / +255 688 172 822',
            'address' => 'Morogoro & Dar es Salaam, Tanzania',
        ];

        return response()->json([
            'status' => 'success',
            'data' => array_merge($defaults, $settings)
        ]);
    }

    public function update(Request $request)
    {
        $fields = ['slogan', 'email', 'phone', 'address'];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                CorporateSetting::updateOrCreate(
                    ['setting_key' => $field],
                    ['setting_value' => trim($request->input($field))]
                );
            }
        }

        return response()->json(['status' => 'success', 'message' => 'Corporate Credentials updated successfully.']);
    }
}
