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
                    <form action="{{ route('user.documents.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 d-flex flex-column">
                                    <label for="" class="form-label required">Title</label>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control" name="title" value="{{ $data->title }}"
                                        placeholder="title here...">
                                </div>

                                <div class="col-xl-4 d-flex flex-column">
                                    <label for="" class="form-label">Upload Document</label>
                                    @error('document')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control" type="file" name="document" accept=".pdf"
                                        value="{{ $data->file }}">
                                    <small class="text-danger">Note: Only PDF files are allowed.</small>
                                    @if (isset($data->file) && !old('document'))
                                        <small class="text-muted">If you don't want to update the document, leave this
                                            blank.</small>
                                    @endif
                                </div>

                                <div class="col-xl-4 d-flex flex-column">
                                    @if ($data->file)
                                        <a href="{{ asset($data->file) }}" target="_blank" rel="noopener noreferrer"
                                            class="btn btn-sm btn-info">
                                            Click to View Document
                                        </a>
                                        <iframe src="{{ asset($data->file) }}" width="100%" height="100px"
                                            frameborder="0">
                                            Your browser does not support iframes.
                                        </iframe>
                                    @else
                                        <p>No document available.</p>
                                    @endif
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
