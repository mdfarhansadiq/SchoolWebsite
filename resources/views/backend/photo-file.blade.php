@extends('backend.layout.master')

@push('css')
    <style>
        .form-footer.text-center {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('title', 'Photo File')

@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Photo File - Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('admin.photo-file.create') }}" method="post" enctype="multipart/form-data"
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
                        <label for="phototitle" class="col-md-3 col-form-label">Photo Title</label>
                        <div class="col-md-9">
                            <input type="text" id="phototitle" name="photoTitle" placeholder="Enter the photo title"
                                class="form-control">
                            <small class="form-text text-muted">Please enter the photo title.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photofilelink" class="col-md-3 col-form-label">Google Drive File Link</label>
                        <div class="col-md-9">
                            <textarea name="photofilelink" id="photofilelink" rows="20"
                                placeholder="Please use ',' comma after every photo file link if there are multiple links." class="form-control"></textarea>
                            <small class="form-text text-muted">Please use ',' comma after every photo file link if
                                there are multiple links.</small>
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label for="bannerimage" class="col-md-3 col-form-label">Make the banner image</label>
                        <div class="col-md-9">
                            <input type="checkbox" id="bannerimage" name="bannerimage" value="1" class="form-check-input">
                            <label class="form-check-label" for="status">Banner Image</label>
                        </div>
                    </div> --}}

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
                <strong>Lecture/Note File - Data Table</strong>
            </div>

            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Title</th>
                            <th scope="col">File</th>

                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $file)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>

                                <td>{{ $file->title }}</td>
                                <td>@php
                                    $file_links = explode(',', $file->file_link);
                                @endphp
                                    @foreach ($file_links as $link_Id)
                                        @php
                                            $link_Id = trim($link_Id);
                                        @endphp
                                        <img src="https://drive.google.com/thumbnail?id={{ $link_Id }}"
                                            alt="{{ $file->title }}">
                                        <br>
                                        <br>
                                    @endforeach
                                </td>
                                <td><a href="{{ url('/ourschool-admin/photo-file/edit', $file['id']) }}"
                                        class="edit btn btn-primary" type="button" data-id="{{ $file->id }}">Edit or
                                        Add New Photo</a>
                                    <a href="{{ url('/ourschool-admin/photo-file/delete', $file['id']) }}"
                                        class="delete btn btn-danger" type="button" data-id="{{ $file->id }}"
                                        onclick="return confirm('Are you sure to delete this Album?')">Delete the
                                        Album</a>
                                    <a href="{{ url('/ourschool-admin/photo-file-specific/delete/view', $file['id']) }}"
                                        class="delete btn btn-info" type="button" data-id="{{ $file->id }}"
                                       >Delete the
                                        Specific Photo</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
