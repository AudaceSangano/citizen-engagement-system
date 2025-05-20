<x-app-layout>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2>Complaint Detail</h2>
    </x-slot>

    <div class="container mt-4">
        <h4>Subject: {{ $complaint->subject }}</h4>
        <p><strong>Category:</strong> {{ $complaint->category->name }}</p>
        <p><strong>Description:</strong> {{ $complaint->description }}</p>
        <p><strong>Status:</strong> {{ $complaint->status }}</p>

        <form method="POST" action="{{ route('admin.complaints.respond', $complaint->id) }}">
            @csrf
            <div class="mb-3">
                <label>Response</label>
                <textarea name="response" class="form-control" required>{{ $complaint->response }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit Response</button>
            <a href="{{ route('admin.complaints.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>
