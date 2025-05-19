@extends('layouts.main') {{-- Uses the default layout from Laravel Breeze --}}

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Your Submitted Complaints</h2>

    {{-- Success message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($complaints->isEmpty())
        <div class="alert alert-info">
            You have not submitted any complaints yet.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Subject</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($complaints as $index => $complaint)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $complaint->subject }}</td>
                        <td>{{ $complaint->category->name }}</td>
                        <td>
                            @if ($complaint->status === 'resolved')
                                <span class="badge bg-success">Resolved</span>
                            @elseif ($complaint->status === 'in progress')
                                <span class="badge bg-warning text-dark">In Progress</span>
                            @else
                                <span class="badge bg-secondary">Pending</span>
                            @endif
                        </td>
                        <td>{{ $complaint->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
