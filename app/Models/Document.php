<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    protected $fillable = [
        'user_id',
        'title',
        'file',
        'description'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
