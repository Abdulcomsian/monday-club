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

        $ContractedReplies = Contact::where('user_id', $userId)->where('status', 'contracted')->count();
        $notContractedReplies = Contact::where('user_id', $userId)->where('status', 'not_contracted')->count();
        $positiveReplies = Contact::where('user_id', $userId)->where('status', 'positive_reply')->count();
        $negativeReplies = Contact::where('user_id', $userId)->where('status', 'negative_reply')->count();
        $mediateReplies = Contact::where('user_id', $userId)->where('status', 'mediate_reply')->count();
        $donatedReplies = Contact::where('user_id', $userId)->where('status', 'donated')->count();

        $dollarsRaisedCurrentMonth = Donation::where('user_id', $userId)->where('created_at', '>=', now()->startOfMonth())->sum('amount');
        $dollarsRaisedPastSixMonths = Donation::where('user_id', $userId)->where('created_at', '>=', now()->subMonths(6))->sum('amount');
        $dollarsRaisedPastYear = Donation::where('user_id', $userId)->where('created_at', '>=', now()->subYear())->sum('amount');
        $dollarsRaisedTotal = Donation::where('user_id', $userId)->sum('amount');

        return view('user.dashboard.index', compact(
            'contactsManaged',
            'emailsSentCurrentWeek',
            'emailsSentCurrentMonth',
            'emailsSentPastSixMonths',
            'emailsSentPastYear',
            'ContractedReplies',
            'notContractedReplies',
            'positiveReplies',
            'negativeReplies',
            'mediateReplies',
            'donatedReplies',
            'dollarsRaisedCurrentMonth',
            'dollarsRaisedPastSixMonths',
            'dollarsRaisedPastYear',
            'dollarsRaisedTotal'
        ));
    }
}
