@extends('layouts.main')
@section('title', 'Videos')
@section('header', 'Videos')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="container">
            <div class="d-flex mb-3">
                <a href="{{ route('admin.videos.create') }}">
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
                        <th class="text-center">Title</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Video</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="no-records">
                        <td class="text-center">1</td>
                        <td class="text-center">ANCHOR POINT</td>
                        <td class="text-center">ANCHOR POINT / SAFETY LINE (PERMANENT)</td>
                        <td class="text-center"><a href="#">Download Video</a></td>
                        <td class="text-center">
                            <a href="{{ route('admin.videos.show') }}">
                                <button class="btn btn-sm btn-primary"><i class="mdi mdi-eye"></i> View</button>
                            </a>
                            <a href="{{ route('admin.videos.edit') }}">
                                <button class="btn btn-sm btn-info"><i class="mdi mdi-pencil"></i> Edit</button>
                            </a>
                            <button class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i> Delete</button>
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
