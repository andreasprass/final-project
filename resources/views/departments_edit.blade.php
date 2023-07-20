@extends('layout_Dashboard.layoutDashboard',[
'active' => 'department',
'title' => 'Departemen',
])
@section('main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Department Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Departments</li>
            </ol>
        </nav>
    </div>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle me-1"></i> A simple info alert with icon—check it out! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Update Deparment Data</h5>
                <form action="{{ route('dept_update') }}" method="post" class="form-horizontal">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{ $update->id }}">
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">Deparment Name</label>
                        <div class="col-sm-10"><input type="text" class="form-control" id="dept_name" name="dept_name" value="{{ old('dept_name', $update->dept_name) }}"/></div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhone" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $update->description) }}"></input>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-1"><a href="{{ route('get_departments') }}"><button type="button" class="btn btn-secondary">Back</button></a></div>
                        <div class="col-sm-2"><button type="submit" class="btn btn-warning">Update Data</button></div>
                    </div>
                </form>
            </div>
        </div>

    </section>
</main>
@endsection