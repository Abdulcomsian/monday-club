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
                                <div class="col-md-9">{{ $data->contact->name ?? 'N/A' }} <br> <small>{{ $data->contact->email ?? '' }}</div>
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
                <div class="container" style="display: flex; flex-direction: column; align-items: center; padding-top: 20px;">
                    <!-- Heading -->
                    <div class="d-flex justify-content-center w-100">
                        <h2 class="donation-heading text-center" style="margin-top: 0;">Donations Chart</h2>
                    </div>

                    <!-- Chart Container -->
                    <div class="chart-container" style="position: relative; height: 400px; width: 400px; display: flex; justify-content: center; align-items: center;">
                        <canvas id="donationChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@parent
<script>
    var ctx = document.getElementById('donationChart').getContext('2d');

    var percentage = @json($percentage);
    var remainingPercentage = 100 - percentage;

    var donationByUserLabel = 'Donation by ' + @json($data->contact->name);
    var otherLabel = 'Others';

    var data = {
        labels: [donationByUserLabel, otherLabel],
        datasets: [{
            data: [percentage, remainingPercentage],
            backgroundColor: ['#32CD32', '#E5E5E5'],
            borderWidth: 1,
        }]
    };

    var options = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.raw.toFixed(2) + '%';
                    }
                }
            }
        }
    };

    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
    });
</script>
@endsection
