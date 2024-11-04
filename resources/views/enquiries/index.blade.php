@extends('layouts.masterlayout')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        @if(Session::has('success'))
            <div class="col-md-12 mt-3">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif

        <div class="col-md-12">
            <div class="card border-0 shadow-lg my-3">
                <div class="card-header bg-dark text-center">
                    <h3 class="text-white mb-0">Enquiries</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mx-auto">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($enquiries as $enquiry)
                                    <tr>
                                        <td>{{ $enquiry->id }}</td>
                                        <td>{{ $enquiry->name }}</td>
                                        <td>{{ $enquiry->email }}</td>
                                        <td>{{ $enquiry->subject }}</td>
                                        <td>{{ $enquiry->message }}</td>
                                        <td>{{ \Carbon\Carbon::parse($enquiry->created_at)->format('d M, Y') }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <!-- Delete Form -->
                                                <form action="{{ route('enquiries.destroy', $enquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No enquiries found</td>
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
