@extends('layouts.main')
@section('title', 'Videos')
@section('header', 'Videos')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="container-fluid fluid">
        <div class="d-flex mb-3">
                <button type="button" class="btn btn-sm btn-primary me-3" onClick="history.back()">
                    <i class="fas fa-arrow-left icon"></i> Back
                </button>
            </div>
            <div class="row">
                @isset($data)
                @if ($data->isEmpty())
                <div class="col-12">
                    <div class="alert alert-warning text-center" role="alert">
                        No data available for this category.
                    </div>
                </div>
            @else
                @foreach ($data as $key => $value)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $value->title }}</h5>
                            @if ($value->file)
                                        @php
                                            $fileExtension = pathinfo($value->file, PATHINFO_EXTENSION);
                                            $fileUrl = asset($value->file);
                                        @endphp

                                        @if (in_array($fileExtension, ['mp4', 'mov']))
                                            <video width="100%" controls>
                                                <source src="{{ asset($value->file) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @elseif (in_array($fileExtension, ['avi', 'mkv']))
                                            <div>
                                                <a href="{{ asset($value->file) }}">
                                                    <button type="button" class="btn btn-secondary">
                                                        <i class="fas fa-download"></i>
                                                        Download Video</button>
                                                </a>

                                                <p class="text-danger" style="font-size: 0.85rem; margin-top: 5px;">
                                                    This file type is not supported by most browsers for previewing. Please
                                                    download it to view.
                                                </p>
                                            </div>
                                        @else
                                            <p>Unsupported video format.</p>
                                        @endif
                                    @else
                                        <p>No video available.</p>
                                    @endif
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
                            <a href="{{ route('user.videos.show', $value->id) }}">
                            <button class="btn btn-sm btn-primary float-end">
                                <i class="mdi mdi-eye"></i> View
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
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

        function setVideoId(button) {
            const videoId = button.getAttribute('data-id');
            const deleteForm = document.getElementById('deleteForm');
            const actionUrl = "{{ route('admin.videos.destroy', ['id' => '__ID__']) }}".replace('__ID__', videoId);
            deleteForm.setAttribute('action', actionUrl);
        }

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
