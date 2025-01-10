@extends('layouts.main')
@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('content')

@if(session('toastr'))
{!! session('toastr') !!}
@endif

<div class="row">
    <div class="col">
        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1" id="greeting"></h4>
                            <p class="text-muted mb-0"> Here's an overview of your donations: track your progress and keep making a difference!</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Total Contacts Managed -->
                <div class="col-xl-3 col-md-6">
                    <div class="card card-animate equal-height">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Contacts Managed</p>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-secondary rounded fs-3">
                                        <i class="mdi mdi-account-multiple"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between">
                                <h4 class="fs-22 fw-semibold ff-secondary mb-0">{{ $contactsManaged }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Emails Sent: Current Week, Current Month, Past 6 Months, Past Year -->
                <div class="col-xl-3 col-md-6">
                    <div class="card card-animate equal-height">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Emails Sent</p>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-primary rounded fs-3">
                                        <i class="mdi mdi-email-outline"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p>Current Week: <strong>{{ $emailsSentCurrentWeek }}</strong></p>
                                <p>Current Month: <strong>{{ $emailsSentCurrentMonth }}</strong></p>
                                <p>Past 6 Months: <strong>{{ $emailsSentPastSixMonths }}</strong></p>
                                <p>Past Year: <strong>{{ $emailsSentPastYear }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Positive, Mediate, Negative Replies -->
                <div class="col-xl-3 col-md-6">
                    <div class="card card-animate equal-height">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Replies</p>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-success rounded fs-3">
                                        <i class="mdi mdi-comment-check-outline"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p>Contracted: <strong>{{ $ContractedReplies }}</strong></p>
                                <p>Not Contracted: <strong>{{ $notContractedReplies }}</strong></p>
                                <p>Positive Replies: <strong>{{ $positiveReplies }}</strong></p>
                                <p>Negative Replies: <strong>{{ $negativeReplies }}</strong></p>
                                <p>Mediate Replies: <strong>{{ $mediateReplies }}</strong></p>
                                <p>Sponsors: <strong>{{ $donatedReplies }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dollars Raised: Current Week, Current Month, Past 6 Months, Past Year -->
                <div class="col-xl-3 col-md-6">
                    <div class="card card-animate equal-height">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Dollars Raised</p>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-danger rounded fs-3">
                                        <i class="mdi mdi-wallet-travel"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mt-4">
                                {{-- <p>Current Week: <strong>${{ number_format($dollarsRaisedCurrentWeek, 2) }}</strong></p> --}}
                                <p>Current Month: <strong>${{ number_format($dollarsRaisedCurrentMonth, 2) }}</strong></p>
                                <p>Past 6 Months: <strong>${{ number_format($dollarsRaisedPastSixMonths, 2) }}</strong></p>
                                <p>Past Year: <strong>${{ number_format($dollarsRaisedPastYear, 2) }}</strong></p>
                                <p>Total: <strong>${{ number_format($dollarsRaisedTotal, 2) }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
