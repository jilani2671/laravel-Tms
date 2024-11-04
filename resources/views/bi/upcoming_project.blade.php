@extends('layouts.masterlayout')

@section('content')

<div class="container">
    <div class="row justify-content-center mt-4">
    </div>
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
                    <h3 class="text-white">Upcoming Projects</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Project Name</th>
                                    <th>Technology</th>
                                    <th>Status</th>
                                    <th>Dev Team</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>BA Name</th>
                                <!-- <th>Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @if($projects->isNotEmpty())
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $project->id }}</td>
                                            <td>{{ $project->project_name }}</td>
                                            <td>{{ $project->tech }}</td>
                                            <td>{{ $project->status }}</td>
                                            <td>{{ $project->dev_team }}</td>
                                            <td>{{ \Carbon\Carbon::parse($project->start_date)->format('d M, Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($project->end_date)->format('d M, Y') }}</td>
                                            <td>{{ $project->business_analyst_name }}</td>
                                            <!-- 
                                            <td>
                                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-dark btn-sm">Edit</a>
                                                <form id="delete-project-form-{{ $project->id }}" action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteProject({{ $project->id }})">Delete</button>
                                                </form>
                                            </td>
                                            -->
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="text-center">No Upcoming projects found</td>
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
    function deleteProject(id) {
        if (confirm("Are you sure you want to delete this project?")) {
            document.getElementById("delete-project-form-" + id).submit();
        }
    }
</script>
@endpush
