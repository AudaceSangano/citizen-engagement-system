<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends Controller
{
    public function create() {
        $categories = Category::all();
        return view('complaints.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'subject' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Complaint::create([
            'subject' => $request->subject,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Complaint submitted successfully!');
    }

    public function status() {
        $complaints = Complaint::with('category')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('dashboard', compact('complaints'));
    }

    public function list(Request $request) {
        $categories = Category::all();

        return view('new', compact('categories'));
    }

    public function destroy(Complaint $complaint)
    {
        if ($complaint->user_id !== auth()->id()) {
            abort(403);
        }

        $complaint->delete();

        return redirect()->back()->with('success', 'Complaint deleted successfully.');
    }

    public function edit(Complaint $complaint)
    {
        if ($complaint->user_id !== auth()->id()) {
            abort(403);
        }

        $categories = Category::all();
        return view('edit', compact('complaint', 'categories'));
    }

    public function update(Request $request, Complaint $complaint)
    {
        if ($complaint->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'subject' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
        ]);

        $complaint->update($request->only('subject', 'category_id', 'description'));

        return redirect()->route('dashboard')->with('success', 'Complaint updated successfully.');
    }

    public function show($id)
    {
        $complaint = Complaint::with('category')->findOrFail($id);

        return view('show', compact('complaint'));
    }
}
