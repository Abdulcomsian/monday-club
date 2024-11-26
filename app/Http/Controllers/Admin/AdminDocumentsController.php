<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ManageDocumentServices;

class AdminDocumentsController extends Controller
{
    protected $manageDocumentServices;
    public function __construct(ManageDocumentServices  $manageDocumentServices)
    {
        $this->manageDocumentServices = $manageDocumentServices;
    }
    function index()
    {
        $data = $this->manageDocumentServices->index();
        return view('admin.documents.index', compact('data'));
    }

    function show($id)
    {
        $data = $this->manageDocumentServices->show($id);
        return view('admin.documents.show', compact('data'));
    }
}
