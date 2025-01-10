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

        $contactsManaged = Contact::count();

        $emailsSentCurrentWeek = SentEmail::where('created_at', '>=', now()->startOfWeek())->count();
        $emailsSentCurrentMonth = SentEmail::where('created_at', '>=', now()->startOfMonth())->count();
        $emailsSentPastSixMonths = SentEmail::where('created_at', '>=', now()->subMonths(6))->count();
        $emailsSentPastYear = SentEmail::where('created_at', '>=', now()->subYear())->count();

        $ContractedReplies = Contact::where('status', 'contracted')->count();
        $notContractedReplies = Contact::where('status', 'not_contracted')->count();
        $positiveReplies = Contact::where('status', 'positive_reply')->count();
        $negativeReplies = Contact::where('status', 'negative_reply')->count();
        $mediateReplies = Contact::where('status', 'mediate_reply')->count();
        $donatedReplies = Contact::where('status', 'donated')->count();

        $dollarsRaisedCurrentWeek = Donation::where('created_at', '>=', now()->startOfWeek())->sum('amount');
        $dollarsRaisedCurrentMonth = Donation::where('created_at', '>=', now()->startOfMonth())->sum('amount');
        $dollarsRaisedPastSixMonths = Donation::where('created_at', '>=', now()->subMonths(6))->sum('amount');
        $dollarsRaisedPastYear = Donation::where('created_at', '>=', now()->subYear())->sum('amount');
        $dollarsRaisedTotal = Donation::sum('amount');

        return view('admin.dashboard.index', compact(
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
            'dollarsRaisedCurrentWeek',
            'dollarsRaisedCurrentMonth',
            'dollarsRaisedPastSixMonths',
            'dollarsRaisedPastYear',
            'dollarsRaisedTotal'
        ));
    }
}
