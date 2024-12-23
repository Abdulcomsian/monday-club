<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryServices;

class CategoryController extends Controller
{
    protected $categoryServices;
    public function __construct(CategoryServices  $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }
    function index()
    {
        $data = $this->categoryServices->index();
        return view('admin.categories.index', compact('data'));
    }

    function create()
    {
        return view('admin.categories.create');
    }

    function store(CategoryRequest $request)
    {
        try {
            $this->categoryServices->store($request->validated());

            return redirect()->route('admin.categories.index')
                ->with('success', 'Category stored successfully.');
        } catch (Exception $e) {
            Log::error('Error storing category: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to store category.']);
        }
    }

    function show($id)
    {
        $data = $this->categoryServices->show($id);
        return view('admin.categories.show', compact('data'));
    }

    function edit($id)
    {
        $data = $this->categoryServices->edit($id);
        return view('admin.categories.edit', compact('data'));
    }

    function update(CategoryRequest $request, $id)
    {
        try {
            $this->categoryServices->update($request->validated(), $id);

            return redirect()->route('admin.categories.index')
                ->with('success', 'Category updated successfully.');
        } catch (Exception $e) {
            Log::error('Error updating category: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to update category.']);
        }
    }

    function destroy($id)
    {
        try {
            $this->categoryServices->destroy($id);

            return redirect()->route('admin.categories.index')
                ->with('success', 'Category deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error deleting category: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to delete category.']);
        }
    }
}
