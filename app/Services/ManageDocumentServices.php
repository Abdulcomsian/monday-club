<?php

namespace App\Services;

use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class ManageDocumentServices
{
    protected $model;

    public function __construct(Document $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $user = Auth::user();

        if($user->is_admin == 1) {
            return $this->model::latest()->get();
        } else {
            return $this->model::where('user_id',Auth::id())->latest()->get();
        }
    }
    public function store($data)
    {
        $save = new $this->model;

        if ($data['document']) {
            $directory = 'medias/documents';
            $publicDirectory = public_path($directory);

            if (!file_exists($publicDirectory)) {
                mkdir($publicDirectory, 0755, true);
            }
            $filename = time() . '_' . $data['document']->getClientOriginalName();

            $data['document']->move($publicDirectory, $filename);

            $save->file = "$directory/$filename";
        }
        $save->user_id = Auth::id();
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

        if (isset($data['document'])) {
            $directory = 'medias/documents';
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

            $filename = time() . '_' . $data['document']->getClientOriginalName();
            $data['document']->move($publicDirectory, $filename);

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
        if ($destroy->file) {
            $oldFilePath = public_path($destroy->file);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            $destroy->delete();
        }
    }
}
