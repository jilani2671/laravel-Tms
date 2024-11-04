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
              <div class="card-header bg-dark text-center d-flex justify-content-between align-items-center">
                  <h3 class="text-white mb-0">C Course </h3>
                  <div>
                      <button id="download-csv" class="btn btn-outline-light"> CSV</button>
                      <button id="download-pdf" class="btn btn-outline-light ms-2"> PDF</button>
                  </div>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table id="registrations-table" class="table table-bordered table-hover">
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
                                  <th>Pending Fees</th>
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
                                      <td>{{ $admission->total_fees - ($admission->installment1 + $admission->installment2) }}</td>
                                      <td>{{ \Carbon\Carbon::parse($admission->created_at)->format('d M, Y') }}</td>
                                      <td>
                                        <div class="d-flex flex-wrap align-items-center">
                                            <a href="{{ route('registrations.edit_confirm', $admission->id) }}" class="btn btn-dark me-2 flex-grow-1">Edit</a>
                                    
                                            <form id="delete-admission-form-{{ $admission->id }}" action="{{ route('registrations.destroy1', $admission->id) }}" method="POST" class="flex-grow-1">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this registration?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                  </tr>
                              @empty
                                  <tr>
                                      <td colspan="11" class="text-center">No confirmed registrations found</td>
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

<script>
    document.getElementById('download-csv').addEventListener('click', function () {
        const table = document.getElementById('registrations-table');
        const rows = Array.from(table.querySelectorAll('tr'));

        let csvContent = "data:text/csv;charset=utf-8,";
        csvContent += rows.map((row, rowIndex) => {
            const cols = Array.from(row.querySelectorAll('th, td'));
            // Exclude the "Pending Fees" and "Action" columns
            return cols.slice(0, -2).map(col => `"${col.innerText}"`).join(",");
        }).join("\n");

        const encodedUri = encodeURI(csvContent);
        const link = document.createElement('a');
        link.setAttribute('href', encodedUri);
        link.setAttribute('download', 'C-course.csv');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });

    document.getElementById('download-pdf').addEventListener('click', function () {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        const table = document.getElementById('registrations-table');
        const rows = Array.from(table.querySelectorAll('tr'));

        const header = rows[0].querySelectorAll('th');
        // Exclude the "Pending Fees" and "Action" headers
        const headers = Array.from(header).slice(0, -2).map(th => th.innerText);

        const data = rows.slice(1).map(row => {
            const cols = row.querySelectorAll('td');
            // Exclude the "Pending Fees" and "Action" columns
            return Array.from(cols).slice(0, -2).map(td => td.innerText);
        });

        doc.autoTable({
            head: [headers],
            body: data
        });

        doc.save('C-course.pdf');
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.18/jspdf.plugin.autotable.min.js"></script>
@endsection
