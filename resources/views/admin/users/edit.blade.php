@extends('layouts.app')

@section('content')

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $user->name }}" placeholder="Name" required>
    <input type="email" name="email" value="{{ $user->email }}" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password">

    <select name="role_id">
        @foreach ($roles as $role)
            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                {{ $role->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Update User</button>
</form>

@endsection