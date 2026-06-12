<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ai\Agents\SummaryAgent;
use Illuminate\Support\Str;
use Laravel\Ai\Files;
use App\Ai\Agents\ImageAnalyzer;
use App\Models\User;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(session('user_id'));

        $notes = $user->notes()->latest()->get();

        return view('notes.index', [
            'notes' => $notes
        ]);
    }

    public function store(Request $request)
    {
        Note::create([
            'user_id' => session('user_id'),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/notes');
    }

    public function show ($id) 
    {
        $user = User::findOrFail(session('user_id'));

        $note = $user->notes()->findOrFail($id);

        return view('notes.show', [
            'note' => $note
        ]);
    }

    public function summary ($id)
    {
        $user = User::findOrFail(session('user_id'));

        $note = $user->notes()->findOrFail($id);

        if (!empty($note['document'])) {
            $path = storage_path('app/private/' . $note['document']);
            $file = Files\Document::fromPath($path);

            $summary = SummaryAgent::make()->prompt(
                'Buat ringkasan yang jelas, singkat dan mudah dipahami.',
                attachments: [
                    $file
                ]
            );
        } else {
            $summary = SummaryAgent::make()->prompt(
                $note->content
            );
        }

        $note->summary = Str::markdown(
            (string) $summary
        );

        $note->save();

        return redirect("/notes/{$id}");

    }

    public function upload (Request $request)
    {
        $path = $request->file('document')->store('documents');
        Note::create([
            'user_id' => session('user_id'),
            'title' => $request->file('document')->getClientOriginalName(),
            'content' => $path,
        ]);

        return redirect('/notes');
    }

    public function destroy ($id)
    {
        $user = User::findOrFail(session('user_id'));
        $note = $user->notes()->findOrFail($id);
        $note->delete();

        return redirect('/notes');
    }
}
