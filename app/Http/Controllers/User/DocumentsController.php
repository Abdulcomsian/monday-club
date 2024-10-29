<?php

namespace App\Http\Controllers\User;

use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManageDocumentRequest;
use App\Services\ManageDocumentServices;

class DocumentsController extends Controller
{
    protected $manageDocumentServices;
    public function __construct(ManageDocumentServices  $manageDocumentServices)
    {
        $this->manageDocumentServices = $manageDocumentServices;
    }
    function index()
    {
        $data = $this->manageDocumentServices->index();
        return view('user.documents.index', compact('data'));
    }

    function create()
    {
        return view('user.documents.create');
    }

    function store(ManageDocumentRequest $request)
    {
        try {
            $this->manageDocumentServices->store($request->validated());

            return redirect()->route('user.documents.index')
                ->with('success', 'Document stored successfully.');
        } catch (Exception $e) {
            Log::error('Error storing document: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to store document.']);
        }
    }

    function show($id)
    {
        $data = $this->manageDocumentServices->show($id);
        return view('user.documents.show', compact('data'));
    }

    function edit($id)
    {
        $data = $this->manageDocumentServices->edit($id);
        return view('user.documents.edit', compact('data'));
    }

    function update(ManageDocumentRequest $request, $id)
    {
        try {
            $this->manageDocumentServices->update($request->validated(), $id);

            return redirect()->route('user.documents.index')
                ->with('success', 'Document updated successfully.');
        } catch (Exception $e) {
            Log::error('Error updating document: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to update document.']);
        }
    }

    function destroy($id)
    {
        try {
            $this->manageDocumentServices->destroy($id);

            return redirect()->route('user.documents.index')
                ->with('success', 'Document deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error deleting document: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to delete document.']);
        }
    }
}
