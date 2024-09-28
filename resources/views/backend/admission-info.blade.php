@extends('backend.layout.master')

@push('css')
    <style>
        .form-footer.text-center {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('title', 'Admission Info Form')

@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Admission Info - Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('admin.admission-info.create') }}" method="post" enctype="multipart/form-data"
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
                        <label for="admissionStartDate" class="col-md-3 col-form-label">Admission Start Date</label>
                        <div class="col-md-9">
                            <input type="date" id="admissionStartDate" name="admissionStartDate"
                                placeholder="Enter the admission start date" class="form-control">
                            <small class="form-text text-muted">Please enter the the admission start date.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="admissionEndDate" class="col-md-3 col-form-label">Admission End Date</label>
                        <div class="col-md-9">
                            <input type="date" id="admissionEndDate" name="admissionEndDate"
                                placeholder="Enter the admission end date" class="form-control">
                            <small class="form-text text-muted">Please enter the the admission end date.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="admissionInfoLink" class="col-md-3 col-form-label">Google Drive File Link</label>
                        <div class="col-md-9">
                            <textarea name="admissionInfoLink" id="admissionInfoLink" rows="10"
                                placeholder="Please use ',' comma after every admission info file link if there are multiple links."
                                class="form-control"></textarea>
                            <small class="form-text text-muted">Please use ',' comma after every admission info file link if
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
                <strong>Admission Info - Data Table</strong>
            </div>

            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Class Level</th>
                            <th scope="col">Admission Start Date</th>
                            <th scope="col">Admission End Date</th>
                            <th scope="col">File</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            date_default_timezone_set('Asia/Dhaka');
                            $current_date = date('Y-m-d');
                        @endphp
                        @foreach ($data as $key => $file)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>Class - {{ $file->classNumber->class_number }}</td>
                                <td>{{ $file->admission_start_date }}</td>
                                <td>{{ $file->admission_end_date }}</td>
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
                                <td><a href="{{ url('/ourschool-admin/admission-info/edit', $file['id']) }}"
                                        class="edit btn btn-primary" type="button" data-id="{{ $file->id }}">Edit</a>
                                    <a href="{{ url('/ourschool-admin/admission-info/delete', $file['id']) }}"
                                        class="delete btn btn-danger" type="button" data-id="{{ $file->id }}"
                                        onclick="return confirm('Are you sure to delete this admission-info?')">Delete</a>
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
    {{-- <script>
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
    </script> --}}
@endpush
