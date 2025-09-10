@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Forms /</span>
                {{ isset($councillor) ? 'Edit Councillor' : 'Add New Councillor' }}
            </h4>

            <div class="card">
                <h5 class="card-header">{{ isset($councillor) ? 'Update Councillor Details' : 'Enter Councillor Details' }}
                </h5>

                <div class="card-body">
                    <form
                        action="{{ isset($councillor) ? route('councillors.update', $councillor->id) : route('councillors.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($councillor))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="municipality_name" class="form-label">Municipality Name<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="municipality_name" name="municipality_name"
                                value="{{ old('municipality_name', $councillor->municipality_name ?? '') }}">
                            <span class="text-danger">
                                @error('municipality_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="ward_number" class="form-label">Ward Number<span style="color:red;">*</span></label>
                            <input type="number" class="form-control" id="ward_number" name="ward_number"
                                value="{{ old('ward_number', $councillor->ward_number ?? '') }}">
                            <span class="text-danger">
                                @error('ward_number')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="member_name" class="form-label">Member Name<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="member_name" name="member_name"
                                value="{{ old('member_name', $councillor->member_name ?? '') }}">
                            <span class="text-danger">
                                @error('member_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="father_husband_name" class="form-label">Father/Husband Name<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="father_husband_name" name="father_husband_name"
                                value="{{ old('father_husband_name', $councillor->father_husband_name ?? '') }}">
                            <span class="text-danger">
                                @error('father_husband_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address<span style="color:red;">*</span></label>
                            <textarea class="form-control" id="address" name="address">{{ old('address', $councillor->address ?? '') }}</textarea>
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="designation" class="form-label">Designation<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="designation" name="designation"
                                value="{{ old('designation', $councillor->designation ?? '') }}">
                            <span class="text-danger">
                                @error('designation')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="mobile_number" class="form-label">Mobile Number<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="mobile_number" name="mobile_number"
                                value="{{ old('mobile_number', $councillor->mobile_number ?? '') }}">
                            <span class="text-danger">
                                @error('mobile_number')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ isset($councillor) ? 'Update Councillor' : 'Create Councillor' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
