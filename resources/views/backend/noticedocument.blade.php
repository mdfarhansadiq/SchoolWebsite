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
                <strong>Notice Document - Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('admin.noticedocument.create') }}" method="post" enctype="multipart/form-data"
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
                            <input type="text" id="notice-input" name="noticeTitle" placeholder="Enter the notice title"
                                class="form-control">
                            <small class="form-text text-muted">Please enter the title of the notice.</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="url-input" class="col-md-3 col-form-label">Any Website or Document URL</label>
                        <div class="col-md-9">
                            <input type="url" id="url-input" name="noticeUrl"
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
        <div class="card">
            <div class="card-header">
                <strong>Notice Document - Data Table</strong>
            </div>

            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $notice)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $notice->title }}</td>
                                <td><a href="{{ url('/ourschool-admin/noticedocument/edit', $notice['id']) }}"
                                        class="edit btn btn-primary" type="button" data-id="{{ $notice->id }}">Edit</a>
                                    <a href="{{ url('/ourschool-admin/noticedocument/delete', $notice['id']) }}"
                                        class="delete btn btn-danger" type="button" data-id="{{ $notice->id }}"
                                        onclick="return confirm('Are you sure to delete this?')">Delete</a>
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
    <script>
        ClassicEditor
            .create(document.querySelector('#textarea-input'))
            .catch(error => {
                console.error(error);
            });
    </script>



    {{-- <script>
        <button class="btn_light" onclick="downloadDocument()">Download company
            profile</button>
    </script> --}}

    {{-- function downloadDocument() {
        window.location.href = 'https://drive.google.com/uc?export=download&id=1R0jpaqXo0zMOaRXYmgN1nzzvUHNeXGTe';
    } --}}
@endpush
