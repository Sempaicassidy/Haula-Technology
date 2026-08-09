<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search', '');
        
        $query = ContactMessage::query();
        if (!empty($search)) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('dept', 'like', "%{$search}%")
                  ->orWhere('msg', 'like', "%{$search}%");
        }

        $messages = $query->orderBy('id', 'desc')->get();

        return response()->json([
            'status' => 'success',
            'data' => $messages,
            'count' => $messages->count()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'dept' => 'nullable|string|max:100',
            'msg' => 'required|string',
        ]);

        $message = ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'dept' => $validated['dept'] ?? 'General Inquiry',
            'msg' => $validated['msg'],
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Inquiry submitted successfully! Our leadership team will contact you shortly.',
            'id' => $message->id
        ], 201);
    }

    public function destroy($id)
    {
        $message = ContactMessage::find($id);
        if ($message) {
            $message->delete();
            return response()->json(['status' => 'success', 'message' => 'Message deleted successfully.']);
        }

        return response()->json(['status' => 'error', 'message' => 'Message not found.'], 404);
    }

    public function clear()
    {
        ContactMessage::truncate();
        return response()->json(['status' => 'success', 'message' => 'All inbox messages cleared.']);
    }
}
