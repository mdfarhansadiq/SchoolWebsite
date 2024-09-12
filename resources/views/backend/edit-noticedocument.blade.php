@extends('backend.layout.master')


@push('css')
    <style>
        .form-footer.text-center {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('title', 'Notice Board')

@section('content')

    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong>Notice Document - Edit Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('admin.noticedocument.update', $data->id) }}" method="post" enctype="multipart/form-data"
                    class="form-horizontal">
                    @csrf

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div class="form-group row">
                        <label for="notice-input" class="col-md-3 col-form-label">Notice Title</label>
                        <div class="col-md-9">
                            <input type="text" id="notice-input" value="{{$data->title}}" name="noticeTitle" placeholder="Enter the notice title"
                                class="form-control">
                            <small class="form-text text-muted">Please enter the title of the notice.</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="url-input" class="col-md-3 col-form-label">Any Website or Document URL</label>
                        <div class="col-md-9">
                            <input type="url" id="url-input" value="{{$data->document_url}}" name="noticeUrl"
                                placeholder="Enter Any Website or Document URL (Google Drive Link)" class="form-control">
                            <small class="form-text text-muted">Please enter the website URL or document URL.</small>
                        </div>
                    </div>

                    <!-- Uncomment this section if you plan to use it -->
                    <!--
                            <div class="form-group row">
                                <label for="textarea-input" class="col-md-3 col-form-label">Notice Content</label>
                                <div class="col-md-9">
                                    <textarea name="textarea-input" id="textarea-input" rows="5" placeholder="Enter content..." class="form-control"></textarea>
                                    <small class="form-text text-muted">Provide additional details or content here.</small>
                                </div>
                            </div>
                            -->

                    <div class="form-footer text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Submit
                        </button>
                    </div>
                </form>
            </div>


        </div>

    </div>

@endsection
@push('js')
    <script>
        ClassicEditor
            .create(document.querySelector('#textarea-input'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endpush
