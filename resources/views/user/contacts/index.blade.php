@extends('layouts.model_main')
@section('title', 'Contacts')
@section('header', 'List')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-fluid fluid">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('user.contacts.create') }}">
                        <button type="button" class="btn btn-sm btn-primary me-3"><i class="fas fa-plus icon"></i>
                            Add New
                        </button>
                    </a>
                </div>

                <div class="col-md-3">
                    <select id="statusFilter" class="form-select me-3">
                        <option value="">Select Status</option>
                        <option value="contracted">Contacted</option>
                        <option value="not_contracted">Not Contacted</option>
                        <option value="positive_reply">Positive Reply</option>
                        <option value="negative_reply">Negative Reply</option>
                        <option value="donated">Sponsors</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-sm btn-info" id="filterButton"><i class="fas fa-refresh icon"></i> Update</button>
                </div>
            </div>
            <table id="mytable"
                class="table table-bordered table-striped table-hover datatable datatable-Role cell-border display nowrap"
                data-ordering="false">
                <thead>
                    <tr style="text-wrap: nowrap;">
                        <th class="text-center">Status</th>
                        <th class="text-center"><input type="checkbox" id="selectAll"></th>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Note</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($data)
                        @foreach ($data as $key => $value)
                            <tr class="no-records" data-id="{{ $value->id }}">
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
                                            <span class="badge bg-primary">Sponsors</span>
                                        @break

                                        @default
                                            <span class="badge bg-light">Unknown Status</span>
                                    @endswitch
                                </td>
                                <td class="text-center"><input type="checkbox" class="contact-checkbox"></td>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">{{ $value->name }}</td>
                                <td class="text-center">{{ $value->email }}</td>
                                <td class="text-center">{{ $value->contact_no }}</td>
                                <td class="text-center">
                                    @php
                                        $fullNote = $value->note;
                                    @endphp
                                    {!! Str::words(
                                        $value->note,
                                        5,
                                        '... <a href="#" class="read-more" data-bs-toggle="modal" data-bs-target="#noteModal" data-note="' .
                                            htmlspecialchars($fullNote, ENT_QUOTES) .
                                            '">Read More</a>',
                                    ) !!}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('user.contacts.show', $value->id) }}">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="mdi mdi-eye"></i> View
                                        </button>
                                    </a>
                                    <a href="{{ route('user.contacts.edit', $value->id) }}">
                                        <button class="btn btn-sm btn-info">
                                            <i class="mdi mdi-pencil"></i> Edit
                                        </button>
                                    </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#emailModal"
                                        data-user-email="{{ $value->email }}" data-recipient-id="{{ $value->id }}"
                                        data-user-id="{{ $value->user_id }}">
                                        <button class="btn btn-sm btn-success">
                                            <i class="mdi mdi-email-outline"></i> Send Email
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
                <form id="deleteForm" action="{{ route('user.contacts.destroy', ['id' => '__ID__']) }}" method="POST">
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
                            <button type="submit" class="btn w-sm"
                                style="background-color: #E30B0B !important;color:#fff;" id="delete-notification">Yes,
                                Delete It!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade no-scroll-modal" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="emailModalLabel">Send Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.sent_emails.store') }}" method="post" id="sendEmailForm">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="recipientEmail" class="form-label">Recipient Email</label>
                            <input type="email" class="form-control" id="recipientEmail" name="recipient_email"
                            style="background-color: #f0f0f0;"
                                readonly required>
                            <input type="hidden" id="recipientId" name="recipient_id">
                            <input type="hidden" id="userId" name="user_id">
                        </div>
                        <div class="mb-3">
                            <label for="emailSubject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="emailSubject" name="subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="emailBody" class="form-label">Message</label>
                            <textarea name="message" class="form-control" id="editor"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                            <i class="mdi mdi-close"></i> Close
                        </button>
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="mdi mdi-send"></i> Send
                        </button>
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
                autoWidth: true,
                responsive: true,
                scrollX: true,
                scrollCollapse: true,
                pageLength: 10,
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                columnDefs: [
                    {
                        width: '15%',
                        targets: 6
                    },
                    {
                        width: '10%',
                        targets: 7
                    },
                    {
                        orderable: false,
                        targets: [0, 3, 4]
                    }
                ]
            });

            $('#selectAll').on('change', function() {
                $('.contact-checkbox').prop('checked', this.checked);
            });

            $('#filterButton').on('click', function() {
                const selectedStatus = $('#statusFilter').val();
                const selectedIds = $('.contact-checkbox:checked').map(function() {
                    return $(this).closest('tr').data('id');
                }).get();

                if (selectedIds.length === 0) {
                    alert('Please select at least one contact to update.');
                    return;
                }

                $.ajax({
                    url: '{{ route("user.sent_emails.update") }}',
                    method: 'POST',
                    data: {
                        ids: selectedIds,
                        status: selectedStatus,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        var toast = new bootstrap.Toast(document.getElementById(
                            'successToast'));
                        toast.show();

                        $('.contact-checkbox').prop('checked', false);
                        $('#selectAll').prop('checked', false);

                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    },
                    error: function(xhr) {
                        alert('An error occurred while updating status.');
                    }
                });
            });
        });

        function setDeleteId(button) {
            const dataId = button.getAttribute('data-id');
            const deleteForm = document.getElementById('deleteForm');
            const actionUrl = "{{ route('user.contacts.destroy', ['id' => '__ID__']) }}".replace('__ID__', dataId);
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

            const emailModal = document.getElementById('emailModal');

            emailModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const userEmail = button.getAttribute('data-user-email');
                const recipientId = button.getAttribute('data-recipient-id');
                const userId = button.getAttribute('data-user-id');

                document.getElementById('recipientEmail').value = userEmail;
                document.getElementById('recipientId').value = recipientId;
                document.getElementById('userId').value = userId;
            });
        });

        ClassicEditor
            .create(document.querySelector('#editor'), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle',
                    'ImageToolbar', 'ImageUpload', 'MediaEmbed',,'Table','TableToolbar'
                ],
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
