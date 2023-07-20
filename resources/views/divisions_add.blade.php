@extends('layout_Dashboard.layoutDashboard',[
'active' => 'division',
'title' => 'Divisi',
])
@section('main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Division Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Division</li>
            </ol>
        </nav>
    </div>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle me-1"></i> A simple info alert with icon—check it out! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Division Data</h5>
                <form action="{{ route('div_add') }}" method="post" class="form-horizontal">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">Division Name</label>
                        <div class="col-sm-10"><input type="text" class="form-control" id="div_name" name="div_name" /></div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhone" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" name="description"></input>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhone" class="col-sm-2 col-form-label">Part of Department</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="dept_id" name="dept_id">
                                <option selected="">Choose Department...</option>
                                @foreach($departments as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->dept_name }}</option>
                                @endforeach
                              </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-1"><a href="{{ route('get_departments') }}"><button type="button" class="btn btn-secondary">Back</button></a></div>
                        <div class="col-sm-2"><button type="submit" class="btn btn-primary">Submit Data</button></div>
                    </div>
                </form>
            </div>
        </div>

    </section>
</main>
@endsection