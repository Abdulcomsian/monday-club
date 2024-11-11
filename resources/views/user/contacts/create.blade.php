@extends('layouts.main')
@section('title', 'Contacts')
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
                    <form action="{{ route('user.contacts.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 d-flex flex-column">
                                    <label for="name" class="form-label required">Name <span class="text-danger">*</span></label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control" name="name" placeholder="name here...">
                                </div>

                                <div class="col-xl-4 d-flex flex-column">
                                    <label for="email" class="form-label required">Email <span class="text-danger">*</span></label>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="email" class="form-control" name="email" placeholder="email here...">
                                </div>

                                <div class="col-xl-4 d-flex flex-column">
                                    <label for="contact" class="form-label required">Contact# <span class="text-danger">*</span></label>
                                    @error('contact')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control" name="contact" placeholder="contact here..."
                                           pattern="^\d{8,12}$" title="Contact number must be between 8 and 12 digits" required
                                           oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="12">
                                </div>

                                <div class="col-xl-12 mt-1">
                                    <label for="" class="form-label">Note</label>
                                    @error('note')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <textarea name="note" class="form-control" id="editor"></textarea>
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
                    'ImageToolbar', 'ImageUpload', 'MediaEmbed'
                ],
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
