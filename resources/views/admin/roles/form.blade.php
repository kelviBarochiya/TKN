@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span>
                {{ isset($role) ? 'Edit Role' : 'Add Role' }}</h4>

            <div class="card">
                <h5 class="card-header">{{ isset($role) ? 'Edit Role' : 'Add Role' }}</h5>
                <div class="card-body">
                    <form action="{{ isset($role) ? route('roles.update', $role->id) : route('roles.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($role))
                            @method('PUT')
                        @endif

                        <!-- Role Name Input -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Role Name <span style="color: red;">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ isset($role) ? $role->name : old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Permissions Table -->
                        <label class="form-label">Edit Permissions<span style="color: red;">*</span></label>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Modules</th>
                                        <th>List</th>
                                        <th>Create</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($modules as $module)
                                        <tr>
                                            <td>{{ $module->name }}</td>
                                            <td class="text-center">
                                                <input type="checkbox" name="modules[{{ $module->id }}][list]"
                                                    {{ old('modules.' . $module->id . '.list') || (isset($permissions[$module->id]) && $permissions[$module->id]->list_permission) ? 'checked' : '' }}>
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox" name="modules[{{ $module->id }}][create]"
                                                    {{ old('modules.' . $module->id . '.create') || (isset($permissions[$module->id]) && $permissions[$module->id]->create_permission) ? 'checked' : '' }}>
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox" name="modules[{{ $module->id }}][edit]"
                                                    {{ old('modules.' . $module->id . '.edit') || (isset($permissions[$module->id]) && $permissions[$module->id]->edit_permission) ? 'checked' : '' }}>
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox" name="modules[{{ $module->id }}][delete]"
                                                    {{ old('modules.' . $module->id . '.delete') || (isset($permissions[$module->id]) && $permissions[$module->id]->delete_permission) ? 'checked' : '' }}>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary mt-4">
                            {{ isset($role) ? 'Update Role' : 'Add Role' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
