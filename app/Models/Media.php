<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';

    protected $fillable = [
        'title',
        'file',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
