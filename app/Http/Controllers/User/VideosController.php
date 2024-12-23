<?php

namespace App\Http\Controllers\User;

use App\Services\MediaServices;
use App\Http\Controllers\Controller;

class VideosController extends Controller
{
    protected $mediaServices;
    public function __construct(MediaServices  $mediaServices)
    {
        $this->mediaServices = $mediaServices;
    }

    function categories()
    {
        $data = $this->mediaServices->categories();
        return view('user.videos.index', compact('data'));
    }

    function list($id)
    {
        $data = $this->mediaServices->list($id);
        return view('user.videos.list', compact('data'));
    }

    function show($id)
    {
        $data = $this->mediaServices->show($id);
        return view('user.videos.show', compact('data'));
    }
}
