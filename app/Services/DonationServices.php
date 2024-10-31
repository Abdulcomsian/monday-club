<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class DonationServices
{
    protected $model;

    public function __construct(Donation $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->is_admin == 1) {
            return $this->model::latest()->get();
        } else {
            return $this->model::where('user_id', Auth::id())->get();
        }
    }

    public function create()
    {
        $userId = Auth::user()->id;

        return Contact::where('user_id', $userId)->get();
    }

    public function store($data)
    {
        $save = new $this->model;
        $save->user_id = Auth::id();
        $save->contact_id = $data['contact_id'];
        $save->amount = $data['amount'];
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
        $userId = Auth::user()->id;

        $data = $this->model::where('id', $id)->firstOrFail();

        $data->contact = Contact::where('user_id', $userId)->get();
        return $data;
    }

    function destroy($id)
    {
        return $this->model::findOrFail($id)->delete();
    }

    public function update($data, $id)
    {
        $update = $this->model::findOrFail($id);
        $update->contact_id = $data['contact_id'];
        $update->amount = $data['amount'];
        $update->note = $data['note'];

        $update->save();

        return $update;
    }
}