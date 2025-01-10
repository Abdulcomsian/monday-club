@extends('layouts.main')
@section('title', 'Modules')
@section('header', 'Modules')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="container-fluid fluid">
            <div class="row">
                @isset($data)
                @foreach ($data as $key => $value)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $value->title }}</h5>
                            @php
                            $fullDescription = $value->description;
                            @endphp
                            <p class="card-text">
                                {!! Str::words(
                                $value->description,
                                15,
                                '... <a href="#" class="read-more" data-bs-toggle="modal" data-bs-target="#descriptionModal" data-description="' .
                                    htmlspecialchars($fullDescription, ENT_QUOTES) . '">Read More</a>'
                                ) !!}
                            </p>
                            <a href="{{ route('user.videos.list', $value->id) }}">
                            <button class="btn btn-sm btn-primary float-end">
                                <i class="mdi mdi-eye"></i> View
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset
            </div>
            <div class="d-flex justify-content-end">
                {{ $data->links() }}
            </div>
        </div>

    <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="descriptionModalLabel">Complete Description</h5>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modal-description-content"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal"><i class="mdi mdi-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('script')
    @parent
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable({
                autoWidth: false,
                responsive: true,
                scrollX: true,
                scrollCollapse: true,
                pageLength: 10,
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],

                columnDefs: [{
                        width: '10%',
                        targets: 0
                    },
                    {
                        orderable: false,
                        targets: [3, 4]
                    }
                ]
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.read-more').forEach(button => {
                button.addEventListener('click', function() {
                    const fullDescription = button.getAttribute('data-description');
                    document.getElementById('modal-description-content').innerHTML =
                        fullDescription;
                });
            });
        });
    </script>
    @endsection
