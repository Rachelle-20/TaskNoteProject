<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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

        return response()->json($priority, 200);
    }

    public function destroy(Priority $priority)
    {
        $priority->delete();

        return response()->json(null, 204);
    }
}
