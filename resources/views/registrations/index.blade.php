@extends('layouts.masterlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 shadow-lg my-3">
                <div class="card-header bg-dark text-center">
                    <h3 class="text-white">Enquiries Report</h3>
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
                                    <th>Date of Birth</th>
                                    <th>Course</th>
                                    <th>Enquiries</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($registrations->isNotEmpty())
                                    @foreach ($registrations as $registration)
                                        <tr>
                                            <td>{{ $registration->id }}</td>
                                            <td>{{ $registration->full_name }}</td>
                                            <td>{{ $registration->email }}</td>
                                            <td>{{ $registration->phone_number }}</td>
                                            <td>{{ \Carbon\Carbon::parse($registration->date_of_birth)->format('d M, Y') }}</td>
                                            <td>{{ $registration->course }}</td>
                                            <td>{{ $registration->enquiries }}</td>
                                            <td>{{ \Carbon\Carbon::parse($registration->created_at)->format('d M, Y') }}</td>
                                            <td>
                                                <a href="{{ url('/registrations/' . $registration->id . '/edit') }}" class="btn btn-dark ">Confirm</a>

                                                <form id="delete-registration-form-{{ $registration->id }}" action="{{ route('registrations.destroy', $registration->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this registration?')">Delete</button>
                                                </form>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="text-center">No registrations found</td>
                                    </tr>
                                @endif
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
    .table-responsive {
        overflow-x: auto;
    }
</style>
@endpush

@push('scripts')
<script>
    function deleteRegistration(id) {
        if (confirm("Are You Sure You Want To Delete This Registration?")) {
            document.getElementById("delete-registration-form-" + id).submit();
        }
    }
</script>
@endpush
