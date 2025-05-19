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
}
