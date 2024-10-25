@extends('layouts.main')
@section('title', 'Videos')
@section('header', 'Show')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container-fluid fluid">
        <div>
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
                                <div class="col-md-9">ANCHOR POINT</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 font-weight-bold">Description:</div>
                                <div class="col-md-9">ANCHOR POINT / SAFETY LINE (PERMANENT)</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 font-weight-bold">Video:</div>
                                <div class="col-md-9">
                                    <video width="100%" controls>
                                        <source src="path-to-video.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
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
