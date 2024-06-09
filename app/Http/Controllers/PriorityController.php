<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function index()
    {
        return Priority::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $priority = Priority::create($request->all());

        return response()->json($priority, 201);
    }

    public function show(Priority $priority)
    {
        return $priority;
    }

    public function update(Request $request, Priority $priority)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $priority->update($request->all());

        return response()->json([
            'message' => 'Priority updated successfully',
            'priority' => $priority
        ], 200);
    }

    public function destroy(Priority $priority)
    {
        $priority->delete();

        return response()->json([
            'message' => 'Priority deleted successfully'
        ], 200); // Change to 200 OK to return a message
    }
}
