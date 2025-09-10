@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Forms /</span> {{ isset($contact) ? 'Edit Contact' : 'Create Contact' }}
        </h4>

        <div class="card">
            <h5 class="card-header">{{ isset($contact) ? 'Update Contact Details' : 'Enter Contact Details' }}</h5>

            <div class="card-body">
                <form action="{{ isset($contact) ? route('contact-us.update', $contact->id) : route('contact-us.store') }}" method="POST">
                    @csrf
                    @if(isset($contact))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label for="address1" class="form-label">Address 1</label>
                        <input type="text" class="form-control" id="address1" name="address1" value="{{ old('address1', $contact->address1 ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="address2" class="form-label">Address 2</label>
                        <input type="text" class="form-control" id="address2" name="address2" value="{{ old('address2', $contact->address2 ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="address3" class="form-label">Address 3</label>
                        <input type="text" class="form-control" id="address3" name="address3" value="{{ old('address3', $contact->address3 ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="mobile_number1" class="form-label">Mobile Number 1</label>
                        <input type="text" class="form-control" id="mobile_number1" name="mobile_number1" value="{{ old('mobile_number1', $contact->mobile_number1 ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="mobile_number2" class="form-label">Mobile Number 2</label>
                        <input type="text" class="form-control" id="mobile_number2" name="mobile_number2" value="{{ old('mobile_number2', $contact->mobile_number2 ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="mobile_number3" class="form-label">Mobile Number 3</label>
                        <input type="text" class="form-control" id="mobile_number3" name="mobile_number3" value="{{ old('mobile_number3', $contact->mobile_number3 ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="email1" class="form-label">Email 1</label>
                        <input type="email" class="form-control" id="email1" name="email1" value="{{ old('email1', $contact->email1 ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email2" class="form-label">Email 2</label>
                        <input type="email" class="form-control" id="email2" name="email2" value="{{ old('email2', $contact->email2 ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="email3" class="form-label">Email 3</label>
                        <input type="email" class="form-control" id="email3" name="email3" value="{{ old('email3', $contact->email3 ?? '') }}">
                    </div>

                    <button type="submit" class="btn btn-primary ">
                        {{ isset($contact) ? 'Update Contact' : 'Create Contact' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
