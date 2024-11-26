@extends('layouts.main')
@section('title', 'Documents')
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
                                <div class="col-md-3 font-weight-bold">File:</div>
                                <div class="col-md-9">
                                    @if ($data->file)
                                        @php
                                            $fileExtension = pathinfo($data->file, PATHINFO_EXTENSION);
                                            $fileUrl = asset($data->file);
                                        @endphp

                                        @if (in_array($fileExtension, ['pdf']))
                                            <iframe src="{{ $fileUrl }}" width="100%" height="500px" frameborder="0">
                                                Your browser does not support iframes.
                                            </iframe>
                                        @elseif (in_array($fileExtension, ['doc', 'docx']))
                                            <div>
                                                <a href="{{ asset($data->file) }}">
                                                    <button type="button" class="btn btn-secondary">
                                                        <i class="fas fa-download"></i>
                                                        Download File</button>
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
    {{-- script here --}}
@endsection
