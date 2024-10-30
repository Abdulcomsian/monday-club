<?php

namespace App\Http\Controllers\Admin;

use App\Services\SentEmailServices;
use App\Http\Controllers\Controller;

class AdminEmailsController extends Controller
{
    protected $sentEmailServices;

    public function __construct(SentEmailServices $sentEmailServices)
    {
        $this->sentEmailServices = $sentEmailServices;
    }

    function index()
    {
        $data = $this->sentEmailServices->index();
        return view('admin.emails.index',compact('data'));
    }

    function show($id)
    {
        $data = $this->sentEmailServices->show($id);
        return view('admin.emails.show', compact('data'));
    }
}
