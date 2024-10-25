@extends('layouts.main')
@section('title', 'Documents')
@section('header', 'Create')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-fluid fluid">
            <div class="d-flex mb-3">
                <button type="button" class="btn btn-sm btn-primary me-3" onClick="history.back()">
                    <i class="fas fa-arrow-left icon"></i> Back
                </button>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 d-flex flex-column">
                                    <label for="" class="form-label required">Title</label>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control" name="title"
                                        placeholder="title here...">
                                </div>

                                <div class="col-xl-6 d-flex flex-column">
                                    <label for="" class="form-label">Upload Document</label>
                                    @error('document')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control" type="file" name="document" accept=".pdf" value="">
                                    <small class="text-danger">Note: Only PDF files are allowed.</small>
                                </div>

                                <div class="col-xl-12">
                                    <label for="" class="form-label">Description</label>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <textarea name="description" class="form-control" id="editor"></textarea>
                                </div>
                            </div>
                            <div class="row mt-4 text-right">
                                <div class="col-xl-12">
                                    <button type="button" class="btn btn-sm btn-primary">
                                        <i class="far fa-save icon"></i> Save
                                    </button>
                                    <button type="button" class="btn btn-sm btn-light">
                                        <i class="fa fa-ban icon"></i> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle',
                    'ImageToolbar', 'ImageUpload', 'MediaEmbed'
                ],
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
