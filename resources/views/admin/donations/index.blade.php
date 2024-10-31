@extends('layouts.main')
@section('title', 'Donations')
@section('header', 'List')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
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
                                <td class="text-center">{{ $value->contact->name }} <br> <small>{{ $value->contact->email }}
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
                                    <a href="{{ route('admin.donations.show', $value->id) }}">
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