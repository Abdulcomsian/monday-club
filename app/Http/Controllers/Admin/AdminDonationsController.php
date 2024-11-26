<?php

namespace App\Http\Controllers\Admin;

use App\Services\DonationServices;
use App\Http\Controllers\Controller;

class AdminDonationsController extends Controller
{
    protected $donationService;
    public function __construct(DonationServices  $donationService)
    {
        $this->donationService = $donationService;
    }
    function index()
    {
        $data = $this->donationService->index();
        return view('admin.donations.index', compact('data'));
    }

    function show($id)
    {
        $result = $this->donationService->show($id);

        return view('admin.donations.show', [
            'data' => $result['data'],
            'totalAmount' => $result['totalAmount'],
            'userAmount' => $result['userAmount'],
            'percentage' => $result['percentage']
        ]);
    }
}
