@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h1 class="display-4 mb-4">Welcome to the Citizen Engagement System</h1>
    <p class="lead mb-5">Submit complaints or feedback and track them as they’re handled by the appropriate government agency.</p>

    @guest
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg">Register</a>
    @else
        <a href="{{ route('complaints.create') }}" class="btn btn-success btn-lg">Submit a Complaint</a>
    @endguest
</div>
@endsection
