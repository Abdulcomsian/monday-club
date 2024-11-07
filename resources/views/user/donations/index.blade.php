@extends('layouts.main')
@section('title', 'Donations')
@section('header', 'List')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="d-flex mb-3">
                <a href="{{ route('user.donations.create') }}">
                    <button type="button" class="btn btn-sm btn-primary me-3"><i class="fas fa-plus icon"></i>
                        Add New
                    </button>
                </a>
            </div>
            <table id="mytable"
                class="table table-bordered table-striped table-hover datatable datatable-Role cell-border display nowrap"
                data-ordering="false">
                <thead>
                    <tr style="text-wrap: nowrap;">
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Note</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($data)
                        @foreach ($data as $key => $value)
                            <tr class="no-records">
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">{{ $value->contact->name ?? 'N/A' }} <br> <small>{{ $value->contact->email ?? '' }}
                                </td>
                                <td class="text-center">{{ number_format($value->amount, 2) }}</td>
                                <td class="text-center">
                                    @php
                                        $fullNote = $value->note;
                                    @endphp
                                    {!! Str::words(
                                        $value->note,
                                        10,
                                        '... <a href="#" class="read-more" data-bs-toggle="modal" data-bs-target="#noteModal" data-note="' .
                                            htmlspecialchars($fullNote, ENT_QUOTES) .
                                            '">Read More</a>',
                                    ) !!}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('user.donations.show', $value->id) }}">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="mdi mdi-eye"></i> View
                                        </button>
                                    </a>
                                    <a href="{{ route('user.donations.edit', $value->id) }}">
                                        <button class="btn btn-sm btn-info">
                                            <i class="mdi mdi-pencil"></i> Edit
                                        </button>
                                    </a>

                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target=".bs-delete-modal-center" data-id="{{ $value->id }}"
                                        onclick="setDeleteId(this)">
                                        <i class="mdi mdi-delete"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade bs-delete-modal-center" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="deleteForm" action="{{ route('user.donations.destroy', ['id' => '__ID__']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to delete this listing?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn w-sm" style="background-color: #E30B0B !important;color:#fff;"
                                id="delete-notification">Yes,
                                Delete It!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Note Model --}}
    <div class="modal fade" id="noteModal" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noteModalLabel">Complete Note</h5>
                    <button type="button" class="btn-close btn-m" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modal-note-content"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal"><i
                            class="mdi mdi-close"></i> Close</button>
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
                pageLength: 100,
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
                        targets: [0, 3, 4]
                    }
                ]
            });
        });

        function setDeleteId(button) {
            const dataId = button.getAttribute('data-id');
            const deleteForm = document.getElementById('deleteForm');
            const actionUrl = "{{ route('user.donations.destroy', ['id' => '__ID__']) }}".replace('__ID__', dataId);
            deleteForm.setAttribute('action', actionUrl);
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.read-more').forEach(button => {
                button.addEventListener('click', function() {
                    const fullNote = button.getAttribute('data-note');
                    document.getElementById('modal-note-content').innerHTML =
                        fullNote;
                });
            });
        });
    </script>
@endsection
