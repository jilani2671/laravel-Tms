@extends('layouts.masterlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-6"></div>
    <div class="row d-flex justify-content-center">
        @if(Session::has('success'))
            <div class="col-md-12 mt-4">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif

        <div class="col-md-12">
            <div class="card border-0 shadow-lg my-3">
                <div class="card-header bg-dark text-center">
                    <h3 class="text-white">Confirmed Registrations</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Course</th>
                                    <th>Installment 1</th>
                                    <th>Installment 2</th>
                                    <th>Total Fees</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>           
                            </thead>
                            <tbody>
                                @forelse ($confirmedAdmissions as $admission)
                                    <tr>
                                        <td>{{ $admission->id }}</td>
                                        <td>{{ $admission->full_name }}</td>
                                        <td>{{ $admission->email }}</td>
                                        <td>{{ $admission->phone_number }}</td>
                                        <td>{{ $admission->course }}</td>
                                        <td>{{ $admission->installment1 }}</td>
                                        <td>{{ $admission->installment2 }}</td>
                                        <td>{{ $admission->total_fees }}</td>
                                        <td>{{ \Carbon\Carbon::parse($admission->created_at)->format('d M, Y') }}</td>
                                        <td>
                                            <div class="d-flex flex-wrap">
                                                <a href="{{ route('registrations.edit_confirm', $admission->id) }}" class="btn btn-dark me-2 flex-grow-1">Edit</a>

                                                <form id="delete-admission-form-{{ $admission->id }}" action="{{ route('registrations.destroy1', $admission->id) }}" method="POST" class="mb-2 mb-md-0">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this registration?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="14" class="text-center">No confirmed registrations found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table {
        min-width: 1400px; /* Adjust as needed */
    }
    .table td, .table th {
        white-space: nowrap; /* Prevent text wrapping in cells */
    }
</style>
@endpush
