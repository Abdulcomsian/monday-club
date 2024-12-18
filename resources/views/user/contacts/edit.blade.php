@extends('layouts.main')
@section('title', 'Contacts')
@section('header', 'Update')
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
                    <form action="{{ route('user.contacts.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 d-flex flex-column">
                                    <label for="name" class="form-label required">Name <span class="text-danger">*</span></label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control" name="name" value="{{ $data->name }}" placeholder="name here...">
                                </div>

                                <div class="col-xl-6 d-flex flex-column">
                                    <label for="email" class="form-label required">Email <span class="text-danger">*</span></label>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="email" class="form-control" name="email" value="{{ $data->email }}" placeholder="email here...">
                                </div>

                                <div class="col-xl-6 d-flex flex-column">
                                    <label for="contact" class="form-label required">Contact# <span class="text-danger">*</span></label>
                                    @error('contact')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="number" class="form-control" name="contact" value="{{ $data->contact_no }}" placeholder="contact here...">
                                </div>
                                <div class="col-xl-6 d-flex flex-column">
                                    <label for="status" class="form-label required">Status</label>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <select name="status" id="statusSelect" class="form-select" required>
                                        <option value="">Select Status</option>
                                        @foreach (['contacted', 'not_contacted', 'positive_reply', 'negative_reply', 'donated'] as $status)
                                            <option value="{{ $status }}" {{ $data->status === $status ? 'selected' : '' }}>{{ ucfirst(str_replace('_', ' ', $status)) }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-12">
                                    <label for="" class="form-label">Note</label>
                                    @error('note')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <textarea name="note" class="form-control" id="editor">{!! $data->note !!}</textarea>
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
