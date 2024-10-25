@extends('layouts.main')
@section('title', 'Contacts')
@section('header', 'List')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="container">
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
                            <!-- Uncomment one of the following lines for different statuses -->
                            <!-- <span class="badge bg-secondary">Not Contacted</span> -->
                            <!-- <span class="badge bg-info">Positive Reply</span> -->
                            <!-- <span class="badge bg-danger">Negative Reply</span> -->
                            <!-- <span class="badge bg-primary">Donated</span> -->
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.contacts.show') }}">
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
