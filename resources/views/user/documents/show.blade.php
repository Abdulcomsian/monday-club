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
                                <div class="col-md-3 font-weight-bold">Document:</div>
                                <div class="col-md-9">
                                    @if ($data->file)
                                        <iframe src="{{ asset($data->file) }}" width="100%" height="500px" frameborder="0">
                                            Your browser does not support iframes.
                                        </iframe>
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
