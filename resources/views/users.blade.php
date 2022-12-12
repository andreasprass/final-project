@extends('layout_Dashboard.layoutDashboard')
@section('main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>User Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle me-1"></i> {{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div>
        <a href="{{ route('get_users_add') }}"><button type="button" class="btn btn-primary btn-sm w-25 mb-3">Add User</button></a>
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
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Position</th>
                                <th>Division</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->status == 1)
                                            <i class="bi bi-check-circle-fill text-success"> </i>Active
                                        @else
                                            <i class="bi bi-x-circle"> </i>Inactive
                                        
                                    @endif 
                                </td>
                                <td>
                                    @if($user->position == 1)
                                        Manager
                                    @else
                                        Staff
                                    @endif
                                </td>
                                <td>{{ $user->division->div_name }}</td>
                                <td>
                                    <a href="update_users/{{ $user->id }}" class="btn btn-warning"><span> <i class="bi bi-pencil"></i></span></a>
                                    
                                    <form action="delete_users/{{ $user->id }}" method="post" class="d-inline">
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
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Position</th>
                                <th>Division</th>
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