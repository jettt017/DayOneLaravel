<form method="GET">
    <textarea name="prompt" rows="6"></textarea>
    <button>Kirim</button>
</form>

@if (isset($response))
    {{ $response }}
@endif