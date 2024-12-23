<?php

namespace App\Services;

use App\Models\Category;

class CategoryServices
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model::latest()->get();
    }

    public function store($data)
    {
        $save = new $this->model;

        $save->title = $data['title'];
        $save->description = $data['description'];

        $save->save();

        return $save;
    }

    function show($id)
    {
        return $this->model::findOrFail($id);
    }

    function edit($id)
    {
        return $this->model::findOrFail($id);
    }

    public function update($data, $id)
    {
        $update = $this->model::findOrFail($id);

        if (isset($data['video_file'])) {
            $directory = 'videos';
            $publicDirectory = public_path($directory);

            if (!file_exists($publicDirectory)) {
                mkdir($publicDirectory, 0755, true);
            }

            if ($update->file) {
                $oldFilePath = public_path($update->file);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $filename = time() . '_' . $data['video_file']->getClientOriginalName();
            $data['video_file']->move($publicDirectory, $filename);

            $update->file = "$directory/$filename";
        }

        $update->title = $data['title'];
        $update->description = $data['description'];

        $update->save();

        return $update;
    }

    function destroy($id)
    {
        $destroy = $this->model::findOrFail($id);
            $destroy->delete();
    }
}
