@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Helpline Number Form</h4>

            <div class="card">
                <h5 class="card-header">{{ isset($helplineNumber) ? 'Edit Helpline Number' : 'Create Helpline Number' }}</h5>
                <div class="card-body">
                    <form
                        action="{{ isset($helplineNumber) ? route('helpline-numbers.update', $helplineNumber->id) : route('helpline-numbers.store') }}"
                        method="POST">
                        @csrf
                        @isset($helplineNumber)
                            @method('PUT')
                        @endisset

                        <div class="mb-3">
                            <label for="name" class="form-label">Name<span style="color: red;">*</span></label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name', $helplineNumber->name ?? '') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="number" class="form-label">Number<span style="color: red;">*</span></label>
                            <input type="text" id="number" name="number" class="form-control"
                                value="{{ old('number', $helplineNumber->number ?? '') }}">
                            @error('number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                            <select class="form-control" id="status" name="status">
                                <option value="1"
                                    {{ old('status', $helplineNumber->status ?? '') == '1' ? 'selected' : '' }}>Active
                                </option>
                                <option value="0"
                                    {{ old('status', $helplineNumber->status ?? '') == '0' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit"
                            class="btn btn-primary">{{ isset($helplineNumber) ? 'Update Helpline Number' : 'Create Helpline Number' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
