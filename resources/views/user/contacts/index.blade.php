@extends('layouts.main')
@section('title', 'Contacts')
@section('header', 'List')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="d-flex mb-3">
                <a href="{{ route('user.contacts.create') }}">
                    <button type="button" class="btn btn-sm btn-primary me-3"><i class="fas fa-plus icon"></i>
                        Add New
                    </button>
                </a>
            </div>
            <table id="mytable" class="table table-bordered table-striped table-hover datatable datatable-Role cell-border"
                data-ordering="false">
                <thead>
                    <tr style="text-wrap: nowrap;">
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Contact#</th>
                        <th class="text-center">Note</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="no-records">
                        <td class="text-center">1</td>
                        <td class="text-center">Tom Cruise</td>
                        <td class="text-center">tomcruise@gmail.com</td>
                        <td class="text-center">+143567432</td>
                        <td class="text-center">
                            <p>
                                Lorem Ipsum is simply dummy
                            </p>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-success">Contacted</span>
                            <!-- <span class="badge bg-secondary">Not Contacted</span> -->
                            <!-- <span class="badge bg-info">Positive Reply</span> -->
                            <!-- <span class="badge bg-danger">Negative Reply</span> -->
                            <!-- <span class="badge bg-primary">Donated</span> -->
                        </td>
                        <td class="text-center">
                            <a href="{{ route('user.contacts.show') }}">
                                <button class="btn btn-sm btn-primary">
                                    <i class="mdi mdi-eye"></i> View
                                </button>
                            </a>
                            <a href="{{ route('user.contacts.edit') }}">
                                <button class="btn btn-sm btn-info">
                                    <i class="mdi mdi-pencil"></i> Edit
                                </button>
                            </a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#emailModal">
                                <button class="btn btn-sm btn-success">
                                    <i class="mdi mdi-email-outline"></i> Send Email
                                </button>
                            </a>

                            <button class="btn btn-sm btn-danger">
                                <i class="mdi mdi-delete"></i> Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="emailModalLabel">Send Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="sendEmailForm">
                        <div class="mb-3">
                            <label for="recipientEmail" class="form-label">Recipient Email</label>
                            <input type="email" class="form-control" id="recipientEmail" name="recipientEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="emailSubject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="emailSubject" name="emailSubject" required>
                        </div>
                        <div class="mb-3">
                            <label for="emailBody" class="form-label">Message</label>
                            <textarea class="form-control" id="emailBody" name="emailBody" rows="4" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- Close Button -->
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                        <i class="mdi mdi-close"></i> Close
                    </button>

                    <!-- Send Button -->
                    <button type="submit" class="btn btn-sm btn-primary" form="sendEmailForm">
                        <i class="mdi mdi-send"></i> Send
                    </button>

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
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "scrollX": true,
            });
        });
    </script>
@endsection
