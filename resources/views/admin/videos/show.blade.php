@extends('layouts.main')
@section('title', 'Videos')
@section('header', 'Show')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-fluid fluid">
            <div class="d-flex mb-3">
                <button type="button" class="btn btn-sm btn-primary me-3" onClick="history.back()">
                    <i class="fas fa-arrow-left icon"></i> Back
                </button>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-3 font-weight-bold">Title:</div>
                                <div class="col-md-9">{{ $data->title }}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 font-weight-bold">Description:</div>
                                <div class="col-md-9">{!! $data->description !!}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 font-weight-bold">Video:</div>
                                <div class="col-md-9">
                                    @if ($data->file)
                                        @php
                                            $fileExtension = pathinfo($data->file, PATHINFO_EXTENSION);
                                            $fileUrl = asset($data->file);
                                        @endphp

                                        @if (in_array($fileExtension, ['mp4', 'mov']))
                                            <video width="50%" controls>
                                                <source src="{{ asset($data->file) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @elseif (in_array($fileExtension, ['avi', 'mkv']))
                                            <div>
                                                <a href="{{ asset($data->file) }}">
                                                    <button type="button" class="btn btn-secondary">
                                                        <i class="fas fa-download"></i>
                                                        Download Video</button>
                                                </a>

                                                <p class="text-danger" style="font-size: 0.85rem; margin-top: 5px;">
                                                    This file type is not supported by most browsers for previewing. Please
                                                    download it to view.
                                                </p>
                                            </div>
                                        @else
                                            <p>Unsupported document format.</p>
                                        @endif
                                    @else
                                        <p>No document available.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent

@endsection
