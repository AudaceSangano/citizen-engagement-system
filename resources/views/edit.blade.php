<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Complaint</h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('complaints.update', $complaint->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Subject</label>
                        <input type="text" name="subject" class="form-control" value="{{ old('subject', $complaint->subject) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-control" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $complaint->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" required>{{ old('description', $complaint->description) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Update Complaint</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>
