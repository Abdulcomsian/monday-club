<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Services\SentEmailServices;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\SentEmailRequest;
use App\Http\Requests\UpdateStatusRequest;

class SentEmailController extends Controller
{
    protected $sentEmailServices;

    public function __construct(SentEmailServices $sentEmailServices)
    {
        $this->sentEmailServices = $sentEmailServices;
    }

    function index()
    {
        $data = $this->sentEmailServices->index();
        return view('user.emails.index',compact('data'));
    }
    public function store(SentEmailRequest $request)
    {
        try {
            $this->sentEmailServices->store($request->validated());

            return redirect()->route('user.contacts.index')
                ->with('success', 'Email Send & stored successfully.');
        } catch (Exception $e) {
            Log::error('Error storing & sending email: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to store and send email.']);
        }
    }

    function show($id)
    {
        $data = $this->sentEmailServices->show($id);
        return view('user.emails.show', compact('data'));
    }

    public function update(UpdateStatusRequest $request)
    {
        try {
            $this->sentEmailServices->update($request->validated());

            return redirect()->route('user.contacts.index')
                ->with('success', 'Email Send & stored successfully.');
        } catch (Exception $e) {
            Log::error('Error storing & sending email: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to store and send email.']);
        }
    }
}
