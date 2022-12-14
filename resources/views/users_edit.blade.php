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

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle me-1"></i> A simple info alert with icon—check it out! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Update User Data</h5>
                <form action="{{ route('user_update') }}" method="post" class="form-horizontal">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{ $update->id }}">
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10"><input type="text" class="form-control" id="name" name="name" value="{{ old('name', $update->name) }}"/></div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10"><input type="text" class="form-control" id="phone" name="phone" value="{{ $update->phone }}"/></div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10"><input type="email" class="form-control" id="email" name="email" value="{{ $update->email }}"/></div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10"><input type="password" class="form-control" id="password" name="password" value="{{ $update->password }}"/></div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Position</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="position" name="position">
                                <option value="2">Staff</option>
                                <option value="1">Manager</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Division</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="div_id" name="div_id">
                                <option selected="true" value="{{ old('div_name', $update->division->id) }}">{{ $update->division->div_name }}</option>
                                @foreach($divisions as $div)
                                @if($div->id == $update->division->id) @continue @endif
                                    <option value="{{ $div->id }}">{{ $div->div_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="status" name="status">
                                @if($update->status == 1)
                                    <option value="2"><i class="bi bi-x-circle"> </i>Inactive</option>
                                    <option selected value="1"><i class="bi bi-check-circle-fill text-success"> </i>Active</option>
                                @else
                                    <option selected value="2"><i class="bi bi-x-circle"> </i>Inactive</option>
                                    <option value="1"><i class="bi bi-check-circle-fill text-success"> </i>Active</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-1"><a href="{{ route('get_users') }}"><button type="button" class="btn btn-secondary">Back</button></a></div>
                        <div class="col-sm-2"><button type="submit" class="btn btn-warning">Update Data</button></div>
                    </div>
                </form>
            </div>
        </div>

    </section>
</main>
@endsection