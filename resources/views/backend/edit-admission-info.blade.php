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
                <strong>Admission Info - Edit Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{route('admin.admission-info.update', $data->id)}}" method="post" enctype="multipart/form-data"
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
                                    <option value="{{ $num->id }}" {{ $data->class_number_id == $num->id ? 'selected' : '' }}>{{ $num->class_number }}</option>
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
                            <input type="date" id="admissionStartDate" value="{{$data->admission_start_date}}" name="admissionStartDate"
                                placeholder="Enter the admission start date" class="form-control">
                            <small class="form-text text-muted">Please enter the the admission start date.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="admissionEndDate" class="col-md-3 col-form-label">Admission End Date</label>
                        <div class="col-md-9">
                            <input type="date" id="admissionEndDate" value="{{$data->admission_end_date}}" name="admissionEndDate"
                                placeholder="Enter the admission end date" class="form-control">
                            <small class="form-text text-muted">Please enter the the admission end date.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="admissionInfoLink" class="col-md-3 col-form-label">Google Drive File Link</label>
                        <div class="col-md-9">
                            <textarea name="admissionInfoLink" id="admissionInfoLink" rows="10"
                                placeholder="Please use ',' comma after every admission info file link if there are multiple links."
                                class="form-control">{{$data->file_link}}</textarea>
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
    </div>

@endsection

@push('js')
@endpush
