<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComplaintRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComplaintRequest $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        //
    }

    public function submitComplaint(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'reason' => 'required|string|max:255',
            'details' => 'nullable|string',
        ]);

        // Create a new complaint
        $complaint = Complaint::create([
            'profile_id' => $validatedData['profile_id'],
            'reason' => $validatedData['reason'],
            'details' => $validatedData['details'],
            'status' => 'pending',
        ]);

        // Return a response indicating success
        return response()->json(['message' => 'Complaint submitted successfully.', 'complaint' => $complaint], 201);
    }
}
