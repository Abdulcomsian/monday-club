<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\SentEmail;
use App\Mail\SentEmailMailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SentEmailServices
{
    protected $model;

    public function __construct(SentEmail $model)
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

    public function store(array $data)
    {
        $contact = Contact::findOrFail($data['recipient_id']);

        $emailData = [
            'subject' => $data['subject'],
            'message' => $data['message'],
        ];

        Mail::to($data['recipient_email'])->send(new SentEmailMailable($emailData));

        $email = $this->model->create([
            'user_id' => Auth::id(),
            'recipient_id' => $data['recipient_id'],
            'subject' => $data['subject'],
            'message' => $data['message'],
        ]);

        $contact->status = 'contracted';
        $contact->save();

        return $email;
    }

    function show($id)
    {
        return $this->model::findOrFail($id);
    }

    public function update(array $data)
    {
        $ids = $data['ids'];
        $status = $data['status'];

        foreach ($ids as $id) {
            $contact = Contact::findOrFail($id);
            $contact->status = $status;
            $contact->save();
        }
    }
}
