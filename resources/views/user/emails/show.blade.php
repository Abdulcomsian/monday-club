@extends('layouts.main')
@section('title', 'Emails')
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
                                <div class="col-md-3 font-weight-bold">Recipient Email:</div>
                                <div class="col-md-9">tomcruise@gmail.com</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 font-weight-bold">Subject:</div>
                                <div class="col-md-9">Funding Email</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 font-weight-bold">Message:</div>
                                <div class="col-md-9">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 font-weight-bold">Status:</div>
                                <div class="col-md-9">
                                    <span class="badge bg-success">Contacted</span>
                            <!-- <span class="badge bg-secondary">Not Contacted</span> -->
                            <!-- <span class="badge bg-info">Positive Reply</span> -->
                            <!-- <span class="badge bg-danger">Negative Reply</span> -->
                            <!-- <span class="badge bg-primary">Donated</span> -->
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
{{-- script here --}}
@endsection
