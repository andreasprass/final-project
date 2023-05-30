@extends('layout_Dashboard.layoutDashboard')
@section('main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Position Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Positions</li>
            </ol>
        </nav>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle me-1"></i> {{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div>
        <a href="{{ route('get_div_add') }}"><button type="button" class="btn btn-primary btn-sm w-25 mb-3">Add Division</button></a>
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
                                <th>Division Name</th>
                                <th>Description</th>
                                <th>Part of Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($divisions as $div)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $div->div_name }}</td>
                                <td>{{ $div->description }}</td>
                                @if($div->dept_id == 0)
                                <td> - </td>
                                @else
                                <td> {{ $div->department->dept_name }} </td>
                                @endif
                                <td>
                                    <a href="update_divisions/{{ $div->id }}" class="btn btn-warning"><span> <i class="bi bi-pencil"></i></span></a>
                                    
                                    <form action="delete_divisions/{{ $div->id }}" method="post" class="d-inline">
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
                                <th>Division Name</th>
                                <th>Description</th>
                                <th>Part of Department</th>
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