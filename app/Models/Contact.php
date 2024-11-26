<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'contact_no',
        'note',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
