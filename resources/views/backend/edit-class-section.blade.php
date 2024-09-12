@extends('backend.layout.master')

@push('css')
    <style>
        .form-footer.text-center {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('title', 'Class Section')

@section('content')

    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong>Class Section - Edit Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('admin.class-section.update', $data->id) }}" method="post" enctype="multipart/form-data"
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
                                <option value="" disabled>Select the class level</option>
                                @foreach ($classnumber as $num)
                                    <option value="{{ $num->id }}" {{ $num->id == $data->class_number_id ? 'selected' : '' }}>
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

                    <div class="form-group row">
                        <label for="classsection" class="col-md-3 col-form-label">Class Section</label>
                        <div class="col-md-9">
                            <input type="text" id="classsection" name="classSection"
                                placeholder="Enter the class section" class="form-control" value="{{ old('classSection', $data->class_section) }}">
                            <small class="form-text text-muted">Please enter the class section.</small>
                            @error('classSection')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-footer text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection

@push('js')
@endpush
