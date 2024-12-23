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
                                <div class="col-xl-3 d-flex flex-column">
                                    <label for="" class="form-label required">Category <span class="text-danger">*</span></label>
                                    @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <select name="category_id" id="categorySelect" class="form-select" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $data->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->title ?? '' }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-3 d-flex flex-column">
                                    <label for="" class="form-label required">Title <span class="text-danger">*</span></label>
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $data->title }}"
                                        placeholder="title here...">
                                </div>

                                <div class="col-xl-3 d-flex flex-column">
                                    <label for="" class="form-label">Upload Video <span class="text-danger">*</span></label>
                                    @error('video_file')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control" type="file" name="video_file" value="{{ $data->file }}">
                                    <small class="text-danger">Note: Only mp4, avi, mov, and mkv formats are
                                        allowed.</small>
                                </div>

                                <div class="col-xl-3 d-flex flex-column">
                                    <label for="" class="form-label">Upload Video</label>
                                    @if ($data->file)
                                    @php
                                    $fileExtension = pathinfo($data->file, PATHINFO_EXTENSION);
                                    $fileUrl = asset($data->file);
                                    @endphp

                                    @if (in_array($fileExtension, ['mp4', 'mov']))
                                    <video width="50%" controls>
                                        <source src="{{ asset($data->file) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    @elseif (in_array($fileExtension, ['avi', 'mkv']))
                                    <div>
                                        <a href="{{ asset($data->file) }}">
                                            <button type="button" class="btn btn-secondary">
                                                <i class="fas fa-download"></i>
                                                Download Video</button>
                                        </a>

                                        <p class="text-danger" style="font-size: 0.85rem; margin-top: 5px;">
                                            This file type is not supported by most browsers for previewing. Please
                                            download it to view.
                                        </p>
                                    </div>
                                    @else
                                    <p>Unsupported document format.</p>
                                    @endif
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
                'ImageToolbar', 'ImageUpload', 'MediaEmbed', , 'Table', 'TableToolbar'
            ],
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection