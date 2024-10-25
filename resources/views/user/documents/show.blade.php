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
                                <div class="col-md-9">ANCHOR POINT</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 font-weight-bold">Description:</div>
                                <div class="col-md-9">ANCHOR POINT / SAFETY LINE (PERMANENT)</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 font-weight-bold">Document:</div>
                                <div class="col-md-9">
                                    <iframe src="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf"
                                        width="100%" height="500px" frameborder="0">
                                    </iframe>
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
