<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('is_active', true)->latest()->get();
        return response()->json($testimonials);
    }

    public function all()
    {
        $testimonials = Testimonial::latest()->get();
        return response()->json($testimonials);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'author_name' => 'required|string|max:255',
            'author_role' => 'nullable|string|max:255',
            'avatar' => 'nullable|string|max:50',
            'quote_sw' => 'nullable|string',
            'quote_en' => 'required|string',
            'rating' => 'integer|min:1|max:5',
        ]);

        if (empty($validated['avatar'])) {
            $validated['avatar'] = '👨‍💼';
        }

        if (empty($validated['quote_sw'])) {
            $validated['quote_sw'] = $validated['quote_en'];
        }

        $testimonial = Testimonial::create($validated);
        return response()->json(['message' => 'Testimonial added successfully', 'testimonial' => $testimonial]);
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();
        return response()->json(['message' => 'Testimonial deleted successfully']);
    }

    public function toggle($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->is_active = !$testimonial->is_active;
        $testimonial->save();
        return response()->json(['message' => 'Status updated', 'is_active' => $testimonial->is_active]);
    }
}
