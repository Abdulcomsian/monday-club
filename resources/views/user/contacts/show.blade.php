@extends('layouts.main')
@section('title', 'Contacts')
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
                                <div class="col-md-3 font-weight-bold">Name:</div>
                                <div class="col-md-9">{{ $data->name }}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 font-weight-bold">Email:</div>
                                <div class="col-md-9">{{ $data->email }}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 font-weight-bold">Contact#:</div>
                                <div class="col-md-9">{{ $data->contact_no }}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 font-weight-bold">Status:</div>
                                <div class="col-md-9">
                                    @switch($data->status)
                                        @case('contracted')
                                            <span class="badge bg-success">Contacted</span>
                                            @break
                                        @case('not_contracted')
                                            <span class="badge bg-secondary">Not Contacted</span>
                                            @break
                                        @case('positive_reply')
                                            <span class="badge bg-info">Positive Reply</span>
                                            @break
                                        @case('negative_reply')
                                            <span class="badge bg-danger">Negative Reply</span>
                                            @break
                                        @case('donated')
                                            <span class="badge bg-primary">Donated</span>
                                            @break
                                        @default
                                            <span class="badge bg-light">Unknown Status</span>
                                    @endswitch
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 font-weight-bold">Note:</div>
                                <div class="col-md-9">{!! $data->note !!}</div>
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
