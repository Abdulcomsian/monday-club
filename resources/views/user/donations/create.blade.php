@extends('layouts.main')
@section('title', 'Videos')
@section('header', 'Show')
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
                    <form action="{{ route('user.donations.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 d-flex flex-column">
                                    <label for="contactSelect" class="form-label required">Contact <span class="text-danger">*</span></label>
                                    @error('contact_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <select name="contact_id" id="contactSelect" class="form-select" required>
                                        <option value="">Select Contact</option>
                                        @foreach ($data as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-6 d-flex flex-column">
                                    <label for="amount" class="form-label required">Amount <span class="text-danger">*</span></label>
                                    @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="number" class="form-control" name="amount" placeholder="amount here...">
                                </div>

                                <div class="col-xl-12">
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
                removePlugins: ['BlockQuote', 'Table', 'MediaEmbed', 'Indent', 'Heading', 'ImageUpload'],
            })
            .catch(error => {
                console.error(error);
            });

        $(document).ready(function() {
            $("#contactSelect").select2({
                width: '100%',
                height: '100%',
            });
        });
    </script>
@endsection
