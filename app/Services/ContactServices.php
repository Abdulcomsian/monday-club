<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactServices
{
    protected $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $user = Auth::user();

        if($user->is_admin == 1) {
            return $this->model::latest()->get();
        } else {
            return $this->model::where('user_id',Auth::id())->get();
        }
    }
    public function store($data)
    {
        $save = new $this->model;
        $save->user_id = Auth::id();
        $save->name = $data['name'];
        $save->email = $data['email'];
        $save->contact_no = $data['contact'];
        $save->note = $data['note'];
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

    function destroy($id)
    {
        return $this->model::findOrFail($id)->delete();
    }

    public function update($data, $id)
    {
        $update = $this->model::findOrFail($id);
        $update->name = $data['name'];
        $update->email = $data['email'];
        $update->contact_no = $data['contact'];
        $update->note = $data['note'];
        $update->status = $data['status'];
        $update->save();

        return $update;
    }
}
