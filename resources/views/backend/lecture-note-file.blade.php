@extends('backend.layout.master')

@push('css')
    <style>
        .form-footer.text-center {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('title', 'Lecture Note File')

@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Class Lecture/Note - Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('admin.lecture-note-file.create') }}" method="post" enctype="multipart/form-data"
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
                        <label for="classnumber" class="col-md-3 col-form-label">Class Level</label>
                        <div class="col-md-9">
                            <select id="classnumber" name="classNumber" class="form-control">
                                <option value="" disabled selected>Select the class level</option>
                                @foreach ($classnumber as $num)
                                    <option value="{{ $num->id }}">{{ $num->class_number }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Please select the class level.</small>
                            @error('classNumber')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="classsection" class="col-md-3 col-form-label">Class Section</label>
                        <div class="col-sm-9">
                            <select class="form-control" aria-label="Default select example" style="color: black"
                                name="classSection" id="classsection">
                                <option value="" disabled selected>Select a class section</option>
                                <!-- Options will be dynamically populated by JavaScript -->
                            </select>
                            <small class="form-text text-muted">Please select the class section.</small>
                            @error('classSection')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="classlecturenotetitle" class="col-md-3 col-form-label">Lecture/Note Title</label>
                        <div class="col-md-9">
                            <input type="text" id="classlecturenotetitle" name="classLectureNoteTitle"
                                placeholder="Enter the class lecture/note title" class="form-control">
                            <small class="form-text text-muted">Please enter the class lecture/note title.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="classlecturenotelink" class="col-md-3 col-form-label">Google Drive File Link</label>
                        <div class="col-md-9">
                            <textarea name="classLectureNotelink" id="classlecturenotelink" rows="20"
                                placeholder="Please use ',' comma after every class lecture/note link if there are multiple links."
                                class="form-control"></textarea>
                            <small class="form-text text-muted">Please use ',' comma after every class lecture/note link if
                                there are multiple links.</small>
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
                <strong>Lecture/Note File - Data Table</strong>
            </div>

            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Class Level</th>
                            <th scope="col">Class Section</th>
                            <th scope="col">Title</th>
                            <th scope="col">File</th>

                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $key => $file)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>Class - {{ $file->classNumber->class_number }}</td>
                                <td>Section - {{ $file->classSection->class_section }}</td>
                                <td>{{ $file->title }}</td>
                                <td>@php
                                    $file_links = explode(',', $file->file_link);
                                @endphp
                                    @foreach ($file_links as $link_Id)
                                        @php
                                            $link_Id = trim($link_Id);
                                        @endphp
                                        <a href="https://drive.google.com/uc?export=download&id={{ $link_Id }}"
                                            download>
                                            <i class="fa fa-file-text" style="font-size:25px;color:#000000"></i>
                                        </a>
                                        <br>
                                        <br>
                                    @endforeach
                                </td>
                                <td><a href="{{ url('/ourschool-admin/lecture-note-file/edit', $file['id']) }}"
                                        class="edit btn btn-primary" type="button" data-id="{{ $file->id }}">Edit</a>
                                    <a href="{{ url('/ourschool-admin/lecture-note-file/delete', $file['id']) }}"
                                        class="delete btn btn-danger" type="button" data-id="{{ $file->id }}"
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
    <script>
        $(document).ready(function() {
            $('#classnumber').change(function() { // Use correct ID for classNumber select
                var class_number_id = $(this).val(); // Corrected ID reference
                if (class_number_id) { // Check if value is not null
                    $.ajax({
                        url: '/ourschool-admin/lecture-note-file/select-data/' + class_number_id,
                        type: 'GET',
                        success: function(data) {
                            $('#classsection').empty().append(
                                '<option value="" disabled selected>Select a class section</option>'
                            ); // Reset and add default option
                            $.each(data, function(id, class_section) {
                                $('#classsection').append('<option value="' + id +
                                    '">' + class_section + '</option>');
                            });
                        },
                        error: function() {
                            alert('Error loading class sections. Please try again.');
                        }
                    });
                } else {
                    $('#classsection').empty().append(
                        '<option value="" disabled selected>Select a class section</option>'
                    ); // Reset if no class number selected
                }
            });
        });
    </script>
@endpush
