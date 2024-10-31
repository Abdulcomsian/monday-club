<?php

namespace App\Http\Controllers\User;

use App\Models\Contact;
use App\Models\Donation;
use App\Models\SentEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();

        $emailsSent = SentEmail::where('user_id', $userId)->count();
        $contactsManaged = Contact::where('user_id', $userId)->count();
        $positiveReplies = Contact::where('user_id', $userId)
        ->where('status', 'positive_reply')
        ->count();
        $dollarsRaised = Donation::where('user_id', $userId)->sum('amount');

        return view('user.dashboard.index', compact('emailsSent', 'contactsManaged', 'positiveReplies', 'dollarsRaised'));
    }
}
