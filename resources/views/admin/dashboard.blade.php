<x-app-layout>
    <x-slot name="header">
        <h2>Admin Dashboard</h2>
    </x-slot>

    <div class="container mt-4">
        <a href="{{ route('admin.complaints.index') }}" class="btn btn-primary">Manage Complaints</a>
    </div>
</x-app-layout>
