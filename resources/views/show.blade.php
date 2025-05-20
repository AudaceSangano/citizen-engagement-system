<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Complaint Details') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">← Back to List</a>

        <div class="card">
            <div class="card-header">Complaint: {{ $complaint->subject }}</div>
            <div class="card-body">
                <p><strong>Category:</strong> {{ $complaint->category->name }}</p>
                <p><strong>Status:</strong> {{ ucfirst($complaint->status) }}</p>
                <p><strong>Description:</strong><br>{{ $complaint->description }}</p>
                <p><strong>Submitted:</strong> {{ $complaint->created_at->format('d M Y, H:i') }}</p>
                @if ($complaint->response)
                    <p><strong>Admin Response:</strong><br>{{ $complaint->response }}</p>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>
