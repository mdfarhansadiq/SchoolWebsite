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
                <strong>Class Video - Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('admin.class-record.create') }}" method="post" enctype="multipart/form-data"
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
                            <input type="text" id="classtitle" name="classTitle"
                                placeholder="Enter the class title" class="form-control">
                            <small class="form-text text-muted">Please enter the class title.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="classvideolink" class="col-md-3 col-form-label">Class Video Link</label>
                        <div class="col-md-9">
                            <input type="text" id="classvideolink" name="classVideoLink"
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
        </div>


        <div class="card">
            <div class="card-header">
                <strong>Online Class Video - Data Table</strong>
            </div>

            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Class Title</th>
                            <th scope="col">Class Video</th>

                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $classvid)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $classvid->title }}</td>
                                <td><iframe width="460" height="315" src="https://www.youtube.com/embed/{{$classvid->video_link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </td>
                                <td><a href="{{ url('/ourschool-admin/class-record/edit', $classvid['id']) }}"
                                        class="edit btn btn-primary" type="button"
                                        data-id="{{ $classvid->id }}">Edit</a>
                                    <a href="{{ url('/ourschool-admin/class-record/delete', $classvid['id']) }}"
                                        class="delete btn btn-danger" type="button" data-id="{{ $classvid->id }}"
                                        onclick="return confirm('Are you sure to delete this class video?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('js')
@endpush
