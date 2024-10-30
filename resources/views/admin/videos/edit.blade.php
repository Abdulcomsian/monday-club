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
                        <form action="{{ route('admin.videos.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4 d-flex flex-column">
                                        <label for="" class="form-label required">Title</label>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input type="text" class="form-control" name="title"
                                        value="{{ $data->title }}"
                                            placeholder="title here...">
                                    </div>

                                    <div class="col-xl-4 d-flex flex-column">
                                        <label for="" class="form-label">Upload Video</label>
                                        @error('video_file')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input class="form-control" type="file" name="video_file" value="{{ $data->file }}">
                                        <small class="text-danger">Note: Only mp4, avi, mov, and mkv formats are
                                            allowed.</small>
                                    </div>

                                    <div class="col-xl-4 d-flex flex-column">
                                        <label for="" class="form-label">Upload Video</label>
                                        <video width="50%" controls>
                                            <source src="{{ asset($data->file) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
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
                removePlugins: [ 'BlockQuote', 'Table', 'MediaEmbed', 'Indent', 'Heading', 'ImageUpload'],
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
