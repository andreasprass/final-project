@extends('layout_Dashboard.layoutDashboard')
@section('main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Logbook Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Logbook</li>
            </ol>
        </nav>
    </div>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle me-1"></i> A simple info alert with icon—check it out! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div>
        <a href="{{ route('get_logbook_add') }}"><button type="button" class="btn btn-primary btn-sm w-25 mb-3">Add Logbook</button></a>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Datatables</h5>
                <p>
                    Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table
                    you wish to conver to a datatable
                </p>
                <div class="dataTable-container">
                    <table class="table display table-striped dt-responsive nowrap" style="width:100%" id="users_table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Approval</th>
                                <th>Approver</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logbooks as $log)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $log->users->name }}</td>
                                <td>{{ $log->created_at }}</td>
                                <td>
                                    @if($log->accepted == 0)
                                        <span class="badge bg-secondary">Not Yet Reviewed</span>
                                    @elseif($log->accepted == 1)
                                        <span class="badge bg-success">Aprroved</span>
                                    @elseif($log->accepted == 2)
                                        <span class="badge bg-warning">Need Revision</span>
                                    @endif 
                                </td>
                                <td>
                                    @if($log->approver_id == null)
                                        -
                                    @else
                                        {{ $log->approver->name }}
                                    @endif    
                                </td>
                                <td>
                                    <a href="{{ url("/logbook-acc/$log->id") }}" class="btn btn-info"><span> <i class="bi bi-info-circle"></i></span></a>
                                    <a href="{{ url("/update-logbook/$log->id") }}" class="btn btn-warning"><span> <i class="bi bi-pencil"></i></span></a>
                                    
                                    <form action="{{ url("/delete-logbook/$log->id") }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span><i class="bi bi-trash"></i></span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Approval</th>
                                <th>Approver</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection