@extends('layouts.main')
@section('title', 'Videos')
@section('header', 'Show')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container-fluid fluid">
        <div class="row">
            <div class="col-xl-12">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 d-flex flex-column">
                                <label for="" class="form-label required">Name <span class="text-danger">*</span></label>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" class="form-control" name="name" placeholder="name here..." value="{{ $user->name }}">
                            </div>

                            <div class="col-xl-6 d-flex flex-column">
                                <label for="" class="form-label required">Email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $user->email }}" readonly style="background-color: #f0f0f0">
                            </div>

                            <div class="col-xl-6 mt-1 d-flex flex-column">
                                <label for="" class="form-label required">Password</label>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="password" class="form-control" name="new_password" placeholder="password here..." autocomplete="new-password">
                            </div>

                            <div class="col-xl-6 mt-1 d-flex flex-column">
                                <label for="" class="form-label required">Confirm Password</label>
                                @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="password" class="form-control" name="password_confirmation" placeholder="confirm password here...">
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
                    'ImageToolbar', 'ImageUpload', 'MediaEmbed',,'Table','TableToolbar'
                ],
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
