<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Services\ContactServices;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

class ContactsController extends Controller
{
    protected $contactServices;
    public function __construct(ContactServices  $contactServices)
    {
        $this->contactServices = $contactServices;
    }
    function index()
    {
        $data = $this->contactServices->index();
        return view('user.contacts.index', compact('data'));
    }

    function create()
    {
        return view('user.contacts.create');
    }

    function store(ContactRequest $request)
    {
        try {
            $this->contactServices->store($request->validated());

            return redirect()->route('user.contacts.index')
                ->with('success', 'Contact stored successfully.');
        } catch (Exception $e) {
            Log::error('Error storing contact: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to store contact.']);
        }
    }

    function show($id)
    {
        $data = $this->contactServices->show($id);
        return view('user.contacts.show', compact('data'));
    }

    function edit($id)
    {
        $data = $this->contactServices->show($id);
        return view('user.contacts.edit', compact('data'));
    }

    function update(ContactRequest $request, $id)
    {
        try {
            $this->contactServices->update($request->validated(), $id);

            return redirect()->route('user.contacts.index')
                ->with('success', 'Contact updated successfully.');
        } catch (Exception $e) {
            Log::error('Error updating contact: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to update contact.']);
        }
    }

    function destroy($id)
    {
        try {
            $this->contactServices->destroy($id);

            return redirect()->route('user.contacts.index')
                ->with('success', 'Contact deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error deleting contact: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to delete contact.']);
        }
    }
}
