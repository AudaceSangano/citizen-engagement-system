<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = \App\Models\Complaint::with('user', 'category')->latest()->get();
        return view('admin.complaints.index', compact('complaints'));
    }

    public function show(Complaint $complaint)
    {
        return view('admin.complaints.show', compact('complaint'));
    }

    public function respond(Request $request, Complaint $complaint)
    {
        $request->validate(['response' => 'required|string']);

        $complaint->response = $request->response;
        $complaint->status = 'resolved';
        $complaint->save();

        return redirect()->route('admin.complaints.index')->with('success', 'Response sent and status updated.');
    }
}
