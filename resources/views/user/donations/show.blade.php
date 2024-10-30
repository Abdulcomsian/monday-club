@extends('layouts.main')
@section('title', 'Donations')
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
                                <div class="col-md-3 font-weight-bold">Contact:</div>
                                <div class="col-md-9">{{ $data->contact->name }} <br> <small>{{ $data->contact->email }}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 font-weight-bold">Amount:</div>
                                <div class="col-md-9">{{ number_format($data->amount, 2) }}</div>
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
