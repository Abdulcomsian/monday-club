<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Services\MediaServices;
use App\Http\Requests\MediaRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class VideosController extends Controller
{
    protected $mediaServices;
    public function __construct(MediaServices  $mediaServices)
    {
        $this->mediaServices = $mediaServices;
    }
    function index()
    {
        $data = $this->mediaServices->index();
        return view('admin.videos.index', compact('data'));
    }

    function create()
    {
        return view('admin.videos.create');
    }

    function store(MediaRequest $request)
    {
        try {
            $this->mediaServices->store($request->validated());

            return redirect()->route('admin.videos.index')
                ->with('success', 'Media stored successfully.');
        } catch (Exception $e) {
            Log::error('Error storing media: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to store media.']);
        }
    }

    function show($id)
    {
        $data = $this->mediaServices->show($id);
        return view('admin.videos.show', compact('data'));
    }

    function edit($id)
    {
        $data = $this->mediaServices->edit($id);
        return view('admin.videos.edit', compact('data'));
    }

    function update(MediaRequest $request, $id)
    {
        try {
            $this->mediaServices->update($request->validated(), $id);

            return redirect()->route('admin.videos.index')
                ->with('success', 'Media updated successfully.');
        } catch (Exception $e) {
            Log::error('Error updating media: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to update media.']);
        }
    }

    function destroy($id)
    {
        try {
            $this->mediaServices->destroy($id);

            return redirect()->route('admin.videos.index')
                ->with('success', 'Media deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error deleting media: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to delete media.']);
        }
    }
}
