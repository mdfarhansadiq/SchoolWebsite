@extends('backend.layout.master')

@push('css')
    <style>
        .form-footer.text-center {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('title', 'Online Class Link')

@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Online Class Link - Edit Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('admin.online-class-link.update', $data->id) }}" method="post" enctype="multipart/form-data"
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
                    <!-- Class Level Selection -->
                    <div class="form-group row">
                        <label for="classnumber" class="col-md-3 col-form-label">Class Level</label>
                        <div class="col-md-9">
                            <select id="classnumber" name="classNumber" class="form-control">
                                <option value="" disabled>Select the class level</option>
                                @foreach ($classnumber as $num)
                                    <option value="{{ $num->id }}" @if ($data->class_number_id == $num->id) selected @endif>
                                        {{ $num->class_number }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Please select the class level.</small>
                            @error('classNumber')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Class Section Selection -->
                    <div class="form-group row">
                        <label for="classsection" class="col-md-3 col-form-label">Class Section</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="classSection" id="classsection"
                                aria-label="Default select example" style="color: black">
                                <option value="" disabled>Select a class section</option>
                                <!-- Options will be dynamically populated by JavaScript -->
                            </select>
                            <small class="form-text text-muted">Please select the class section.</small>
                            @error('classSection')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="classsubject" class="col-md-3 col-form-label">Subject</label>
                        <div class="col-md-9">
                            <input type="text" id="classsubject" name="classSubject" value="{{$data->subject}}" placeholder="Enter the class subject"
                                class="form-control">
                            <small class="form-text text-muted">Please enter the class subject.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="onlineClassLink" class="col-md-3 col-form-label">Online Class Link</label>
                        <div class="col-md-9">
                            <input type="text" id="onlineClassLink" name="onlineClassLink" value="{{$data->link}}"
                                placeholder="Enter the online class link" class="form-control">
                            <small class="form-text text-muted">Please enter the online class link.</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="onlineClassLinkCode" class="col-md-3 col-form-label">Online Class Link Code</label>
                        <div class="col-md-9">
                            <input type="text" id="onlineClassLinkCode" value="{{ old('onlineClassLinkCode', $data->link_code) }}" name="onlineClassLinkCode"
                                placeholder="Enter the online class link code" class="form-control">
                            <small class="form-text text-muted">Please enter the online class link code.</small>
                            @error('onlineClassLinkCode')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="onlineclassdate" class="col-md-3 col-form-label">Online Class Date</label>
                        <div class="col-md-9">
                            <input type="date" id="onlineclassdate" name="onlineClassDate" value="{{$data->class_date}}"
                                placeholder="Enter the online class date" class="form-control">
                            <small class="form-text text-muted">Please enter the the online class date.</small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="onlineclasstime" class="col-md-3 col-form-label">Online Class Time</label>
                        <div class="col-md-9">
                            <input type="time" id="onlineclasstime" name="onlineClassTime" value="{{$data->class_time}}"
                                placeholder="Enter the online class time" class="form-control">
                            <small class="form-text text-muted">Please enter the the online class time.</small>
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



    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Store the current section ID to set as selected
            var currentSectionId = "{{ old('classSection', $data->class_section_id) }}";

            // Fetch Class Sections on Class Level Change
            $('#classnumber').change(function() {
                var class_number_id = $(this).val();
                if (class_number_id) {
                    $.ajax({
                        url: '/ourschool-admin/online-class-link/select-data/' + class_number_id,
                        type: 'GET',
                        success: function(data) {
                            $('#classsection').empty().append(
                                '<option value="" disabled>Select a class section</option>');

                            // Populate the sections and set the selected option
                            $.each(data, function(id, class_section) {
                                if (id == currentSectionId) {
                                    $('#classsection').append('<option value="' + id +
                                        '" selected>' + class_section + '</option>');
                                } else {
                                    $('#classsection').append('<option value="' + id +
                                        '">' + class_section + '</option>');
                                }
                            });
                        },
                        error: function() {
                            alert('Error fetching class sections. Please try again.');
                        }
                    });
                }
            });

            // Trigger the change event to populate the sections if a class is selected (for edit form)
            if ($('#classnumber').val()) {
                $('#classnumber').trigger('change');
            }
        });
    </script>
@endpush
