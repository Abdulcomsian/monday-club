<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SentEmail extends Model
{
    protected $table = 'sent_emails';

    protected $fillable = [
        'user_id',
        'recipient_id',
        'subject',
        'message'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'recipient_id');
    }
}
