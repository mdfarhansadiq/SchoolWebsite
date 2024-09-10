@extends('backend.layout.master')

@push('css')
    <style>
        .form-footer.text-center {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('title', 'Class video')

@section('content')

    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong>Class Video - Edit Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('admin.class-record.update', $data->id) }}" method="post" enctype="multipart/form-data"
                    class="form-horizontal">
                    @csrf

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="form-group row">
                        <label for="classtitle" class="col-md-3 col-form-label">Class Title</label>
                        <div class="col-md-9">
                            <input type="text" id="classtitle" value="{{ $data->title }}" name="classTitle"
                                placeholder="Enter the class title" class="form-control">
                            <small class="form-text text-muted">Please enter the class title.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="classvideolink" class="col-md-3 col-form-label">Class Video Link</label>
                        <div class="col-md-9">
                            <input type="text" id="classvideolink" value="{{ $data->video_link }}" name="classVideoLink"
                                placeholder="Enter the class video link" class="form-control">
                            <small class="form-text text-muted">Please enter the class link.</small>
                        </div>
                    </div>

                    <div class="form-footer text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Submit
                        </button>
                    </div>
                </form>

            </div>
            <div class="card-body card-block">
                <div class="form-group row">
                    <label for="classvideo" class="col-md-3 col-form-label">Class Video</label>
                    <div class="col-md-9">
                        <iframe width="460" height="315" src="https://www.youtube.com/embed/{{ $data->video_link }}"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
@endpush
