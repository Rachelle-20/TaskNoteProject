<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return Note::with('task')->whereHas('task', function($query) {
            $query->where('user_id', auth()->id());
        })->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'task_id' => 'required|exists:tasks,id',
        ]);

        $note = Note::create($request->all());

        return response()->json([
            'message' => 'Note created successfully',
            'note' => $note
        ], 200);
    }

    public function show(Note $note)
    {
        $this->authorize('view', $note);

        return $note->load('task');
    }

    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note);

        $request->validate([
            'content' => 'sometimes|required|string',
        ]);

        $note->update($request->all());

        return response()->json([
            'message' => 'Note updated successfully',
            'note' => $note
        ], 200);
    }

    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);

        $note->delete();

        return response()->json([
            'message' => 'Note deleted successfully'
        ], 200); // Change to 200 OK to return a message
    }
}
