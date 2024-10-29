<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Services\MediaServices;
use App\Http\Controllers\Controller;

class VideosController extends Controller
{
    protected $mediaServices;
    public function __construct(MediaServices  $mediaServices)
    {
        $this->mediaServices = $mediaServices;
    }
    function index()
    {
        $data = $this->mediaServices->index();
        return view('user.videos.index', compact('data'));
    }

    function show($id)
    {
        $data = $this->mediaServices->show($id);
        return view('user.videos.show', compact('data'));
    }
}
