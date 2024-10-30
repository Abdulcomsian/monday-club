<?php

namespace App\Http\Controllers\User;

use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\DonationsRequest;
use App\Services\DonationServices;

class DonationsController extends Controller
{
    protected $donationService;
    public function __construct(DonationServices  $donationService)
    {
        $this->donationService = $donationService;
    }
    function index()
    {
        $data = $this->donationService->index();
        return view('user.donations.index', compact('data'));
    }

    function create()
    {
        $data = $this->donationService->create();
        return view('user.donations.create', compact('data'));
    }

    function store(DonationsRequest $request)
    {
        try {
            $this->donationService->store($request->validated());

            return redirect()->route('user.donations.index')
                ->with('success', 'Donation stored successfully.');
        } catch (Exception $e) {
            Log::error('Error storing donation: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to store donation.']);
        }
    }

    function show($id)
    {
        $data = $this->donationService->show($id);
        return view('user.donations.show', compact('data'));
    }

    function edit($id)
    {
        $data = $this->donationService->edit($id);
        return view('user.donations.edit', compact('data'));
    }

    function update(DonationsRequest $request, $id)
    {
        try {
            $this->donationService->update($request->validated(), $id);

            return redirect()->route('user.donations.index')
                ->with('success', 'Document updated successfully.');
        } catch (Exception $e) {
            Log::error('Error updating document: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to update document.']);
        }
    }

    function destroy($id)
    {
        try {
            $this->donationService->destroy($id);

            return redirect()->route('user.donations.index')
                ->with('success', 'Document deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error deleting document: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to delete document.']);
        }
    }
}
