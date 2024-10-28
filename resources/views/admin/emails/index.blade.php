@extends('layouts.main')
@section('title', 'Emails')
@section('header', 'List')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <table id="mytable" class="table table-bordered table-striped table-hover datatable datatable-Role cell-border"
                data-ordering="false">
                <thead>
                    <tr style="text-wrap: nowrap;">
                        <th class="text-center">#</th>
                        <th class="text-center">Recipient Email</th>
                        <th class="text-center">Subject</th>
                        <th class="text-center">Message</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="no-records">
                        <td class="text-center">1</td>
                        <td class="text-center">tomcruise@gmail.com</td>
                        <td class="text-center">Funding Email</td>
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
                            <a href="{{ route('admin.emails.show') }}">
                                <button class="btn btn-sm btn-primary">
                                    <i class="mdi mdi-eye"></i> View
                                </button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
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
