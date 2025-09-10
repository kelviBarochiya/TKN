@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
                <a href="{{ route('contact-us.create') }}" class="btn btn-primary" style="display:block; float:right;">Add New
                    Contact</a>
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Contact List</h4>

            <div class="card">
                <h5 class="card-header">Contact Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="myTable">
                        <thead>
                            <tr>
                                <th>SR.NO</th>
                                <th>Addresses</th>
                                <th>Mobile Numbers</th>
                                <th>Emails</th>

                                    <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <ul>
                                            @if ($contact->address1)
                                                <li>{{ $contact->address1 }}</li>
                                            @endif
                                            @if ($contact->address2)
                                                <li>{{ $contact->address2 }}</li>
                                            @endif
                                            @if ($contact->address3)
                                                <li>{{ $contact->address3 }}</li>
                                            @endif
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @if ($contact->mobile_number1)
                                                <li>{{ $contact->mobile_number1 }}</li>
                                            @endif
                                            @if ($contact->mobile_number2)
                                                <li>{{ $contact->mobile_number2 }}</li>
                                            @endif
                                            @if ($contact->mobile_number3)
                                                <li>{{ $contact->mobile_number3 }}</li>
                                            @endif
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @if ($contact->email1)
                                                <li>{{ $contact->email1 }}</li>
                                            @endif
                                            @if ($contact->email2)
                                                <li>{{ $contact->email2 }}</li>
                                            @endif
                                            @if ($contact->email3)
                                                <li>{{ $contact->email3 }}</li>
                                            @endif
                                        </ul>
                                    </td>
                                   
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('contact-us.edit', $contact->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                        <form action="{{ route('contact-us.destroy', $contact->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="bx bx-trash me-1"></i> Delete
                                                            </button>
                                                        </form>
                                                </div>
                                            </div>
                                        </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
