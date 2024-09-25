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
                <strong>Online Class Link - Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('admin.online-class-link.create') }}" method="post" enctype="multipart/form-data"
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
                        <label for="classsubject" class="col-md-3 col-form-label">Subject</label>
                        <div class="col-md-9">
                            <input type="text" id="classsubject" name="classSubject" placeholder="Enter the class subject"
                                class="form-control">
                            <small class="form-text text-muted">Please enter the class subject.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="onlineClassLink" class="col-md-3 col-form-label">Online Class Link</label>
                        <div class="col-md-9">
                            <input type="text" id="onlineClassLink" name="onlineClassLink"
                                placeholder="Enter the online class link" class="form-control">
                            <small class="form-text text-muted">Please enter the online class link.</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="onlineclassdate" class="col-md-3 col-form-label">Online Class Date</label>
                        <div class="col-md-9">
                            <input type="date" id="onlineclassdate" name="onlineClassDate"
                                placeholder="Enter the online class date" class="form-control">
                            <small class="form-text text-muted">Please enter the the online class date.</small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="onlineclasstime" class="col-md-3 col-form-label">Online Class Time</label>
                        <div class="col-md-9">
                            <input type="time" id="onlineclasstime" name="onlineClassTime"
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
            $('#classnumber').change(function() { // Use correct ID for classNumber select
                var class_number_id = $(this).val(); // Corrected ID reference
                if (class_number_id) { // Check if value is not null
                    $.ajax({
                        url: '/ourschool-admin/online-class-link/select-data/' + class_number_id,
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
