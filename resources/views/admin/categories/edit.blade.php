@extends('layouts.main')
@section('title', 'Videos')
@section('header', 'Show')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-fluid fluid">
            <div>
                <div class="d-flex mb-3">
                    <button type="button" class="btn btn-sm btn-primary me-3" onClick="history.back()">
                        <i class="fas fa-arrow-left icon"></i> Back
                    </button>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <form action="{{ route('admin.categories.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4 d-flex flex-column">
                                        <label for="" class="form-label required">Title <span class="text-danger">*</span></label>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input type="text" class="form-control" name="title"
                                        value="{{ $data->title }}"
                                            placeholder="title here...">
                                    </div>

                                    <div class="col-xl-12">
                                        <label for="" class="form-label">Description</label>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <textarea name="description" class="form-control" id="editor">{!! $data->description !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-4 text-right">
                                    <div class="col-xl-12">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fas fa-save icon"></i> Save
                                        </button>
                                        <button type="reset" class="btn btn-sm btn-light">
                                            <i class="fas fa-ban icon"></i> Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
                "info": true
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
