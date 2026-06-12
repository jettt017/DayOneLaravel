<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Note;
use App\Ai\Agents\SummaryAgent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NoteTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get('/notes');
        $response->assertRedirect('/login');
    }

    public function test_logged_in_user_can_access_notes(): void
    {
        $user = User::factory()->create();

        $response = $this->withSession([
            'is_logged_in' => true,
            'user_id' => $user->id,
            'username' => $user->name,
        ])->get('/notes');

        $response->assertStatus(200);
    }

    public function test_user_can_store_note(): void
    {
        $user = User::factory()->create();

        $response = $this->withSession([
            'is_logged_in' => true,
            'user_id' => $user->id,
            'username' => $user->name,
        ])->post('/notes', [
            'title' => 'Test Note',
            'content' => 'This is a test note content.',
        ]);

        $response->assertRedirect('/notes');
        $this->assertDatabaseHas('notes', [
            'user_id' => $user->id,
            'title' => 'Test Note',
            'content' => 'This is a test note content.',
        ]);
    }

    public function test_user_can_stream_note_summary(): void
    {
        $user = User::factory()->create();
        $note = Note::create([
            'user_id' => $user->id,
            'title' => 'Summary Test',
            'content' => 'This content needs to be summarized by the AI.',
        ]);

        // Fake the AI Agent response
        SummaryAgent::fake([
            'This content needs to be summarized by the AI.' => 'This is the summarized test content.',
        ]);

        $response = $this->withSession([
            'is_logged_in' => true,
            'user_id' => $user->id,
            'username' => $user->name,
        ])->get("/notes/{$note->id}/summary/stream");

        $response->assertStatus(200);
        $this->assertStringContainsString('text/event-stream', $response->headers->get('Content-Type'));

        // Let's assert that the database was updated
        // Read the stream response body to trigger the stream generator
        $content = $response->streamedContent();
        $this->assertStringContainsString('text_delta', $content);

        // Check if the note summary was saved
        $note->refresh();
        $this->assertNotNull($note->summary);
    }
}
