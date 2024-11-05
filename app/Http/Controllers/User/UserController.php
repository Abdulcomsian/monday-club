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

        $contactsManaged = Contact::count();

        $emailsSentCurrentWeek = SentEmail::where('user_id', $userId)->where('created_at', '>=', now()->startOfWeek())->count();
        $emailsSentCurrentMonth = SentEmail::where('user_id', $userId)->where('created_at', '>=', now()->startOfMonth())->count();
        $emailsSentPastSixMonths = SentEmail::where('user_id', $userId)->where('created_at', '>=', now()->subMonths(6))->count();
        $emailsSentPastYear = SentEmail::where('user_id', $userId)->where('created_at', '>=', now()->subYear())->count();

        $positiveReplies = Contact::where('user_id', $userId)->where('status', 'positive_reply')->count();
        $mediateReplies = Contact::where('user_id', $userId)->where('status', 'mediate_reply')->count();
        $negativeReplies = Contact::where('user_id', $userId)->where('status', 'negative_reply')->count();

        $dollarsRaisedCurrentWeek = Donation::where('user_id', $userId)->where('created_at', '>=', now()->startOfWeek())->sum('amount');
        $dollarsRaisedCurrentMonth = Donation::where('user_id', $userId)->where('created_at', '>=', now()->startOfMonth())->sum('amount');
        $dollarsRaisedPastSixMonths = Donation::where('user_id', $userId)->where('created_at', '>=', now()->subMonths(6))->sum('amount');
        $dollarsRaisedPastYear = Donation::where('user_id', $userId)->where('created_at', '>=', now()->subYear())->sum('amount');

        return view('user.dashboard.index', compact(
            'contactsManaged',
            'emailsSentCurrentWeek',
            'emailsSentCurrentMonth',
            'emailsSentPastSixMonths',
            'emailsSentPastYear',
            'positiveReplies',
            'mediateReplies',
            'negativeReplies',
            'dollarsRaisedCurrentWeek',
            'dollarsRaisedCurrentMonth',
            'dollarsRaisedPastSixMonths',
            'dollarsRaisedPastYear'
        ));
    }
}
