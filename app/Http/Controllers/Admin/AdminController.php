<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Models\Donation;
use App\Models\SentEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();

        $emailsSent = SentEmail::count();
        $contactsManaged = Contact::count();
        $positiveReplies = Contact::where('status', 'positive_reply')->count();
        $dollarsRaised = Donation::sum('amount');

        return view('admin.dashboard.index', compact('emailsSent', 'contactsManaged', 'positiveReplies', 'dollarsRaised'));
    }
}
