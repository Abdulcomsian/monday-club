@extends('layouts.main')
@section('title', 'Contacts')
@section('header', 'List')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-fluid fluid">
            <table id="mytable"
                class="table table-bordered table-striped table-hover datatable datatable-Role cell-border display nowrap"
                data-ordering="false">
                <thead>
                    <tr style="text-wrap: nowrap;">
                        <th class="text-center">#</th>
                        <th class="text-center">Created By</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Contact#</th>
                        <th class="text-center">Note</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($data)
                        @foreach ($data as $key => $value)
                            <tr class="no-records">
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">{{ $value->user->name }} <br> <small>{{ $value->user->email }}</td>
                                <td class="text-center">{{ $value->name }}</td>
                                <td class="text-center">{{ $value->email }}</td>
                                <td class="text-center">{{ $value->contact_no }}</td>
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
                                    @switch($value->status)
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
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.contacts.show', $value->id) }}">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="mdi mdi-eye"></i> View
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
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
                    const fullNote = button.getAttribute('data-note');
                    document.getElementById('modal-note-content').innerHTML =
                        fullNote;
                });
            });
        });
    </script>
@endsection
